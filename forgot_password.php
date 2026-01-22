<?php
// Start the session to store user data across requests
session_start();

// --- Handle Session Reset on return from Login ---
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    // Clear all session variables related to the recovery process
    session_unset();
    session_destroy();
    // Restart session after clearing
    session_start(); 
    // Redirect to clean URL to prevent repeated reset
    header("Location: forgot_password.php");
    exit();
}
// --- End Session Reset ---


// --- Start Debugging: Enable Error Reporting ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- End Debugging ---

// Include the database connection file
include 'connection.php'; 

$message = '';
$message_class = '';
$current_view = 'lrn_input';

// Check if a success message was passed from login.php after a successful password change
// NOTE: This logic remains, but we use it less frequently now.
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
    $message_class = 'success';
}

// Check if the database connection object exists and is connected
if (!isset($conn) || $conn->connect_error) {
    error_log("Database connection failed: " . ($conn->connect_error ?? 'Unknown error'));
    $message = "Database connection error. Please try again later.";
    $message_class = 'error';
}

// Check session state to determine the current view
if (isset($_SESSION['auth_email'])) {
    if (isset($_SESSION['action'])) {
        $current_view = $_SESSION['action'];
    } else {
        $current_view = 'options';
    }
}

// --- Handle Form Submissions ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($message)) {
    
    if (isset($_POST['action']) && $_POST['action'] === 'verify_lrn') {
        // --- 1. LRN Verification Logic ---
        $lrn = trim($_POST['lrn'] ?? '');
        
        if (empty($lrn) || strlen($lrn) < 12) {
            $message = "Recheck your LRN with minimum of 12 letters input.";
            $message_class = 'error';
        } else {
            // Look up LRN in student_profile table to get email
            $check_lrn_sql = "SELECT email FROM student_profile WHERE lrn = ?";
            $stmt_lrn = $conn->prepare($check_lrn_sql);
            if ($stmt_lrn === false) { error_log("LRN prepare failed: " . $conn->error); goto end_verification; }
            
            $stmt_lrn->bind_param("s", $lrn); 
            $stmt_lrn->execute();
            $result_lrn = $stmt_lrn->get_result();
            
            if ($result_lrn->num_rows === 1) {
                $student_data = $result_lrn->fetch_assoc();
                
                // LRN found. Set session variables and move to options view.
                $_SESSION['auth_email'] = $student_data['email'];
                $_SESSION['auth_lrn'] = $lrn;
                $current_view = 'options';
                
                $message = "LRN detected. Please choose your next action.";
                $message_class = 'success';
                
            } else {
                $message = "Recheck your LRN with minimum of 12 letters input. LRN not found.";
                $message_class = 'error';
            }
            $stmt_lrn->close();
            end_verification:
        }
        
    } elseif (isset($_POST['action']) && $_POST['action'] === 'set_action') {
        // --- 2. Options Selection Logic ---
        $selected_action = strtolower(trim($_POST['selected_action'] ?? ''));
        
        if ($selected_action == 'recover' || $selected_action == 'change') {
            $_SESSION['action'] = $selected_action;
            $current_view = $selected_action;
        } else {
            $message = "Invalid action selected.";
            $message_class = 'error';
            $current_view = 'options';
        }
        
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update_password' && $current_view === 'change') {
        // --- 3. Change Password Logic ---
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $email_to_update = $_SESSION['auth_email'] ?? null;
        
        if (!$email_to_update) {
            $message = "Authentication expired. Please start over.";
            $message_class = 'error';
            session_unset();
            session_destroy();
            $current_view = 'lrn_input';
            goto end_submission;
        }

        if (empty($new_password) || $new_password !== $confirm_password) {
            $message = "New passwords do not match or are empty.";
            $message_class = 'error';
            goto end_submission;
        }

        $success_users = false;
        $success_student_profile = true; // Assume success unless update attempted and failed

        // A. Update password in the 'users' table
        $update_users_sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt_users = $conn->prepare($update_users_sql);

        if ($stmt_users === false) {
             error_log("Users password update prepare failed: " . $conn->error);
             $message = "An internal error occurred during password change (Users table).";
             $message_class = 'error';
        } else {
            $stmt_users->bind_param("ss", $new_password, $email_to_update);
            if ($stmt_users->execute()) {
                $success_users = true;
            } else {
                $message = "Database update failed (Users table).";
                $message_class = 'error';
            }
            $stmt_users->close();
        }

        // B. Update password in the 'student_profile' table (as requested by user)
        // Note: Assumes 'student_profile' has a 'password' column linked by 'email'.
        $update_student_sql = "UPDATE student_profile SET password = ? WHERE email = ?";
        $stmt_student = $conn->prepare($update_student_sql);
        
        if ($stmt_student === false) {
             error_log("Student profile password update prepare failed: " . $conn->error);
             // If prep fails, don't change message if users table update failed/succeeded first
        } else {
            $stmt_student->bind_param("ss", $new_password, $email_to_update);
            if (!$stmt_student->execute()) {
                $success_student_profile = false;
                error_log("Database update failed (Student Profile table).");
                // Only overwrite message if users table update was successful, to report the specific failure
                if ($success_users) {
                     $message = "Password updated in Users table, but failed for Student Profile table.";
                     $message_class = 'error';
                }
            }
            $stmt_student->close();
        }


        if ($success_users) {
            // SUCCESS REDIRECTION MODIFIED: Redirect with success flag to trigger modal in login.php
            // We only redirect if the primary 'users' table update succeeded.
            session_unset();
            session_destroy();
            header("Location: http://localhost/als/logs/login.php?success=true");
            exit();
        }
        end_submission:
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: black;
            display: flex;
            justify-content: center; 
            align-items: center;
            min-height: 100vh;
        }

        .forgot-wrapper {
            width: 100%;
            max-width: 450px; 
            padding: 2rem;
            background: white; 
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        
        .forgot-wrapper h2 {
            text-align: center;
            color: #333; 
            margin-bottom: 2rem; 
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            color: #333;
        }

        .form-group button[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #007acc;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        /* Specific styles for recovery options */
        .recovery-options {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .recovery-options button {
            flex: 1;
            /* Increased size and text size for visibility */
            padding: 1.25rem; 
            font-size: 1.3rem; 
            font-weight: bold;
            border-radius: 6px; /* Slightly larger border radius */
            transition: background-color 0.3s ease, transform 0.1s ease;
        }
        
        .recovery-options button:active {
            transform: translateY(1px);
        }
        
        .recovery-options button.recover-btn {
             background-color: #4CAF50; /* Green */
        }
        .recovery-options button.recover-btn:hover {
             background-color: #45a049;
        }
        
        .recovery-options button.change-btn {
             background-color: #f44336; /* Red */
        }
        .recovery-options button.change-btn:hover {
             background-color: #da190b;
        }


        .form-group button:hover {
            background-color: #005699;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        
        .back-link a {
            color: #007acc;
            text-decoration: none;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .message {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: bold;
        }

        .message.error {
            background-color: #fdd;
            color: #e53e3e;
            border: 1px solid #e53e3e;
        }

        .message.success {
            background-color: #dff;
            color: #008000;
            border: 1px solid #008000;
        }
        
        .password-display {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="forgot-wrapper">
        
        <!-- Conditional Title based on view -->
        <?php if ($current_view === 'lrn_input'): ?>
            <h2>LRN Verification</h2>
        <?php elseif ($current_view === 'options'): ?>
            <h2>Action Required</h2>
        <?php elseif ($current_view === 'recover'): ?>
            <h2>Recover Password</h2>
        <?php elseif ($current_view === 'change'): ?>
            <h2>Change Password</h2>
        <?php endif; ?>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo $message_class; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <?php if ($current_view === 'lrn_input'): ?>
        
            <!-- LRN Verification Form -->
            <form action="forgot_password.php" method="POST">
                <input type="hidden" name="action" value="verify_lrn">
                <div class="form-group">
                    <label for="lrn">Learner Reference Number (LRN)</label>
                    <input type="text" name="lrn" id="lrn" 
                           placeholder="Enter your LRN (min 12 characters)" 
                           minlength="12"
                           required>
                </div>
                
                <div class="form-group">
                    <button type="submit">Verify LRN</button>
                </div>
            </form>
            
        <?php elseif ($current_view === 'options'): ?>
            
            <!-- Options View -->
            <p style="text-align: center; margin-bottom: 20px; color: #555;">Choose how you want to proceed with your authenticated account (<?php echo htmlspecialchars($_SESSION['auth_email'] ?? ''); ?>).</p>
            
            <form action="forgot_password.php" method="POST" class="recovery-options">
                <input type="hidden" name="action" value="set_action">
                <button type="submit" name="selected_action" value="recover" class="recover-btn">Recover Password</button>
                <button type="submit" name="selected_action" value="change" class="change-btn">Change Password</button>
            </form>
            
        <?php elseif ($current_view === 'recover'): ?>
            
            <!-- Recover Password View (Shows the current password) -->
            <?php 
                $retrieved_password = "Error retrieving password.";
                $sql_pass = "SELECT password FROM users WHERE email = ?";
                $stmt_pass = $conn->prepare($sql_pass);
                if ($stmt_pass === false) { 
                    $retrieved_password = "DB error.";
                } else {
                    $stmt_pass->bind_param("s", $_SESSION['auth_email']); 
                    $stmt_pass->execute();
                    $result_pass = $stmt_pass->get_result();
                    if ($result_pass->num_rows === 1) {
                        $retrieved_password = htmlspecialchars($result_pass->fetch_assoc()['password']);
                    } else {
                         $retrieved_password = "User record missing.";
                    }
                    $stmt_pass->close();
                }
            ?>
            <p style="text-align: center; margin-bottom: 15px; color: #555;">Your current database password for (<?php echo htmlspecialchars($_SESSION['auth_email'] ?? ''); ?>) is:</p>
            <div class="password-display">
                <?php echo $retrieved_password; ?>
            </div>
            
        <?php elseif ($current_view === 'change'): ?>
            
            <!-- Change Password View -->
            <form action="forgot_password.php" method="POST">
                <input type="hidden" name="action" value="update_password">
                <p style="margin-bottom: 15px; color: #555;">Enter a new password for (<?php echo htmlspecialchars($_SESSION['auth_email'] ?? ''); ?>).</p>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                
                <div class="form-group">
                    <button type="submit">Update Password</button>
                </div>
            </form>
            
        <?php endif; ?>
        
        <div class="back-link">
            <!-- Link updated to include the absolute path requested -->
            <a href="http://localhost/als/logs/login.php?reset=true">Return to Login Page</a>
        </div>
    </div>
</body>
</html>