<?php
// Start the session to store user data upon login
session_start();

// --- Start Debugging: Enable Error Reporting ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- End Debugging ---

// Include the database connection file
include 'connection.php';

$login_failed = isset($_GET['failed']) && $_GET['failed'] == 1;

// Check if a success message was passed from forgot_password.php after password change
$show_success_modal = isset($_GET['success']) && $_GET['success'] === 'true';

// Check if the database connection object exists and is connected
if (!isset($conn) || $conn->connect_error) {
    error_log("Database connection failed: " . ($conn->connect_error ?? 'Unknown error'));
    // If DB fails, we still need to exit or the script will crash later.
    echo "<h1>Database Connection Error</h1><p>Please try again later.</p>";
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve input values
    $identifier = trim($_POST['identifier'] ?? ''); 
    $password   = $_POST['password'] ?? '';
    
    // Get the role selected on the form switcher
    $login_mode = strtolower(trim($_POST['user_login_role'] ?? 'student')); 
    $is_student_login = ($login_mode === 'student');
    
    $email = ''; // Final email used for table lookup (if applicable)
    $user = null; // Holds user data (ID, name, level)

    // --- Server-side Validation ---
    if (empty($identifier) || empty($password)) {
        goto authentication_failed;
    }

    $role_confirmed = false;
    $stored_role = '';

    // *******************************************************************
    // *** STUDENT LOGIN PATH (Uses LRN/Email and Users table password) ***
    // *******************************************************************
    if ($is_student_login) {
        
        // --- STEP 1: Determine Email from Identifier (Email or LRN) ---
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $email = $identifier;
        } else {
            // Assume LRN: Find email in student_profile using LRN
            $check_lrn_sql = "SELECT email FROM student_profile WHERE lrn = ?";
            $stmt_lrn = $conn->prepare($check_lrn_sql);
            if ($stmt_lrn === false) { error_log("LRN prepare failed: " . $conn->error); goto authentication_failed; }
            $stmt_lrn->bind_param("s", $identifier); 
            $stmt_lrn->execute();
            $result_lrn = $stmt_lrn->get_result();
            if ($result_lrn->num_rows === 1) {
                $row = $result_lrn->fetch_assoc();
                $email = $row['email']; 
            }
            $stmt_lrn->close();
            if (empty($email)) { goto authentication_failed; }
        }

        // --- STEP 2: Authenticate Password against 'users' table and get basic user data ---
        // Students MUST rely on the central 'users' table for password verification
        $sql = "SELECT user_id, name, password, level FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) { error_log("Student User prepare failed: " . $conn->error); goto authentication_failed; }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows !== 1) { goto authentication_failed; }
        
        $user = $result->fetch_assoc();
        $stmt->close();
        
        // --- REMOVED HASHING: Direct string comparison for unhashed/legacy passwords ---
        if ($password !== $user['password']) { goto authentication_failed; }

        // --- STEP 3: Final Role Confirmation (student_profile check) ---
        $db_level_or_role = strtolower(trim($user['level'])); 
        $is_a_level = in_array($db_level_or_role, ['elementary', 'juniorhigh', 'seniorhigh']);

        if ($is_a_level) {
            $check_student_sql = "SELECT student_id FROM student_profile WHERE email = ?";
            $stmt_student = $conn->prepare($check_student_sql);
            if ($stmt_student === false) { error_log("Student profile prepare failed: " . $conn->error); goto authentication_failed; }
            $stmt_student->bind_param("s", $email); 
            $stmt_student->execute();
            
            if ($stmt_student->get_result()->num_rows === 1) {
                $role_confirmed = true;
                $stored_role = $db_level_or_role; 
            }
            $stmt_student->close();
        }

    } else {
        // *******************************************************************
        // *** FACULTY LOGIN PATH (Separate Authentication for Teacher/Admin) ***
        // *******************************************************************
        
        // Faculty login must use email
        if (!filter_var($identifier, FILTER_VALIDATE_EMAIL)) { goto authentication_failed; }
        $email = $identifier;
        
        // 3a. Try to authenticate as TEACHER (using its own password field from the teacher table)
        $check_teacher_sql = "SELECT teacher_id, teacher_name, password, faculty_role FROM teacher WHERE email = ?";
        $stmt_teacher = $conn->prepare($check_teacher_sql);
        
        if ($stmt_teacher === false) {
             error_log("Teacher prepare failed: " . $conn->error);
             goto authentication_failed;
        }

        $stmt_teacher->bind_param("s", $email); 
        $stmt_teacher->execute();
        $result_teacher = $stmt_teacher->get_result();
        
        if ($result_teacher->num_rows === 1) {
            $teacher_data = $result_teacher->fetch_assoc();
            
            // --- DIRECT STRING COMPARISON: Verify password directly against the password in the TEACHER table ---
            if ($password === $teacher_data['password']) {
                $role_confirmed = true;
                $stored_role = strtolower(trim($teacher_data['faculty_role'])); // Use role from teacher table
                
                // Set user data, relying on the 'users' table only for user_id lookup if it exists
                $sql_user_id = "SELECT user_id FROM users WHERE email = ?";
                $stmt_uid = $conn->prepare($sql_user_id);
                $stmt_uid->bind_param("s", $email);
                $stmt_uid->execute();
                $result_uid = $stmt_uid->get_result();
                $user_id = $result_uid->num_rows === 1 ? $result_uid->fetch_assoc()['user_id'] : $teacher_data['teacher_id'];
                $stmt_uid->close();

                $user = [
                    'user_id' => $user_id, // Use ID from users table if available, otherwise teacher_id
                    'name' => $teacher_data['teacher_name'],
                    'level' => $stored_role,
                ];
            }
        }
        $stmt_teacher->close();
        
        // 3b. If not Teacher, try to authenticate as ADMIN (uses Users table password)
        if (!$role_confirmed) {
            
            // Check Users table for Admin password verification (Admin table lacks password field)
            $sql = "SELECT user_id, name, password, level FROM users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt === false) { error_log("Admin user prepare failed: " . $conn->error); goto authentication_failed; }
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $temp_user = $result->fetch_assoc();
                $stmt->close();
                
                // --- DIRECT STRING COMPARISON: Direct string comparison for unhashed/legacy passwords ---
                if ($password === $temp_user['password']) {
                    
                    // Password verified in Users table, now confirm Admin role
                    $check_admin_sql = "SELECT admin_id, admin_name, faculty_role FROM admin WHERE email = ?";
                    $stmt_admin = $conn->prepare($check_admin_sql);
                    
                    if ($stmt_admin === false) {
                         error_log("Admin role prepare failed: " . $conn->error);
                         goto authentication_failed;
                    }

                    $stmt_admin->bind_param("s", $email); 
                    $stmt_admin->execute();
                    $result_admin = $stmt_admin->get_result();
                    
                    if ($result_admin->num_rows === 1) {
                        $admin_data = $result_admin->fetch_assoc();
                        $role_confirmed = true;
                        $stored_role = strtolower(trim($admin_data['faculty_role'])); // Use role from admin table

                        // Use data from users table for ID/level and admin name for session
                        $user = [
                            'user_id' => $temp_user['user_id'], 
                            'name' => $admin_data['admin_name'],
                            'level' => $stored_role,
                        ];
                    }
                    $stmt_admin->close();
                }
            } else {
                $stmt->close();
            }

            // If faculty mode was selected, and after all checks, no faculty role was confirmed, authentication fails.
            if (!$role_confirmed) {
                error_log("Faculty login failed: Email {$email} authenticated neither as teacher nor admin.");
                goto authentication_failed;
            }
        }
    }
    
    // *******************************************************************
    // *** END LOGIN LOGIC ***
    // *******************************************************************
    
    // 4. Finalize Login and Redirect
    // $user is guaranteed to be set if $role_confirmed is true, because all paths lead to a successful authentication and role mapping.
    if ($role_confirmed && $user !== null) {
        // Login successful!
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_level'] = $stored_role; 

        // Determine redirection based on the confirmed role
        $redirect_page = '';

        switch ($stored_role) {
            case 'admin':
                // Redirection for Admin
                $redirect_page = 'http://localhost/als/front/dashboard.php';
                break;
            case 'teacher':
                // Redirection for Teacher
                $redirect_page = 'http://localhost/als/front/overall.php';
                break;
            case 'elementary':
            case 'juniorhigh':
            case 'seniorhigh':
                // Redirection for student levels
                $redirect_page = 'http://localhost/als/front/home.php';
                break;
            default:
                // Fallback if role is confirmed but doesn't match a redirect path (shouldn't happen here)
                $redirect_page = 'login.php'; 
                break;
        }

        if (!empty($redirect_page)) {
            header("Location: " . $redirect_page);
            exit();
        }
    }

    authentication_failed:
    // If authentication fails at any point, reload the login page with a failure flag.
    header("Location: login.php?failed=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: black; 
            position: relative; 
        }
        
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            backdrop-filter: blur(5px);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 30px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 400px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.3s;
        }
        
        .modal-content h3 {
            color: #4CAF50; /* Green success color */
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        .modal-content p {
            margin-bottom: 20px;
            color: #555;
        }
        
        .modal-content button {
            background-color: #007acc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .modal-content button:hover {
            background-color: #005699;
        }

        /* Keyframes for smooth entry */
        @keyframes fadeIn {
          from {opacity: 0; transform: translateY(-20px);}
          to {opacity: 1; transform: translateY(0);}
        }
        /* End Modal Styles */


        /* NEW: Layer to hold the background image with reduced opacity */
        .background-image-fader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Applying the image here */
            background-image: url('login.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* 15% transparent means 85% opaque */
            opacity: 0.85; 
            z-index: -1; /* Place behind the container */
        }

        .container {
            display: flex;
            justify-content: center; 
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
            position: relative;
            /* REMOVED background-image properties from here */
            z-index: 1; /* Ensure this container is visible above the background layer */
        }

        .login-wrapper {
            display: flex;
            flex-direction: column; 
            align-items: center;
            width: 100%;
            max-width: 550px; /* Setting max-width to 550px */
        }
        
        .form-box {
            width: 100%;
            border: 1px solid rgba(255,255,255,0.12);
            padding: 5rem 2.5rem; /* Increased vertical padding from 4rem to 5rem for more height */
            /* Changed to 20% black transparent background */
            background: rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            /* Subtle frosted effect behind the form for readability */
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .form-box h2 {
            text-align: center;
            color: #ffffff; /* Changed to white for readability on dark translucent background */
            /* INCREASED MARGIN FOR SPACING */
            margin-bottom: 3rem; 
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #ffffff; /* Labels in white to remain visible */
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            /* Keep inputs mostly opaque and readable */
            background-color: rgba(255, 255, 255, 0.95); 
            color: #000;
        }

        /* --- Style for Placeholders --- */
        .form-group input::placeholder {
            color: rgba(51, 51, 51, 0.6); /* Semi-transparent black/gray */
            font-style: italic;
        }
        /* --- End Style for Placeholders --- */

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #007acc;
            box-shadow: 0 0 5px rgba(0, 122, 204, 0.4);
        }
        
        /* New CSS for the subtle error message */
        .error-message-subtle {
            color: white; 
            background-color: #e53e3e; 
            padding: 0.5rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: bold;
            font-size: 0.9rem;
            border: 1px solid #c53030;
        }

        .form-group button[type="submit"] {
            width: 60%;
            padding: 0.75rem;
            background-color: rgb(217, 235, 255);
            color: #000;
            border: 1px solid black;
            border-radius: 4px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: block; 
            margin: 5px auto 0; /* Changed margin: 0 auto; to margin: 5px auto 0; */
        }

        .form-group button[type="submit"]:hover {
            background-color: rgb(171, 219, 255);
            transform: translateY(-2px); 
        }

        .form-footer {
            margin-top: 15px;
            text-align: center;
            color: #ffffff; /* Changed to white for readability inside translucent box */
            text-shadow: none; /* Removed text shadow */
        }
        
        /* Updated font and link color for readability inside white box */
        .form-footer p, .form-footer a {
            color: #ffffff; 
        }

        .form-footer a {
            font-weight: bold;
            transition: color 0.3s ease;
            color: #aee1ff; /* Light link color to stand out on dark translucent background */
        }

        .form-footer a:hover {
            color: #cfeeff;
            text-decoration: underline;
        }
        
        /* --- ROLE SWITCHER (Segmented Control) --- */
        .role-switcher {
            display: flex;
            width: 100%; /* Take full width of wrapper */
            max-width: 400px; /* Constrain width for a better look */
            justify-content: center;
            margin-bottom: 2rem; /* Separates it from the form */
            background-color: rgba(255,255,255,0.95); /* Slightly opaque so it stands out above the background image */
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Darker shadow for separation */
            padding: 5px;
            border: 2px solid #ccc; /* Solid border */
        }

        .role-switcher button {
            flex: 1;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            cursor: pointer;
            /* ADDED: 1s transition for background/color change */
            transition: background-color 1s, color 1s, box-shadow 0.3s;
            background-color: transparent;
            color: #333;
            border-radius: 20px;
            text-shadow: none;
        }

        .role-switcher button:hover:not(.active) {
            background-color: rgba(0, 122, 204, 0.1);
        }

        .role-switcher button.active {
            background-color: #007acc;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        /* Conditional fields - used by JS */
        .conditional-field {
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform-origin: top;
        }
        
        /* Hide fields that are only for faculty sub-roles */
        .conditional-field.hidden {
            display: none; 
            opacity: 0;
            height: 0;
            overflow: hidden;
            margin-bottom: 0; /* Remove margin when hidden */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-wrapper {
                max-width: 90%; 
            }
        }
    </style>
</head>

<body>
    <!-- Full-screen element to display the 15% transparent (85% opaque) background image -->
    <div class="background-image-fader"></div>

    <div class="container">
        <div class="login-wrapper">
            
            <!-- ROLE SWITCHER -->
            <div class="role-switcher">
                <button id="student-btn" class="active" onclick="setLoginRole('student')">Student</button>
                <button id="faculty-btn" onclick="setLoginRole('faculty')">Faculty</button>
            </div>

            <div class="form-box">
                <!-- Added ID for dynamic header change -->
                <h2 id="login-header">STUDENT LOGIN</h2>

                <?php 
                // Display the error message only if the ?failed=1 URL parameter is present
                if ($login_failed): ?>
                    <div class="error-message-subtle">Invalid email or password. Please try again.</div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    
                    <!-- Hidden field to send the selected mode (student/faculty) to PHP -->
                    <input type="hidden" name="user_login_role" id="user-login-role" value="student">
                    
                    
                    <div class="form-group">
                        <!-- Label text updated dynamically by JavaScript -->
                        <label for="identifier" id="identifier-label">Email or LRN</label> 
                        <input type="text" name="identifier" id="identifier" placeholder="Enter Email or LRN" required>
                    </div>

                    <!-- REMOVED: Separate LRN field -->
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 2.125rem;">
                        <button type="submit">Log In</button>
                    </div>
                    
                    <div class="form-footer" id="forgot-password-footer">
                        <!-- Link modified to reset the recovery session when user clicks Forgot Password -->
                        <p>Forgot Password? <a href="forgot_password.php?reset=true">Click here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Custom Success Modal Structure -->
    <div id="successModal" class="modal">
      <div class="modal-content">
        <h3>Success!</h3>
        <p>Password successfully changed. You can now log in with your new credentials.</p>
        <button id="closeModal">OK</button>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize the role selector on page load
            setLoginRole('student');
            
            // --- Modal Logic ---
            const urlParams = new URLSearchParams(window.location.search);
            const successParam = urlParams.get('success');
            const modal = document.getElementById('successModal');
            const closeModalBtn = document.getElementById('closeModal');
            
            if (successParam === 'true') {
                modal.style.display = 'flex';
                // Clean up the URL so the modal doesn't reappear on refresh
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search.replace(/([?&])success=true(&?)/, '$1').replace(/[?&]$/, '');
                window.history.replaceState({ path: newUrl }, '', newUrl);
            }
            
            closeModalBtn.onclick = function() {
                modal.style.display = 'none';
            }
            
            // Close modal if user clicks outside of it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
            // --- End Modal Logic ---
        });

        function setLoginRole(role) {
            const hiddenInput = document.getElementById('user-login-role');
            const studentBtn = document.getElementById('student-btn');
            const facultyBtn = document.getElementById('faculty-btn');
            const header = document.getElementById('login-header');
            const identifierLabel = document.getElementById('identifier-label');
            const identifierInput = document.getElementById('identifier');
            // Get the footer element
            const forgotPasswordFooter = document.getElementById('forgot-password-footer');

            hiddenInput.value = role;

            if (role === 'student') {
                studentBtn.classList.add('active');
                facultyBtn.classList.remove('active');
                header.textContent = 'Student Login';
                
                // Show link for students
                forgotPasswordFooter.style.display = 'block';

                // Update label/placeholder for combined login
                identifierLabel.textContent = 'Email or LRN';
                identifierInput.placeholder = 'Enter Email or LRN';
                
            } else { // faculty
                studentBtn.classList.remove('active');
                facultyBtn.classList.add('active');
                header.textContent = 'Faculty Login';
                
                // Hide link for faculty
                forgotPasswordFooter.style.display = 'none';

                // Update label/placeholder for faculty (only email/identifier)
                identifierLabel.textContent = 'Email';
                identifierInput.placeholder = 'Enter Email';
            }
        }
        
        window.setLoginRole = setLoginRole; // Expose globally
    </script>
</body>
</html>