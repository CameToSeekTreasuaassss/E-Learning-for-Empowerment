<?php
// 1. Start the session to access stored user data
session_start();

// Check if the user is logged in, otherwise redirect them to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// =========================================================================
// !!! IMPORTANT: DATABASE CONNECTION SETUP (MUST BE CONFIGURED) !!!
// NOTE: Based on the provided table structures:
// - Student records use the table 'student_profile'.
// - Teacher records use the table 'teacher'.
// 
// FIX: We are now RE-ADDING the 'password' column logic for 'student_profile'.
// >>> CAUTION: This requires the 'password' column (VARCHAR(255)) to EXIST in your 'student_profile' table,
// >>> otherwise you will get the "Unknown column 'password'" error.
// =========================================================================
$host = 'localhost';
$user = 'root';
$password = ''; // CHANGE THIS TO YOUR ACTUAL PASSWORD
$database = 'als';

// Attempt to connect to MySQL database
$conn = new mysqli($host, $user, $password, $database);

// Initialize all student count variables
$totalAccounts = 0;
$studentElementaryCount = 0; // RENAMED
$studentJuniorHighCount = 0; // RENAMED
$studentSeniorHighCount = 0; // RENAMED

// Check connection
if ($conn->connect_error) {
    $db_connected = false;
    error_log("DATABASE CONNECTION ERROR: " . $conn->connect_error);
    
    // UPDATED: Mock data keys changed back to match 'student_profile' structure
    $students = [
        ['student_id' => 9001, 'student_name' => 'Mock Alfonso G. Garcia', 'password' => 'pass9001', 'lrn' => '123456789012', 'level' => 'elementary', 'email' => 'mock.a@mail.ph', 'birthday' => '2010-01-01', 'gender' => 'Male', 'contact' => '09171234567', 'address' => 'Manila, PH', 'age' => 15],
        ['student_id' => 9002, 'student_name' => 'Mock Maria C. Cruz', 'password' => 'pass9002', 'lrn' => '123456789013', 'level' => 'juniorhigh', 'email' => 'mock.m@mail.ph', 'birthday' => '2008-05-15', 'gender' => 'Female', 'contact' => '09172345678', 'address' => 'Cebu, PH', 'age' => 17],
    ];
    $teachers = [
        ['teacher_id' => 5001, 'teacher_name' => 'Mock T. A. Dela Cruz', 'password' => 'pass5001', 'contact' => '09987654321', 'email' => 'mock.tdc@als.edu', 'faculty_role' => 'Teacher', 'age' => 35],
        ['teacher_id' => 5002, 'teacher_name' => 'Mock A. B. Santos', 'password' => 'pass5002', 'contact' => '09123456789', 'email' => 'mock.abs@als.edu', 'faculty_role' => 'Coordinator', 'age' => 42],
    ];
} else {
    $db_connected = true;

    // --- NEW FUNCTION TO RESET AUTO_INCREMENT AFTER DELETIONS ---
    /**
     * Resets the AUTO_INCREMENT value for a given table based on the maximum existing ID + 1.
     * @param mysqli $conn The database connection object.
     * @param string $tableName The name of the table to reset.
     */
    function resetAutoIncrement(mysqli $conn, string $tableName) {
        // MODIFIED: Use appropriate ID column based on table name ('student_id' for student_profile)
        $idColumn = ($tableName === 'student_profile') ? 'student_id' : 'teacher_id';
        $result = $conn->query("SELECT MAX($idColumn) AS max_id FROM $tableName");
        $row = $result->fetch_assoc();
        $nextId = ($row['max_id'] ?? 0) + 1;

        $conn->query("ALTER TABLE $tableName AUTO_INCREMENT = $nextId");
        error_log("AUTO_INCREMENT reset for $tableName to $nextId");
        return $nextId;
    }
    // --- END NEW FUNCTION ---
    
    // --- FUNCTION TO FETCH AND RENDER TABLE ROWS (Reusable by AJAX) ---
    /**
     * Fetches records and generates the HTML table rows.
     */
    function fetchAndRenderTableRows(mysqli $conn, string $type, string $searchQuery = '') {
        $cleanQuery = $conn->real_escape_string(strtolower($searchQuery));
        $whereClause = '';
        $html = '';

        if ($type === 'student') {
            $table = 'student_profile';
            $nameColumn = 'student_name';
            $idColumn = 'student_id';
            $selectFields = "student_id, student_name, password, lrn, level, email, birthday, gender, contact, address, TIMESTAMPDIFF(YEAR, birthday, CURDATE()) AS age";
            $headers = ['ID', 'Student Name', 'Password', 'LRN', 'Level', 'Email', 'Age', 'Gender', 'Contact', 'Address', 'Action'];
            
            if (!empty($cleanQuery)) {
                // FIXED: Search across student_name, lrn, or email
                $whereClause = " WHERE LOWER($nameColumn) LIKE '%$cleanQuery%'
                                 OR LOWER(lrn) LIKE '%$cleanQuery%'
                                 OR LOWER(email) LIKE '%$cleanQuery%'";
            }

            $sql = "SELECT $selectFields FROM $table $whereClause ORDER BY $nameColumn ASC";
            $result = $conn->query($sql);
            $records = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

            $i = 1;
            foreach ($records as $record) {
                $recordJsonString = htmlspecialchars(json_encode($record), ENT_QUOTES, 'UTF-8');
                $recordId = $record['student_id'];
                $displayedPassword = $record['password'] ?? '********';
                $placeholder = str_repeat('•', strlen($displayedPassword));
                
                $html .= "<tr data-type='student'>";
                $html .= "<td style='width: 1%;'>" . $i++ . "</td>"; // FIXED: Moved increment outside complex string interpolation
                $html .= "<td>" . htmlspecialchars($record['student_name']) . "</td>";
                $html .= "<td class='password-cell'><div class='password-content-wrapper'>";
                $html .= "<span id='password-student-{$recordId}' data-password-hidden='true' data-actual-password='".htmlspecialchars($displayedPassword)."'>" . $placeholder . "</span>";
                $html .= "<button class='password-toggle-btn' onclick=\"togglePasswordVisibility('student', {$recordId}, this)\">Show</button>";
                $html .= "</div></td>";
                $html .= "<td>" . htmlspecialchars($record['lrn'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['level'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['email'] ?? '-') . "</td>";
                $html .= "<td class='text-center-td'>" . htmlspecialchars($record['age'] ?? '-') . "</td>";
                $html .= "<td class='text-center-td'>" . htmlspecialchars($record['gender'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['contact'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['address'] ?? '-') . "</td>";
                $html .= "<td class='crud-actions'><div class='flex space-x-2 justify-center items-center h-full'>";
                $html .= "<button class='edit' data-record='{$recordJsonString}' data-type='student' onclick='showModal(\"edit\", \"student\", {$recordJsonString})'>Edit</button>";
                $html .= "<button class='delete' data-id='".htmlspecialchars($record['student_id'])."' data-type='student' onclick='deleteRecord(".htmlspecialchars($record['student_id']).", \"student\")'>Delete</button>";
                $html .= "</div></td></tr>";
            }
        } else { // teacher
            $table = 'teacher';
            $nameColumn = 'teacher_name';
            $idColumn = 'teacher_id';
            $selectFields = "teacher_id, teacher_name, password, contact, email, faculty_role";
            $headers = ['ID', 'Teacher Name', 'Password', 'Faculty Role', 'Contact', 'Email', 'Action'];

            if (!empty($cleanQuery)) {
                // FIXED: Search across teacher_name or email
                $whereClause = " WHERE LOWER($nameColumn) LIKE '%$cleanQuery%'
                                 OR LOWER(email) LIKE '%$cleanQuery%'";
            }
            
            $sql = "SELECT $selectFields FROM $table $whereClause ORDER BY $nameColumn ASC";
            $result = $conn->query($sql);
            $records = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

            $i = 1;
            foreach ($records as $record) {
                $recordJsonString = htmlspecialchars(json_encode($record), ENT_QUOTES, 'UTF-8');
                $recordId = $record['teacher_id'];
                $displayedPassword = $record['password'] ?? '********';
                $placeholder = str_repeat('•', strlen($displayedPassword));

                $html .= "<tr data-type='teacher' class='hidden'>";
                $html .= "<td style='width: 1%;'>" . $i++ . "</td>"; // FIXED: Moved increment outside complex string interpolation
                $html .= "<td>" . htmlspecialchars($record['teacher_name']) . "</td>";
                $html .= "<td class='password-cell'><div class='password-content-wrapper'>";
                $html .= "<span id='password-teacher-{$recordId}' data-password-hidden='true' data-actual-password='".htmlspecialchars($displayedPassword)."'>" . $placeholder . "</span>";
                $html .= "<button class='password-toggle-btn' onclick=\"togglePasswordVisibility('teacher', {$recordId}, this)\">Show</button>";
                $html .= "</div></td>";
                $html .= "<td>" . htmlspecialchars($record['faculty_role'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['contact'] ?? '-') . "</td>";
                $html .= "<td>" . htmlspecialchars($record['email'] ?? '-') . "</td>";
                $html .= "<td class='crud-actions'><div class='flex space-x-2 justify-center items-center h-full'>";
                $html .= "<button class='edit' data-record='{$recordJsonString}' data-type='teacher' onclick='showModal(\"edit\", \"teacher\", {$recordJsonString})'>Edit</button>";
                $html .= "<button class='delete' data-id='".htmlspecialchars($record['teacher_id'])."' data-type='teacher' onclick='deleteRecord(".htmlspecialchars($record['teacher_id']).", \"teacher\")'>Delete</button>";
                $html .= "</div></td></tr>";
            }
        }
        return $html;
    }
    // --- END FUNCTION ---
    
    // =========================================================================
    // 2. AJAX CRUD HANDLER START (Handles POST requests for CUD operations)
    // =========================================================================

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = $_POST['action'];
        $type = $_POST['type'] ?? 'student'; // New: determine if student or teacher operation
        $response = ['success' => false, 'message' => 'Unknown error.'];

        try {
            if ($action === 'delete') {
                $id = (int)$_POST['id'];
                $record_email = $_POST['email'] ?? ''; // Fetch email passed from JS for user delete
                
                // 1. Fetch record data (just to confirm level/role)
                if ($type === 'student') {
                    $table = 'student_profile';
                    $idColumn = 'student_id';
                    $sql_fetch = "SELECT email, level FROM student_profile WHERE student_id = ?";
                } else {
                    $table = 'teacher';
                    $idColumn = 'teacher_id';
                    $sql_fetch = "SELECT email, faculty_role FROM teacher WHERE teacher_id = ?";
                }

                $stmt_fetch = $conn->prepare($sql_fetch);
                $stmt_fetch->bind_param("i", $id);
                $stmt_fetch->execute();
                $result_fetch = $stmt_fetch->get_result();
                $record_data = $result_fetch->fetch_assoc();
                $stmt_fetch->close();
                
                if ($record_data) {
                    $record_email = $record_data['email']; // Use DB email if available
                    $record_level = ($type === 'student') ? $record_data['level'] : (($record_data['faculty_role'] === 'Admin') ? 'admin' : 'teacher');

                    // 2. DELETE from main profile table (student_profile or teacher)
                    $sql_profile_delete = "DELETE FROM $table WHERE $idColumn = ?";
                    $stmt_profile_delete = $conn->prepare($sql_profile_delete);
                    $stmt_profile_delete->bind_param("i", $id);
                    if (!$stmt_profile_delete->execute()) {
                         throw new Exception("Database deletion (profile) failed: " . $stmt_profile_delete->error);
                    }
                    $stmt_profile_delete->close();
                    
                    // 3. DELETE from users table using email and level to ensure we delete the correct user entry
                    $sql_users_delete = "DELETE FROM users WHERE email = ? AND level = ?";
                    $stmt_users_delete = $conn->prepare($sql_users_delete);
                    $stmt_users_delete->bind_param("ss", $record_email, $record_level);
                    
                    if (!$stmt_users_delete->execute()) {
                         // Note: We might log an error here but still return success if the profile deletion succeeded,
                         // as the primary record is gone. However, for strict integrity, we throw:
                         throw new Exception("Database deletion (users) failed: " . $stmt_users_delete->error);
                    }
                    $stmt_users_delete->close();

                    if (function_exists('resetAutoIncrement')) {
                        resetAutoIncrement($conn, $table);
                    }
                    $response = ['success' => true, 'message' => ucfirst($type) . ' record deleted successfully from profile and users table.'];

                } else {
                    throw new Exception("Record not found for deletion.");
                }


            } else if ($action === 'add' || $action === 'edit') {

                if ($type === 'student') {
                    // STUDENT CRUD - Targetting 'student_profile' table
                    $student_id = (int)($_POST['student_id'] ?? 0); 
                    // MODIFIED: Use 'name' from form but map to 'student_name' in DB logic
                    $student_name = $conn->real_escape_string($_POST['name']); 
                    $password = $_POST['password'] ?? '';
                    // REMOVED HASHING: Storing plaintext password
                    $plain_password = $conn->real_escape_string($password); 
                    
                    $lrn = $conn->real_escape_string($_POST['lrn']);
                    $level = $conn->real_escape_string($_POST['level']);
                    $email = $conn->real_escape_string($_POST['email']);
                    $birthday = $conn->real_escape_string($_POST['birthday']);
                    $gender = $conn->real_escape_string($_POST['gender']);
                    $contact = $conn->real_escape_string($_POST['contact']);
                    $address = $conn->real_escape_string($_POST['address']);

                    // --- INPUT VALIDATION ---
                    if (empty($student_name) || empty($lrn) || empty($level) || empty($birthday) || empty($gender)) {
                         throw new Exception("Please fill out all required student fields.");
                    }
                    
                    // LRN VALIDATION: Must be exactly 12 digits
                    if (strlen($lrn) != 12 || !is_numeric($lrn)) {
                         throw new Exception("LRN must be exactly 12 numeric digits.");
                    }
                    
                    if ($action === 'add' || ($action === 'edit' && !empty($plain_password))) {
                        // Password must be exactly 8 digits/characters
                        if (strlen($plain_password) != 8) {
                             throw new Exception("Password must be exactly 8 characters long.");
                        }
                    }
                    // --- END INPUT VALIDATION ---

                    if ($action === 'add') {
                        // Password is REQUIRED for new accounts (validation done above)
                        
                        // 1. INSERT into student_profile
                        $sql_profile = "INSERT INTO student_profile (student_name, password, lrn, level, email, birthday, gender, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt_profile = $conn->prepare($sql_profile);
                        // Bind parameters WITH password (9 strings)
                        $stmt_profile->bind_param("sssssssss", $student_name, $plain_password, $lrn, $level, $email, $birthday, $gender, $contact, $address);

                        if (!$stmt_profile->execute()) {
                            throw new Exception("Database insertion (student_profile) failed: " . $stmt_profile->error);
                        }
                        $stmt_profile->close();
                        
                        // 2. INSERT into users table for authentication
                        $sql_users = "INSERT INTO users (name, email, lrn, password, level) VALUES (?, ?, ?, ?, ?)";
                        $stmt_users = $conn->prepare($sql_users);
                        $stmt_users->bind_param("sssss", $student_name, $email, $lrn, $plain_password, $level);
                        
                        if (!$stmt_users->execute()) {
                            // OPTIONAL: If users table insert fails, you might want to rollback student_profile insert here.
                            throw new Exception("Database insertion (users) failed: " . $stmt_users->error);
                        }
                        $stmt_users->close();

                    } else { // edit
                        if (!empty($plain_password)) {
                            // If password is provided, update it (re-enabling password update logic)
                            $sql_profile = "UPDATE student_profile SET student_name=?, password=?, lrn=?, level=?, email=?, birthday=?, gender=?, contact=?, address=? WHERE student_id=?";
                            $stmt_profile = $conn->prepare($sql_profile);
                            $stmt_profile->bind_param("sssssssssi", $student_name, $plain_password, $lrn, $level, $email, $birthday, $gender, $contact, $address, $student_id);

                            $sql_users = "UPDATE users SET name=?, password=?, lrn=?, email=?, level=? WHERE email=? AND (level='elementary' OR level='juniorhigh' OR level='seniorhigh')";
                            $stmt_users = $conn->prepare($sql_users);
                            $stmt_users->bind_param("ssssss", $student_name, $plain_password, $lrn, $email, $level, $email);
                            
                        } else {
                            // If password is NOT provided, skip updating it (standard update without password)
                            $sql_profile = "UPDATE student_profile SET student_name=?, lrn=?, level=?, email=?, birthday=?, gender=?, contact=?, address=? WHERE student_id=?";
                            $stmt_profile = $conn->prepare($sql_profile);
                            $stmt_profile->bind_param("ssssssssi", $student_name, $lrn, $level, $email, $birthday, $gender, $contact, $address, $student_id);

                            $sql_users = "UPDATE users SET name=?, lrn=?, email=?, level=? WHERE email=? AND (level='elementary' OR level='juniorhigh' OR level='seniorhigh')";
                            $stmt_users = $conn->prepare($sql_users);
                            $stmt_users->bind_param("sssss", $student_name, $lrn, $email, $level, $email);
                        }
                        
                        // Execute updates
                        if (!$stmt_profile->execute()) { throw new Exception("Database update (student_profile) failed: " . $stmt_profile->error); }
                        if (!$stmt_users->execute()) { throw new Exception("Database update (users) failed: " . $stmt_users->error); }
                        
                        $stmt_profile->close();
                        $stmt_users->close();
                    }
                } else {
                    // TEACHER CRUD (Requires 'password' column, which is present in teacher table)
                    $teacher_id = (int)($_POST['teacher_id'] ?? 0);
                    $name = $conn->real_escape_string($_POST['name']);
                    $password = $_POST['password'] ?? '';
                    // REMOVED HASHING: Storing plaintext password
                    $plain_password = $conn->real_escape_string($password);
                    
                    $contact = $conn->real_escape_string($_POST['contact']);
                    $email = $conn->real_escape_string($_POST['email']);
                    $role = $conn->real_escape_string($_POST['faculty_role']);
                    $user_level = ($role === 'Admin') ? 'admin' : 'teacher'; // Map role to users.level enum

                    // --- INPUT VALIDATION ---
                    if (empty($name) || empty($contact) || empty($email) || empty($role)) {
                         throw new Exception("Please fill out all required teacher fields.");
                    }
                    
                    if ($action === 'add' || ($action === 'edit' && !empty($plain_password))) {
                         if (strlen($plain_password) != 8) {
                             throw new Exception("Password must be exactly 8 characters long.");
                        }
                    }
                    // --- END INPUT VALIDATION ---

                    if ($action === 'add') {
                        // Password is required 
                        
                        // 1. INSERT into teacher
                        $sql_teacher = "INSERT INTO teacher (teacher_name, password, contact, email, faculty_role) VALUES (?, ?, ?, ?, ?)";
                        $stmt_teacher = $conn->prepare($sql_teacher);
                        // Use the plaintext password
                        $stmt_teacher->bind_param("sssss", $name, $plain_password, $contact, $email, $role);
                        
                        if (!$stmt_teacher->execute()) {
                            throw new Exception("Database insertion (teacher) failed: " . $stmt_teacher->error);
                        }
                        $stmt_teacher->close();

                        // 2. INSERT into users table for authentication (LRN empty for faculty)
                        $sql_users = "INSERT INTO users (name, email, lrn, password, level) VALUES (?, ?, '', ?, ?)";
                        $stmt_users = $conn->prepare($sql_users);
                        $empty_lrn = '';
                        $stmt_users->bind_param("ssss", $name, $email, $plain_password, $user_level);
                        
                        if (!$stmt_users->execute()) {
                            // OPTIONAL: If users table insert fails, you might want to rollback teacher insert here.
                            throw new Exception("Database insertion (users) failed: " . $stmt_users->error);
                        }
                        $stmt_users->close();

                    } else { // edit
                        if (!empty($plain_password)) {
                             // If password is provided, update it
                            $sql_teacher = "UPDATE teacher SET teacher_name=?, password=?, contact=?, email=?, faculty_role=? WHERE teacher_id=?";
                            $stmt_teacher = $conn->prepare($sql_teacher);
                            // Use the plaintext password
                            $stmt_teacher->bind_param("sssssi", $name, $plain_password, $contact, $email, $role, $teacher_id);
                            
                            $sql_users = "UPDATE users SET name=?, password=?, level=? WHERE email=? AND (level='teacher' OR level='admin')";
                            $stmt_users = $conn->prepare($sql_users);
                            $stmt_users->bind_param("ssss", $name, $plain_password, $user_level, $email);

                        } else {
                            // If password is NOT provided, skip updating it
                            $sql_teacher = "UPDATE teacher SET teacher_name=?, contact=?, email=?, faculty_role=? WHERE teacher_id=?";
                            $stmt_teacher = $conn->prepare($sql_teacher);
                            $stmt_teacher->bind_param("ssssi", $name, $contact, $email, $role, $teacher_id);
                            
                            $sql_users = "UPDATE users SET name=?, level=? WHERE email=? AND (level='teacher' OR level='admin')";
                            $stmt_users = $conn->prepare($sql_users);
                            $stmt_users->bind_param("sss", $name, $user_level, $email);
                        }
                        
                        // Execute updates
                        if (!$stmt_teacher->execute()) { throw new Exception("Database update (teacher) failed: " . $stmt_teacher->error); }
                        if (!$stmt_users->execute()) { throw new Exception("Database update (users) failed: " . $stmt_users->error); }
                        
                        $stmt_teacher->close();
                        $stmt_users->close();
                    }
                }

                // If all database operations were successful
                $response = ['success' => true, 'message' => ucfirst($type) . ' record ' . ($action === 'add' ? 'added' : 'updated') . ' successfully, and authentication record updated.'];

            }
            // --- END ADD / EDIT LOGIC ---

            // --- AJAX SEARCH HANDLER ---
            else if ($action === 'search') {
                $searchQuery = $_POST['search_query'] ?? '';
                $type = $_POST['type'] ?? 'student';
                
                if ($db_connected) {
                    $htmlRows = fetchAndRenderTableRows($conn, $type, $searchQuery);
                    
                    // Also grab updated counts for charts/cards
                    $studentElementaryCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'elementary'")->fetch_assoc()['count'] ?? 0; // RENAMED
                    $studentJuniorHighCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'juniorhigh'")->fetch_assoc()['count'] ?? 0; // RENAMED
                    $studentSeniorHighCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'seniorhigh'")->fetch_assoc()['count'] ?? 0; // RENAMED
                    $totalAccounts = $studentElementaryCount + $studentJuniorHighCount + $studentSeniorHighCount;


                    $response = [
                        'success' => true, 
                        'html' => $htmlRows,
                        'stats' => [
                            'total' => (int)$totalAccounts,
                            'elementary' => (int)$studentElementaryCount, // RENAMED
                            'juniorhigh' => (int)$studentJuniorHighCount, // RENAMED
                            'seniorhigh' => (int)$studentSeniorHighCount  // RENAMED
                        ]
                    ];

                } else {
                     $response['message'] = 'Database connection failed. Cannot perform live search.';
                }
            }
            // --- END AJAX SEARCH HANDLER ---

        } catch (Exception $e) {
            $response['message'] = 'Operation Failed: ' . $e->getMessage();
        }

        $conn->close();
        header('Content-Type: application/json');
        echo json_encode($response);
        exit; // Terminate script execution after AJAX response
    }

    // =========================================================================
    // AJAX REQUEST HANDLER END
    // =========================================================================


    // =====================================================================
    // 3. FETCH DASHBOARD STATS & DATA (For initial page load)
    // =====================================================================

    // a) Get Total Account Count
    $sqlTotal = "SELECT COUNT(*) AS total_accounts FROM student_profile";
    $resultTotal = $conn->query($sqlTotal);
    $totalAccounts = $resultTotal ? $resultTotal->fetch_assoc()['total_accounts'] : 0;

    // b) Get Counts by Level (for Charts/Cards)
    $studentElementaryCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'elementary'")->fetch_assoc()['count'] ?? 0; // RENAMED
    $studentJuniorHighCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'juniorhigh'")->fetch_assoc()['count'] ?? 0; // RENAMED
    $studentSeniorHighCount = $conn->query("SELECT COUNT(*) AS count FROM student_profile WHERE level = 'seniorhigh'")->fetch_assoc()['count'] ?? 0; // RENAMED
    
    // c) Fetch ALL Student Data & Teacher Data for initial render (uses existing logic)
    $searchQuery = $_GET['search_query'] ?? '';
    
    $studentsHtml = fetchAndRenderTableRows($conn, 'student', $searchQuery);
    $teachersHtml = fetchAndRenderTableRows($conn, 'teacher', $searchQuery);

}

// =====================================================================
// 4. MODULE COUNT INJECTION (Hardcoded based on modules.php structure)
// This must use separate variables to avoid overwriting Student Counts.
// =====================================================================
$elementaryModuleCount = 19;
$juniorHighModuleCount = 25; // RENAMED module count
$seniorHighModuleCount = 5;  // RENAMED module count
$totalModules = $elementaryModuleCount + $juniorHighModuleCount + $seniorHighModuleCount;

// Handle session data for sidebar
$user_id = $_SESSION['user_id'] ?? 'GUEST_ID';
$user_level_raw = $_SESSION['user_level'] ?? 'default';
$user_name = $_SESSION['user_name'] ?? "Logged-in User";
$profile_pic_url = $_SESSION['profile_pic'] ?? 'https://placehold.co/100x100/3f3f46/ffffff?text=User';

// Map the raw level from the session to the desired display text
switch ($user_level_raw) {
    case 'elementary':
        $user_level_display = 'Elementary | Explorer';
        break;
    case 'juniorhigh':
        $user_level_display = 'Junior | Explorer';
        break;
    case 'seniorhigh':
        $user_level_display = 'Senior | Explorer';
        break;
    default:
        $user_level_display = 'Student | Explorer';
        break;
}

// Close connection after fetching data (only if it was successfully opened and not closed in AJAX block)
if ($db_connected && isset($conn) && $conn->ping()) {
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // PHP variables passed to JavaScript for charts
        const totalAccounts = <?php echo $totalAccounts; ?>;
        // UPDATED: Use the new Student count variables here
        const elementaryCount = <?php echo $studentElementaryCount; ?>;
        const juniorHighCount = <?php echo $studentJuniorHighCount; ?>;
        const seniorHighCount = <?php echo $studentSeniorHighCount; ?>;
        const dbConnected = <?php echo json_encode($db_connected); ?>;
        const currentSearchQuery = <?php echo json_encode($searchQuery ?? ''); ?>; // Pass current search query to JS

        // Load Google Charts
        google.charts.load('current', {'packages':['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts(el = 'chart_div') {
            // FIX: Explicitly use window. variables to ensure the latest AJAX-updated values are used
            const chartData = [
                ['Level', 'Number of Students', { role: 'style' }],
                // The window variables are updated by the searchRecords AJAX call.
                ['Elementary', window.elementaryCount, '#2563eb'], // Blue-600
                ['Junior High', window.juniorHighCount, '#3b82f6'], // Blue-500
                ['Senior High', window.seniorHighCount, '#60a5fa']  // Blue-400
            ];
            
            // Column Chart
            var columnData = google.visualization.arrayToDataTable(chartData);

            var columnOptions = {
                title: 'Column Chart',
                backgroundColor: 'transparent',
                chartArea: { width: '85%', height: '80%', backgroundColor: '#ffffff' }, // White Chart Background
                hAxis: {
                    title: '', minValue: 0,
                    textStyle: { fontName: 'Poppins', color: '#1e293b' },
                    gridlines: { color: '#e2e8f0' }
                },
                vAxis: {
                    textStyle: { fontName: 'Poppins', color: '#1e293b' },
                    gridlines: { color: '#e2e8f0' }
                },
                legend: { position: 'none' },
                animation: { startup: true, duration: 1000, easing: 'out' },
                colors: ['#2563eb', '#3b82f6', '#60a5fa'],
                fontName: 'Poppins',
                titleTextStyle: { fontName: 'Poppins', fontSize: 16, alignment: 'center', color: '#1e293b' }
            };

            var columnChart = new google.visualization.ColumnChart(document.getElementById('column_chart_div'));
            columnChart.draw(columnData, columnOptions);

            // Pie Chart
            var pieData = google.visualization.arrayToDataTable([
                ['Level', 'Number of Students'],
                ['Elementary', window.elementaryCount], 
                ['Junior High', window.juniorHighCount], 
                ['Senior High', window.seniorHighCount]
            ]);

            var pieOptions = {
                title: 'Pie Chart',
                is3D: true,
                backgroundColor: 'transparent',
                colors: ['#2563eb', '#3b82f6', '#60a5fa'],
                fontName: 'Poppins',
                pieSliceText: 'percentage',
                animation: { startup: true, duration: 1500, easing: 'out' },
                chartArea: { left: 'auto', top: '10%', width: '90%', height: '80%' },
                titleTextStyle: { fontName: 'Poppins', fontSize: 16, alignment: 'center', color: '#1e293b' },
                legend: { position: 'bottom', textStyle: { color: '#1e293b' } }
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
            pieChart.draw(pieData, pieOptions);
        }

        // Initialize global counters for JS use, necessary for live chart updates
        window.totalAccounts = totalAccounts;
        window.elementaryCount = elementaryCount;
        window.juniorHighCount = juniorHighCount;
        window.seniorHighCount = seniorHighCount;
    </script>
    <style>
        /* Light Theme Colors */
        :root {
            --bg-main: #f8fafc; /* Reverted to Slate-50 (light gray) for main background */
            --bg-card: #ffffff; /* White Card/Element Background */
            --bg-sidebar: #eff6ff; /* New variable: Blue-50 for light blue sidebar */
            --text-primary: #1e293b; /* Dark Text (Slate-900) */
            --text-secondary: #64748b; /* Medium Gray Text (Slate-500) */
            --border-color: #e2e8f0; /* Light Border/Separator (Slate-200) */
            --border-dark: #cbd5e1; /* New variable: Slate-300 for dark outline */
            --accent-green: #10b981; /* Success Green (Emerald-500) */
            --accent-blue: #3b82f6; /* Primary Blue (Blue-500) */
            --table-header: #f1f5f9; /* Light Table Header (Slate-100) */
            --table-row-hover: #f1f5f9; /* Slightly lighter row hover (Slate-100) */

            /* Action/CRUD Buttons */
            --crud-action-color: #3b82f6; /* Vibrant Blue (Blue-500) */
            --crud-action-color-hover: #2563eb; /* Darker Blue (Blue-600) */
            --crud-action-color-light: #3b82f6;
            --crud-action-color-light-hover: #2563eb;

            /* NEW: Shadow/Glow color adjusted for light theme */
            --glow-color: #e0f2f1; /* Pale Blue/Cyan for subtle focus glow */
            --base-glow-color: #3b82f6; /* Blue-500 */
            --base-pulse-color: #3b82f6;
        }

        /* CSS ANIMATION - Pulse for Light Background */
        @keyframes pulse-blue {
            /* Changed color to a subtle blue/gray glow */
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.2); }
            50% { box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.4); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.2); }
        }

        /* Set up the font to Poppins */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary); /* Set default text color to dark */
            scroll-behavior: smooth;
        }

        /* Enforce Poppins on all form elements and tables */
        .crud-table, .modal-form input, .modal-form select, .modal-form textarea, .crud-actions button {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom scrollbar to keep the light theme aesthetic in the sidebar */
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-thumb { background-color: #94a3b8; border-radius: 2px; } /* Slate-400 */
        .custom-scroll::-webkit-scrollbar-track { background-color: var(--bg-sidebar); } /* Use sidebar BG color */

        /* Ensure fixed sidebar and main content spacing is correct on desktop */
        @media (min-width: 1024px) {
            .main-content { margin-left: 16rem; }
        }

        /* Card Styling for Dashboard */
        .dashboard-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 0.75rem;
            position: relative;
            /* Enhanced Shadow on Hover (Lighter for light theme) */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: var(--bg-card); /* White Card BG */
            color: var(--text-primary); /* Dark text color */
            display: flex; flex-direction: column; align-items: flex-start;
            justify-content: center;
            padding: 1.5rem 1.75rem;

            /* UPDATED: Initial Light Blue Border + Pulse Animation */
            border: 1px solid var(--border-color); /* Subtle border */
            animation: pulse-blue 3s infinite ease-in-out; /* Slower, subtle pulse */
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-count {
            font-size: 2.5rem;
            font-weight: 800; line-height: 1; margin-top: 0.5rem; margin-bottom: 0.25rem;
            color: var(--accent-blue); /* Use primary blue for number */
        }
        .card-title {
            font-size: 1rem;
            font-weight: 500; opacity: 0.8;
            color: var(--text-secondary); /* Use secondary color for title */
        }

        /* Removed Individual card gradients */
        .card-total, .card-elementary, .card-junior, .card-senior {
            background-image: none;
            background-color: var(--bg-card);
        }

        /* Module Circle Card Styling (NEW) */
        .module-circle-card {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            width: 100%;
            max-width: 220px;
            height: 220px;
            border-radius: 9999px;
            color: var(--text-primary);
            background-color: var(--bg-card); /* White BG */
            font-weight: 700; text-align: center;
            margin: 0 auto;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);

            /* UPDATED: Initial Light Blue Border + Pulse Animation */
            animation: pulse-blue 3s infinite ease-in-out;
            border: 2px solid var(--border-color); /* Subtle border */
        }
        .module-circle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .module-count {
            font-size: 3.5rem;
            line-height: 1;
            color: var(--accent-blue); /* Use primary blue for number */
        }
        .module-label {
            font-size: 1.1rem;
            margin-top: 0.5rem; opacity: 0.9;
        }

        /* Adjusted the container of the circle cards to be transparent so the circles can blend into the body background */
        .module-circle-container-parent {
            background-color: transparent;
            padding: 2rem;
            border-radius: 1rem;
        }


        /* Chart specific styling */
        .chart-container {
            background-color: var(--bg-card); /* White Card BG */
            border-radius: 1rem;
            /* PERMANENT GLOW EFFECT (Charts - Adjusted for light theme) */
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.1), 0 4px 12px rgba(0, 0, 0, 0.05); /* Subtle blue glow */
            border: 1px solid var(--border-color);
            /* -------------------- */
            padding: 1.5rem;
            /* Set text color for surrounding elements */
            color: var(--text-primary);
            /* Keep transition for smoothness if other properties were to change */
            transition: box-shadow 0.3s ease-in-out, border-color 0.3s ease-in-out;
        }

        /* Ensure charts are responsive */
        #column_chart_div, #pie_chart_div { width: 100% !important; height: 400px !important; }

        /* --- CRUD Table specific styling --- */
        .crud-container {
            width: 100%;
            background-color: var(--bg-card); /* White Card BG */
            padding: 2rem;
            border-radius: 1.5rem;
            /* PERMANENT GLOW EFFECT (Table - Adjusted for light theme) */
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.1), 0 8px 25px rgba(0, 0, 0, 0.08); /* Subtle blue glow */
            border: 1px solid var(--border-color);
            transition: box-shadow 0.3s ease-in-out, border-color 0.3s ease-in-out;
            /* ----------------------------------------------------------------- */
            margin-top: 2rem;
            position: relative;
            z-index: 10;
            overflow-x: auto;
        }

        .crud-table {
            width: 100%; border-collapse: separate; border-spacing: 0; font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary); /* Default table text color */
        }

        .crud-table thead th {
            background-color: var(--table-header); /* Light Header BG */
            padding: 1rem 1.25rem; text-align: left;
            font-weight: 600;
            color: var(--text-primary); /* Dark Header Text */
            border-bottom: 2px solid var(--border-color);
        }

        /* NEW: Custom class for centering table content */
        .text-center-th {
            text-align: center;
        }
        /* NEW: Custom class for centering table content */
        .text-center-td {
            text-align: center;
        }
        
        /* FIX: Center the Action buttons horizontally */
        .crud-table thead th.action-header { 
            text-align: center; /* Center the "Action" text in the header */
        }
        /* ADDED: Explicit vertical alignment for flex containers in table body */
        .crud-table tbody td.crud-actions {
            vertical-align: top;
        }
        /* MODIFIED: Removed the previous custom centering rule that was being replaced by inline flex. */
        /* If you need additional styling for the action buttons container, place it here: */


        .crud-table tbody td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: top;
        }

        .crud-table tbody tr:last-child td { border-bottom: none; }
        .crud-table tbody tr:hover { background-color: var(--table-row-hover); } /* Very light row hover */

        .crud-actions button {
            padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 500;
            transition: background-color 0.2s ease, transform 0.1s ease; cursor: pointer;
            display: inline-flex; align-items: center; justify-content: center;

            /* REMOVED margin-right: 0.5rem; */

            font-family: 'Poppins', sans-serif;
        }

        /* Search Input Styling */
        .crud-container input[type="text"] {
             background-color: var(--table-header); /* Light BG for input */
             color: var(--text-primary);
             border-color: var(--border-color);
        }
        .crud-container input[type="text"]:focus {
            background-color: var(--bg-card);
        }

        /* --- CRUD Buttons --- */
        /* Search Button: Primary Blue */
        #searchBtn { 
            /* This is now removed from HTML, keeping CSS just in case */
            display: none; 
        }
        
        /* Add Button: Primary Blue */
        #addStudentBtn { background-color: var(--crud-action-color-light); color: #ffffff; }
        #addStudentBtn:hover { background-color: var(--crud-action-color-light-hover); }

        /* Edit Button: Primary Blue */
        .crud-actions button.edit { background-color: var(--crud-action-color-light); color: #ffffff; }
        .crud-actions button.edit:hover { background-color: var(--crud-action-color-light-hover); transform: translateY(-1px); }

        /* Delete Button */
        .crud-actions button.delete { background-color: #ef4444; color: #ffffff; } /* Red for Delete */
        .crud-actions button.delete:hover { background-color: #dc2626; transform: translateY(-1px); }

        /* Modal Overlay - Ensures the background is dimmed and the modal is centered */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Dark semi-transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Modal Content - The actual box that holds the form */
        .modal-content {
            background-color: var(--bg-card);
            color: var(--text-primary);
            width: 90%;
            max-width: 600px;
            max-height: 90vh; /* Limits the modal height to prevent it from going off-screen */
            overflow-y: auto; /* Adds scroll if content exceeds max-height */
            padding: 2.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); /* Lighter shadow for light theme */
            position: relative; /* Essential for positioning the close button */
            transform: scale(0.9);
            transition: transform 0.3s ease-in-out;
        }

        .modal-overlay.show .modal-content {
            transform: scale(1);
        }

        /* Close Button for Modal */
        .modal-close-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--text-secondary);
            padding: 0.5rem; /* Make it easier to click */
            line-height: 1;
            transition: color 0.2s ease;
        }
        .modal-close-button:hover {
            color: var(--text-primary);
        }

        /* Modal Form Styling */
        .modal-form {
            display: grid;
            gap: 0.75rem; /* Field group gap */
        }
        /* Label/Sign Styling */
        .modal-form label {
            color: var(--text-secondary);
            font-weight: 500;
            margin-bottom: 1.5px;
        }
        /* Input/Form Element Styling */
        .modal-form input,
        .modal-form select,
        .modal-form textarea {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: var(--table-header); /* Light input field background */
            color: var(--text-primary);
            border: 1px solid var(--border-color);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            margin-top: 0;
            margin-bottom: 1.5px; /* Applied 1.5px spacing under the input field */
        }
        .modal-form input:focus,
        .modal-form select:focus,
        .modal-form textarea:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); /* Light blue shadow */
        }
        .modal-form button[type="submit"] {
            width: 100%;
            padding: 0.75rem 1.5rem;
            margin-top: 1rem;
            border-radius: 0.5rem;
            background-color: var(--accent-blue);
            color: #ffffff; /* White text on blue */
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }
        .modal-form button[type="submit"]:hover {
            background-color: var(--crud-action-color-hover);
            transform: translateY(-1px);
        }
        .modal-form button[type="submit"]:disabled {
            background-color: #94a3b8; /* Gray out when disabled */
            cursor: not-allowed;
            transform: none;
        }

        /* Modal Error Message fix */
        #modal-error-message {
            color: #dc2626 !important; /* Explicitly red for errors */
            font-size: 0.9rem;
        }

        /* Message Box styling (for showMessage) */
        .message-box {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 8px;
            color: #ffffff; /* White text on colored background */
            font-weight: 600;
            opacity: 0;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            transform: translateX(100%);
            z-index: 10000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .message-box.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* NEW CSS for Sidebar Link Transition */
        .sidebar-link-transition {
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        /* Active Link Styling (used by JS) */
        .sidebar-active {
            background-color: #dbeafe; /* Blue-100 */
            color: #1d4ed8; /* Blue-700 */
            font-weight: 600;
        }

        /* Active Link Hover (used by JS) */
        .sidebar-active:hover {
            background-color: #bfdbfe; /* Blue-200 */
        }

        /* Style for the View Switcher */
        .view-switcher input[type="radio"] {
            display: none;
        }
        .view-switcher label {
            cursor: pointer;
            padding: 0.5rem 1.5rem;
            border: 2px solid var(--accent-blue);
            color: var(--accent-blue);
            border-radius: 0.5rem;
            transition: background-color 0.3s, color 0.3s;
            font-weight: 600;
            /* NEW: Set minimum width to ensure they are the same size */
            min-width: 120px;
            text-align: center;
        }
        .view-switcher input[type="radio"]:checked + label {
            background-color: var(--accent-blue);
            color: #ffffff;
        }
        .view-switcher label:first-of-type {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-right: none;
        }
        .view-switcher label:last-of-type {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            margin-left: -2px; /* Overlap the border for a cleaner look */
        }
        
        /* NEW CSS for Password Toggle Button */
        .password-toggle-btn {
            background-color: transparent;
            color: var(--accent-blue);
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border: none;
            border-radius: 0.25rem;
            transition: color 0.2s;
            line-height: 1;
            margin-left: 0; /* Removed margin-left to align better */
            margin-top: 0.25rem; /* Added small margin top to separate from password text */
            cursor: pointer;
            display: block; /* Make it a block element to stack below the password text */
            text-align: left; /* Align button text to the left */
        }
        .password-toggle-btn:hover {
            color: var(--crud-action-color-hover);
        }

        /* MODIFIED: Ensure password cell respects vertical alignment of the row */
        .crud-table tbody td.password-cell {
            /* Keep vertical-align: top; from general td style */
            padding: 1rem 1.25rem; /* Increased padding slightly for consistency */
            /* Removed custom vertical padding settings */
        }

        /* NEW: Container to stack the password and button vertically, aligned to the top/left of the cell */
        .password-content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align content to the left/top */
            justify-content: flex-start;
            height: 100%;
        }

        /* MODIFIED: Ensure the inner span (password text) aligns left */
        .crud-table tbody td.password-cell > span {
             display: block; /* Ensure span respects text alignment */
             text-align: left;
        }
        
        /* MODIFIED: Ensure the inner flex container spans the full available height and width */
        .crud-table tbody td.password-cell > span, 
        .crud-table tbody td.password-cell > button {
             /* Resetting margin/padding on direct children if needed */
        }

        /* --- New Multi-Search Styling --- */
        /* Reduced vertical padding on the overall search container for a tighter look */
        .crud-container #multiSearchContainer {
            padding-top: 0.5rem; /* Reduced from 1rem */
            padding-bottom: 0.5rem; /* Reduced from 1rem */
            margin-bottom: 1rem; /* Reduced from 2rem to bring table closer */
        }


        .multi-search-input-wrapper {
            position: relative;
            /* Use slightly more space to reduce input width by increasing gap */
            width: 100%;
            /* Added margin right to push elements */
            margin-right: 0.5rem; /* Equivalent to space-x-2 */
        }

        /* Override w-1/3 margins for layout flexibility */
        /* Change from 1/3 width to allow more space for the button */
        @media (min-width: 640px) { /* sm: breakpoint */
             /* Adjusted total space for 3 elements + button */
            #multiSearchContainer {
                /* Reduced horizontal padding to allow more space for inputs/button */
                padding: 0; 
                margin: 0;
                width: 100%;
                /* Using space-x-2 to leave more internal space for the button */
                gap: 0.5rem; 
            }
             /* Distribute width for the three search inputs (approx 29.33% each) */
            #multiSearchContainer > div:nth-child(-n+3) {
                /* NEW CALCULATION: (88% / 3) = 29.33%. 
                   88% of container space remains after 12% button is taken.
                   Width calculation: (88% of container width - 3 gaps*8px) / 3 
                   Let's use 29.3% as the base percentage of the container width. */
                width: calc(29.3% - 8px); 
                margin: 0;
            }
             /* Adjust the button width/margin for desktop view */
            #addRecordBtn {
                 width: 12%; /* Setting button width to 12% explicitly */
                 margin: 0;
                 white-space: nowrap; /* Ensure text doesn't wrap */
                 padding: 0.5rem 0.75rem; /* Reduced padding slightly to ensure single line fit */
            }
        }
        
        @media (min-width: 1024px) { /* lg: breakpoint and up */
            #multiSearchContainer {
                padding: 0; 
            }
            /* Inputs should take roughly 29.33% each. */
            #multiSearchContainer > div:nth-child(-n+3) {
                width: calc(29.3% - 8px); 
                margin: 0;
            }
            #addRecordBtn {
                 width: 12%; /* Setting button width to 12% explicitly */
                 margin: 0;
                 white-space: nowrap; /* Ensure text doesn't wrap */
                 padding: 0.5rem 0.75rem; /* Reduced padding slightly to ensure single line fit */
            }
        }


        .multi-search-input-wrapper input {
            padding-left: 2.5rem !important; /* Make space for the icon */
            /* Ensure inputs are fully rounded */
            border-radius: 0.5rem !important;
        }
        .multi-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

    </style>
</head>
<body>

    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- START Sidebar (Navigation Bar) -->
    <!-- UPDATED: Added border-r-2 and border-dark -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full flex flex-col z-50 transition-transform duration-300 transform -translate-x-full lg:translate-x-0 custom-scroll overflow-y-auto border-r-2" style="background-color: var(--bg-sidebar); border-color: var(--border-dark); color: var(--text-primary);">

        <!-- UPDATED: Admin Panel Title Section - Set background to light blue (--bg-sidebar) and border to border-dark -->
        <div class="p-6 border-b flex flex-col items-center" style="border-color: var(--border-dark); background-color: var(--bg-sidebar);">
            <h2 class="text-2xl font-bold mb-1" style="color: var(--text-primary);">Admin Panel</h2>
            <p class="text-sm" style="color: var(--text-secondary);">Management Hub</p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2" id="sidebar-nav">
            <!-- Mobile Menu Close Button -->
            <!-- UPDATED: Hover background set to white -->
            <button class="lg:hidden p-2 rounded-lg hover:bg-white w-full text-left transition duration-150" onclick="toggleSidebar()" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                Close Menu
            </button>

            <!-- MODIFIED: Records Link - Now links to external overall.php -->
            <a href="http://localhost/als/front/overall.php" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM15 11a3 3 0 11-6 0 3 3 0 016 0zM8 13a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 012-2h2a2 2 0 012 2v2zm7-2a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2z" /></svg>
                Records
            </a>

            <a href="http://localhost/als/front/leaderboard.php" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM15 11a3 3 0 11-6 0 3 3 0 016 0zM8 13a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 012-2h2a2 2 0 012 2v2zm7-2a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2z" /></svg>
                Leaderboard
            </a>

            <!-- Dashboard Link -->
            <a href="#" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link sidebar-active" data-section="top" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm7 2a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2zm7 4a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
                Dashboard
            </a>

            <!-- Registries Link -->
            <a href="#registered" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" data-section="registered" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                Registries
            </a>

            <!-- Catalog Link -->
            <a href="#module-catalog" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" data-section="module-catalog" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 3.414L15.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm0 2v10h11V8.414L9.414 3H6a1 1 0 00-1 1z" clip-rule="evenodd" /></svg>
                Catalog
            </a>

            <!-- Chart Link -->
            <a href="#student-chart" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" data-section="student-chart" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.3-.874-2.886.67-2.01 1.968a1.54 1.54 0 01-.582 2.247c-1.638.111-1.638 2.31 0 2.421a1.54 1.54 0 01.582 2.247c-.876 1.298.614 2.84 1.914 1.968a1.532 1.532 0 012.286.948c.38 1.56 2.6 and 1.56 2.98 0a1.532 1.532 0 012.286-.948c1.3.874-2.886-.67 2.01-1.968a1.54 1.54 0 01.582-2.247c.876-1.298-.614-2.84-1.914-1.968a1.532 1.532 0 01-2.286-.948zM10 11a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg>
                Chart
            </a>

            <!-- Infos Link (Maps to #student-info for internal scroll) -->
            <a href="#student-info" class="flex items-center p-3 rounded-xl hover:bg-white sidebar-link-transition sidebar-link" data-section="student-info" style="color: var(--text-primary);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM15 11a3 3 0 11-6 0 3 3 0 016 0zM8 13a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 012-2h2a2 2 0 012 2v2zm7-2a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2z" /></svg>
                Infos
            </a>
        </nav>

        <!-- Footer -->
        <div class="p-6 text-xs mt-auto border-t" style="color: var(--text-secondary); border-color: var(--border-dark);">
            <!-- MODIFIED: Changed text and applied bolding/line break -->
            <p><b>Alternative Learning System Copyright &copy; 2025<br><br>All rights reserved.</b></p>
        </div>
    </aside>
    <!-- END Sidebar (Navigation Bar) -->
    <div id="main-container" class="flex-1 min-h-screen text-lg main-content">

        <header class="shadow-sm border-b" style="background-color: var(--bg-sidebar); border-bottom-color: var(--border-dark);">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-center relative">

                <button class="lg:hidden text-gray-500 hover:text-gray-700 absolute left-4 top-1/2 transform -translate-y-1/2" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="color: var(--text-primary);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <!-- NEW: Admin Dashboard Title -->
                <h1 class="text-2xl font-bold" style="color: var(--text-primary);">Admin Dashboard</h1>

            </div>
        </header>

        <main class="p-4 sm:p-8 lg:p-10">

            <!-- Title -->
            <h1 class="text-2xl font-bold mb-8 leading-tight" style="color: var(--text-primary);">
                Student Registration
            </h1>

            <!-- Dashboard Cards (Statistics) -->
            <!-- ADDED ID for Navigation -->
            <div id="registered" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">

                <div class="dashboard-card card-total">
                    <p class="card-title">Total Registry</p>
                    <span id="totalAccountsCard" class="card-count"><?php echo $totalAccounts; ?></span>
                    <p class="text-sm" style="opacity: 0.7; color: var(--text-secondary);">Overall</p>
                </div>

                <div class="dashboard-card card-elementary">
                    <p class="card-title">Elementary Level</p>
                    <span id="elementaryCountCard" class="card-count"><?php echo $studentElementaryCount; ?></span>
                    <p class="text-sm" style="opacity: 0.7; color: var(--text-secondary);">Currently enrolled</p>
                </div>

                <div class="dashboard-card card-junior">
                    <p class="card-title">Junior High Level</p>
                    <span id="juniorHighCountCard" class="card-count"><?php echo $studentJuniorHighCount; ?></span>
                    <p class="text-sm" style="opacity: 0.7; color: var(--text-secondary);">Currently enrolled</p>
                </div>

                <div class="dashboard-card card-senior">
                    <p class="card-title">Senior High Level</p>
                    <span id="seniorHighCountCard" class="card-count"><?php echo $studentSeniorHighCount; ?></span>
                    <p class="text-sm" style="opacity: 0.7; color: var(--text-secondary);">Currently enrolled</p>
                </div>
            </div>

            <!-- Module Circle Counts (NEW SECTION) -->
            <!-- ADDED ID for Navigation -->
            <h2 id="module-catalog" class="text-2xl font-bold mb-8 mt-12" style="color: var(--text-primary);">Module Catalog</h2>
            <!-- Adjusted the div containing the circles to have a transparent background -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-16 py-8 module-circle-container-parent">

                <!-- The .module-circle-card class now has the pulse animation -->
                <div class="module-circle-card circle-total">
                    <p class="module-count"><?php echo $totalModules; ?></p>
                    <p class="module-label">Total Modules</p>
                </div>

                <div class="module-circle-card circle-elementary">
                    <p class="module-count"><?php echo $elementaryModuleCount; ?></p>
                    <p class="module-label">Elementary</p>
                </div>

                <div class="module-circle-card circle-junior">
                    <p class="module-count"><?php echo $juniorHighModuleCount; ?></p>
                    <p class="module-label">Junior High</p>
                </div>

                <div class="module-circle-card circle-senior">
                    <p class="module-count"><?php echo $seniorHighModuleCount; ?></p>
                    <p class="module-label">Senior High</p>
                </div>
            </div>
            <!-- End Module Circle Counts -->

            <!-- Charts Section (Aligned) -->
            <!-- ADDED ID for Navigation -->
            <h2 id="student-chart" class="text-2xl font-bold mb-8" style="color: var(--text-primary);">Student Chart</h2>

            <!-- MODIFIED: Reverted to 2-column layout (lg:grid-cols-2) for horizontal alignment -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">

                <!-- Column Chart Container -->
                <div class="chart-container">
                    <div id="column_chart_div" style="width: 100%; height: 400px;"></div>
                </div>

                <!-- Pie Chart Container -->
                <div class="chart-container">
                    <div id="pie_chart_div" style="width: 100%; height: 400px;"></div>
                </div>
            </div>

            <!-- Student Registry Management Table (Now PHP-Powered) -->
            <div id="student-info" class="crud-container">
                <h2 id="tableTitle" class="text-3xl font-bold mb-6 text-center" style="color: var(--text-primary);">Student Information</h2>

                <!-- NEW: View Switcher -->
                <div class="flex justify-center mb-6 view-switcher">
                    <input type="radio" id="viewStudents" name="dataView" value="student" checked onchange="switchView('student')">
                    <label for="viewStudents">Students</label>

                    <input type="radio" id="viewTeachers" name="dataView" value="teacher" onchange="switchView('teacher')">
                    <label for="viewTeachers">Faculty</label>
                </div>

                <!-- START: MODIFIED Multi-Search Input Fields -->
                <!-- Reduced vertical margins/padding -->
                <div id="multiSearchContainer" class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
                    
                    <!-- Search Name Field -->
                    <div class="multi-search-input-wrapper w-full sm:w-1/3">
                         <input type="text" id="searchName" placeholder="Search by Name" 
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                style="background-color: var(--table-header); color: var(--text-primary); border-color: var(--border-color);" 
                                value="<?php echo htmlspecialchars($_GET['search_name'] ?? ''); ?>">
                         <svg class="multi-search-icon h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M2 20s1.5-2 10-2 10 2 10 2"/></svg>
                    </div>

                    <!-- Search LRN Field -->
                    <div class="multi-search-input-wrapper w-full sm:w-1/3">
                         <input type="text" id="searchLrn" placeholder="Search by LRN" 
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                style="background-color: var(--table-header); color: var(--text-primary); border-color: var(--border-color);" 
                                value="<?php echo htmlspecialchars($_GET['search_lrn'] ?? ''); ?>">
                         <svg class="multi-search-icon h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="15" x="2" y="3" rx="2"/><path d="M12 7v5"/><path d="M10 11h4"/></svg>
                    </div>

                    <!-- Search Email Field -->
                    <div class="multi-search-input-wrapper w-full sm:w-1/3">
                         <input type="text" id="searchEmail" placeholder="Search by Email" 
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                style="background-color: var(--table-header); color: var(--text-primary); border-color: var(--border-color);" 
                                value="<?php echo htmlspecialchars($_GET['search_email'] ?? ''); ?>">
                         <svg class="multi-search-icon h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="m22 6-10 7L2 6"/></svg>
                    </div>
                    
                    <!-- Add New Record Button (fixed to "Add Student" as requested) -->
                    <button id="addRecordBtn" class="font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 w-full sm:w-auto mt-4 sm:mt-0"
                        style="background-color: var(--crud-action-color-light); color: #ffffff;"
                        onclick="showModal('add')"
                        <?php echo $db_connected ? '' : 'disabled'; ?>
                    >
                        Add Student
                    </button>
                </div>
                <!-- END: MODIFIED Multi-Search Input Fields -->


                <div class="overflow-x-auto rounded-xl shadow-inner border" style="border-color: var(--border-color);">
                    <table class="crud-table">
                        <thead id="tableHead">
                            <!-- Student Header (Default) -->
                            <tr>
                                <th style="width: 1%;">ID</th>
                                <th>Student Name</th>
                                <th>Password</th> <!-- ADDED -->
                                <th>LRN</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th class="text-center-th">Age</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th class="action-header">Action</th> <!-- UPDATED CLASS -->
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php if ($db_connected): ?>
                                <?php echo $studentsHtml; ?>
                                <?php echo $teachersHtml; ?>
                            <?php else: ?>
                                <tr data-type="student">
                                    <td colspan="11" class="text-center py-4 text-red-500 font-bold" style="color: #f87171;">Database Connection Failed. Showing mock student data.</td>
                                </tr>
                                <?php
                                // Manually render mock data rows for initial load failure
                                if (!empty($students)) {
                                    $i = 1;
                                    foreach ($students as $student):
                                        $studentJsonString = htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8');
                                        $recordId = $student['student_id'];
                                        $displayedPassword = $student['password'] ?? 'pass_mock_data';
                                        $placeholder = str_repeat('•', strlen($displayedPassword));
                                ?>
                                    <tr data-type="student">
                                        <td style="width: 1%;"><?php echo $i++; ?></td>
                                        <td><?php echo htmlspecialchars($student['student_name']); ?></td>
                                        <td class="password-cell">
                                            <div class="password-content-wrapper">
                                                <span id="password-student-<?php echo $recordId; ?>" data-password-hidden="true" data-actual-password="<?php echo htmlspecialchars($displayedPassword); ?>" style="font-family: monospace;">
                                                    <?php echo $placeholder; ?>
                                                </span>
                                                <button class="password-toggle-btn" 
                                                        onclick="togglePasswordVisibility('student', <?php echo $recordId; ?>, this)" disabled>
                                                    Show
                                                </button>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($student['lrn'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($student['level'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($student['email'] ?? '-'); ?></td>
                                        <td class="text-center-td"><?php echo htmlspecialchars($student['age'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($student['gender'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($student['contact'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($student['address'] ?? '-'); ?></td>
                                        <td class="crud-actions">
                                            <div class="flex space-x-2 justify-center items-center h-full">
                                                <button class="edit" disabled onclick='showMessage("CRUD disabled: Database connection failed.", false)'>Edit</button>
                                                <button class="delete" disabled onclick='showMessage("CRUD disabled: Database connection failed.", false)'>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    endforeach;
                                }
                                if (!empty($teachers)) {
                                    $j = 1;
                                    foreach ($teachers as $teacher):
                                        $teacherJsonString = htmlspecialchars(json_encode($teacher), ENT_QUOTES, 'UTF-8');
                                        $recordId = $teacher['teacher_id'];
                                        $displayedPassword = $teacher['password'] ?? 'pass_mock_data';
                                        $placeholder = str_repeat('•', strlen($displayedPassword));
                                ?>
                                    <tr data-type="teacher" class="hidden">
                                        <td style="width: 1%;"><?php echo $j++; ?></td>
                                        <td><?php echo htmlspecialchars($teacher['teacher_name']); ?></td>
                                        <td class="password-cell">
                                            <div class="password-content-wrapper">
                                                <span id="password-teacher-<?php echo $recordId; ?>" data-password-hidden="true" data-actual-password="<?php echo htmlspecialchars($displayedPassword); ?>" style="font-family: monospace;">
                                                    <?php echo $placeholder; ?>
                                                </span>
                                                <button class="password-toggle-btn" 
                                                        onclick="togglePasswordVisibility('teacher', <?php echo $recordId; ?>, this)" disabled>
                                                    Show
                                                </button>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($teacher['faculty_role'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($teacher['contact'] ?? '-'); ?></td>
                                        <td><?php echo htmlspecialchars($teacher['email'] ?? '-'); ?></td>
                                        <td class="crud-actions">
                                            <div class="flex space-x-2 justify-center items-center h-full">
                                                <button class="edit" disabled onclick='showMessage("CRUD disabled: Database connection failed.", false)'>Edit</button>
                                                <button class="delete" disabled onclick='showMessage("CRUD disabled: Database connection failed.", false)'>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    endforeach;
                                }
                                ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Student Registry Table -->
        </main>
    </div>

    <!-- Modal for Add/Edit Student/Teacher (Unified Modal) -->
    <div id="recordModal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close-button" onclick="closeModal()">&times;</button>
            <h3 id="modalTitle" class="text-2xl font-bold mb-6 text-center" style="color: var(--text-primary);">Add New Record</h3>
            <form id="recordForm" class="modal-form" onsubmit="submitForm(event)">
                <!-- Hidden fields to identify record type and ID -->
                <input type="hidden" id="modal-record-type" name="type" value="student">
                <input type="hidden" id="modal-record-id" name="id">

                <!-- Dynamic Content Container -->
                <div id="modal-fields-container">
                    <!-- Fields will be dynamically injected here by JS -->
                </div>

                <button type="submit" id="modal-submit-btn">Save Record</button>
                <p id="modal-error-message" class="text-red-500 text-center mt-3"></p>
            </form>
        </div>
    </div>
    <!-- End Modal -->
    <div id="messageBox" class="message-box"></div>


    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-menu-overlay');
        const recordModal = document.getElementById('recordModal');
        const modalTitle = document.getElementById('modalTitle');
        const recordForm = document.getElementById('recordForm');
        const modalSubmitBtn = document.getElementById('modal-submit-btn');
        const modalErrorMessage = document.getElementById('modal-error-message');
        const tableTitle = document.getElementById('tableTitle');
        const tableHead = document.getElementById('tableHead');
        const tableBody = document.getElementById('tableBody');
        const addRecordBtn = document.getElementById('addRecordBtn');
        const mainContent = document.getElementById('main-container'); // Need this for scroll spy

        // Search inputs
        const searchNameInput = document.getElementById('searchName');
        const searchLrnInput = document.getElementById('searchLrn');
        const searchEmailInput = document.getElementById('searchEmail');

        // Define the sections to observe for scroll spy
        const sections = [
            // Dashboard (top: 0) - This is implied as the fallback if nothing else is in view
            { id: 'registered', link: document.querySelector('.sidebar-link[data-section="registered"]') },
            { id: 'module-catalog', link: document.querySelector('.sidebar-link[data-section="module-catalog"]') },
            { id: 'student-chart', link: document.querySelector('.sidebar-link[data-section="student-chart"]') },
            { id: 'student-info', link: document.querySelector('.sidebar-link[data-section="student-info"]') } // Needs to be last so 'top' is only detected if nothing else matches
        ];

        // Initial view state (defaults to student)
        let currentView = 'student';

        // --- HELPER FUNCTIONS ---

        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        function closeModal() {
            recordModal.classList.remove('show');
            modalErrorMessage.textContent = ''; // Clear previous errors
            recordForm.reset(); // Clear form fields
        }

        function showMessage(message, isSuccess = true) {
            const messageBox = document.getElementById('messageBox');
            messageBox.textContent = message;
            // Use light theme appropriate colors for the message box
            messageBox.style.backgroundColor = isSuccess ? '#10b981' : '#ef4444'; // Green or Red
            messageBox.style.color = '#ffffff'; // White text for contrast
            messageBox.classList.add('show');
            setTimeout(() => {
                messageBox.classList.remove('show');
            }, 3000);
        }

        // --- NEW: PASSWORD VISIBILITY TOGGLE FUNCTION ---

        function togglePasswordVisibility(type, id, button) {
            const passwordSpan = document.getElementById(`password-${type}-${id}`);
            
            if (!passwordSpan) {
                console.error(`Password span for ${type} ID ${id} not found.`);
                return;
            }

            const isHidden = passwordSpan.getAttribute('data-password-hidden') === 'true';
            const actualPassword = passwordSpan.getAttribute('data-actual-password');
            const placeholder = str_repeat('•', actualPassword.length); // Use PHP's logic for length, recreated in JS

            if (isHidden) {
                // Show password
                passwordSpan.textContent = actualPassword;
                button.textContent = 'Hide';
                passwordSpan.setAttribute('data-password-hidden', 'false');
            } else {
                // Hide password
                passwordSpan.textContent = placeholder;
                button.textContent = 'Show';
                passwordSpan.setAttribute('data-password-hidden', 'true');
            }
        }

        // Helper function to replicate PHP's str_repeat for client-side password hiding
        function str_repeat(input, multiplier) {
            return new Array(multiplier + 1).join(input);
        }


        // --- VIEW SWITCHING LOGIC ---

        function switchView(viewType) {
            currentView = viewType;
            const isStudent = viewType === 'student';

            // 1. Update Title and Button
            tableTitle.textContent = isStudent ? 'Student Information' : 'Faculty Information';
            addRecordBtn.textContent = isStudent ? 'Add Student' : 'Add Faculty'; // FIX: Dynamically set button text
            addRecordBtn.setAttribute('onclick', `showModal('add', '${viewType}')`);

            // 2. Toggle Table Header
            // UPDATED: Added Password column to both table headers
            tableHead.innerHTML = isStudent
                ? `<tr>
                    <th style="width: 1%;">ID</th>
                    <th>Student Name</th>
                    <th>Password</th>
                    <th>LRN</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th class="text-center-th">Age</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th class="action-header">Action</th>
                   </tr>`
                : `<tr>
                    <th style="width: 1%;">ID</th>
                    <th>Teacher Name</th>
                    <th>Password</th>
                    <th>Faculty Role</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th class="action-header">Action</th>
                   </tr>`;

            // 3. Re-run search whenever view changes, in case there is a query already present
            searchRecords(false); // Do not use history.pushState when switching view, rely on the search update
            
            // Note: The logic below is redundant since searchRecords handles the final visibility, 
            // but kept for ensuring initial visibility structure works.
            document.querySelectorAll('#tableBody tr').forEach(row => {
                const isMatchingType = row.getAttribute('data-type') === viewType;
                if (isMatchingType) {
                    row.classList.remove('hidden');
                } else {
                     row.classList.add('hidden');
                }
            });
        }

        function renderStudentFields(data = {}) {
            // Note: data.birthday might be an ISO string, but the date input will handle it fine.
            return `
                <!-- MODIFIED: Changed ID reference back to student_id -->
                <input type="hidden" id="modal-student-id" name="student_id" value="${data.student_id || ''}">
                <label class="block text-sm font-medium mb-1">Student Name (Required)</label>
                <!-- MODIFIED: Changed value back to 'student_name' for mock data consistency, keeping input name as 'name' for form submission -->
                <input type="text" id="modal-name" name="name" placeholder="Full Name" value="${data.student_name || ''}" required>

                <!-- ADDED PASSWORD FIELD with maxlength -->
                <label class="block text-sm font-medium mb-1">Password <span class="text-xs font-normal" data-mode-label></span></label>
                <input type="password" id="modal-password" name="password" placeholder="Leave blank to keep existing password (8 chars max)" maxlength="8">

                <label class="block text-sm font-medium mb-1">LRN (Required, 12 Digits)</label>
                <!-- UPDATED LRN FIELD with maxlength -->
                <input type="text" id="modal-lrn" name="lrn" placeholder="Learning Reference Number (12 digits)" value="${data.lrn || ''}" required maxlength="12">

                <label class="block text-sm font-medium mb-1">Level (Required)</label>
                <select id="modal-level" name="level" required>
                    <option value="" disabled>Select Level</option>
                    <option value="elementary" ${data.level === 'elementary' ? 'selected' : ''}>Elementary</option>
                    <option value="juniorhigh" ${data.level === 'juniorhigh' ? 'selected' : ''}>Junior High</option>
                    <option value="seniorhigh" ${data.level === 'seniorhigh' ? 'selected' : ''}>Senior High</option>
                </select>

                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" id="modal-email" name="email" placeholder="Email Address" value="${data.email || ''}">

                <label class="block text-sm font-medium mb-1">Birthday (Required)</label>
                <input type="date" id="modal-birthday" name="birthday" value="${data.birthday || ''}" required>

                <label class="block text-sm font-medium mb-1">Gender (Required)</label>
                <select id="modal-gender" name="gender" required>
                    <option value="" disabled>Select Gender</option>
                    <option value="Male" ${data.gender === 'Male' ? 'selected' : ''}>Male</option>
                    <option value="Female" ${data.gender === 'Female' ? 'selected' : ''}>Female</option>
                    <option value="Other" ${data.gender === 'Other' ? 'selected' : ''}>Other</option>
                </select>

                <label class="block text-sm font-medium mb-1">Contact</label>
                <input type="text" id="modal-contact" name="contact" placeholder="Contact Number" value="${data.contact || ''}">

                <label class="block text-sm font-medium mb-1">Address</label>
                <textarea id="modal-address" name="address" placeholder="Residential Address">${data.address || ''}</textarea>
            `;
        }

        function renderTeacherFields(data = {}) {
            // Updated to remove 'Coordinator' option
            return `
                <input type="hidden" id="modal-teacher-id" name="teacher_id" value="${data.teacher_id || ''}">
                <label class="block text-sm font-medium mb-1">Teacher Name (Required)</label>
                <input type="text" id="modal-name" name="name" placeholder="Full Name" value="${data.teacher_name || ''}" required>

                <!-- ADDED PASSWORD FIELD with maxlength -->
                <label class="block text-sm font-medium mb-1">Password <span class="text-xs font-normal" data-mode-label></span></label>
                <input type="password" id="modal-password" name="password" placeholder="Leave blank to keep existing password (8 chars max)" maxlength="8">

                <label class="block text-sm font-medium mb-1">Contact (Required)</label>
                <input type="text" id="modal-contact" name="contact" placeholder="Contact Number" value="${data.contact || ''}" required>

                <label class="block text-sm font-medium mb-1">Email (Required)</label>
                <input type="email" id="modal-email" name="email" placeholder="Email Address" value="${data.email || ''}" required>

                <label class="block text-sm font-medium mb-1">Faculty Role (Required)</label>
                <select id="modal-faculty-role" name="faculty_role" required>
                    <option value="" disabled>Select Role</option>
                    <option value="Teacher" ${data.faculty_role === 'Teacher' ? 'selected' : ''}>Teacher</option>
                    <!-- Removed Coordinator option -->
                    <option value="Admin" ${data.faculty_role === 'Admin' ? 'selected' : ''}>Admin</option>
                </select>

                <!-- If you need a birthday field for teachers for age calculation, uncomment/add this: -->
                <!-- <label class="block text-sm font-medium mb-1">Birthday</label>
                <input type="date" id="modal-birthday" name="birthday" value="${data.birthday || ''}"> -->
            `;
        }

        // --- CRUD FUNCTIONS (omitted as they remain the same) ---

        function showModal(mode, type = currentView, record = {}) {
            if (!dbConnected) {
                // Using a custom message box instead of alert()
                showMessage("CRUD is disabled because the database connection failed. Cannot proceed.", false);
                return;
            }

            modalErrorMessage.textContent = '';
            recordForm.reset();

            const isAdd = mode === 'add';

            modalTitle.textContent = isAdd
                ? `Add New ${type === 'student' ? 'Student' : 'Faculty'}`
                // MODIFIED: Use the 'student_name' or 'teacher_name' field for display in the modal title
                : `Edit ${type === 'student' ? 'Student' : 'Faculty'}: ${type === 'student' ? (record.student_name || 'Record') : (record.teacher_name || 'Record')}`;

            modalSubmitBtn.textContent = isAdd ? `Add ${type === 'student' ? 'Student' : 'Faculty'}` : 'Save Changes';
            recordForm.dataset.mode = mode;

            // Set the hidden type field
            document.getElementById('modal-record-type').value = type;
            // MODIFIED: Use 'student_id' from the record object if it's a student, 'teacher_id' otherwise.
            document.getElementById('modal-record-id').value = type === 'student' ? (record.student_id || '') : (record.teacher_id || '');

            // Render dynamic fields
            const fieldsContainer = document.getElementById('modal-fields-container');
            if (type === 'student') {
                fieldsContainer.innerHTML = renderStudentFields(record);
            } else {
                fieldsContainer.innerHTML = renderTeacherFields(record);
            }
            
            // NEW: Adjust password requirement label based on mode
            const passwordInput = document.getElementById('modal-password');
            const passwordLabelSpan = fieldsContainer.querySelector('[data-mode-label]');

            if (passwordLabelSpan) {
                if (isAdd) {
                    passwordLabelSpan.textContent = type === 'student' ? '(Required, 8 chars)' : '(Required, 8 chars)';
                    passwordLabelSpan.classList.add('text-red-500');
                    // Add 'required' attribute dynamically for 'add' mode for browser validation
                    passwordInput.required = true;
                } else {
                    passwordLabelSpan.textContent = '(Only fill to change, 8 chars max)';
                    passwordLabelSpan.classList.remove('text-red-500');
                    passwordInput.required = false;
                }
            }
            
            // NEW: Set LRN input filter (Student only)
            const lrnInput = document.getElementById('modal-lrn');
            if (lrnInput) {
                lrnInput.addEventListener('input', function() {
                    // Enforce numeric and max length in JS for better UX
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);
                });
            }


            recordModal.classList.add('show');
        }

        async function submitForm(event) {
            event.preventDefault();

            const mode = recordForm.dataset.mode;
            const type = document.getElementById('modal-record-type').value;

            const formData = new FormData(recordForm);
            formData.append('action', mode);
            
            // MODIFIED: Ensure 'student_id' is passed correctly if it's an edit action for a student
            if (type === 'student') {
                // The PHP logic expects the student ID to be passed as 'student_id'.
                const studentIdField = document.getElementById('modal-student-id');
                if (studentIdField) {
                     formData.append('student_id', studentIdField.value);
                }
            }
            
            // Client-side length check for consistency, though PHP handles final validation
            const passwordField = document.getElementById('modal-password');
            const passwordValue = passwordField.value;
            const isAdd = mode === 'add';
            
            // Check password length
            if ((isAdd && passwordValue.length !== 8) || (!isAdd && passwordValue && passwordValue.length !== 8)) {
                modalErrorMessage.textContent = "Error: Password must be exactly 8 characters long.";
                passwordField.focus();
                return;
            }

            // Check LRN length (Student only)
            if (type === 'student') {
                const lrnField = document.getElementById('modal-lrn');
                const lrnValue = lrnField.value;
                if (lrnValue.length !== 12 || !/^\d+$/.test(lrnValue)) {
                    modalErrorMessage.textContent = "Error: LRN must be exactly 12 numeric digits.";
                    lrnField.focus();
                    return;
                }
            }


            modalSubmitBtn.textContent = 'Processing...';
            modalSubmitBtn.disabled = true;

            try {
                // Post to the current file (dashboard.php) which handles the AJAX logic
                const response = await fetch('dashboard.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showMessage(result.message, true);
                    closeModal();
                    // After CRUD operation, reload the entire page to ensure all data and charts are fresh
                    setTimeout(() => window.location.reload(), 500);
                } else {
                    modalErrorMessage.textContent = result.message || 'An unknown error occurred.';
                }

            } catch (error) {
                console.error('Error:', error);
                modalErrorMessage.textContent = 'Network or server error. Check console.';
            } finally {
                modalSubmitBtn.textContent = (mode === 'add' ? `Add ${type === 'student' ? 'Student' : 'Faculty'}` : 'Save Changes');
                modalSubmitBtn.disabled = false;
            }
        }

        async function deleteRecord(id, type) {
            if (!dbConnected) {
                showMessage("CRUD is disabled because the database connection failed. Cannot proceed.", false);
                return;
            }

            // Get the current row data to find the email needed for the secondary users table delete
            const rows = Array.from(document.querySelectorAll('#tableBody tr'));
            const row = rows.find(r => r.getAttribute('data-type') === type && r.querySelector(`button[data-id="${id}"]`));

            if (!row) {
                showMessage("Error: Could not find the record row data for deletion.", false);
                return;
            }
            
            let email = '';
            // Determine email based on the table structure (email is consistently the 6th cell for student, 5th for teacher)
            if (type === 'student') {
                // Student email is in the 6th visible cell (index 5)
                email = row.children[5].textContent.trim();
            } else {
                // Teacher email is in the 6th visible cell (index 5)
                email = row.children[5].textContent.trim();
            }

            // Using a custom message box instead of window.confirm()
            // UPDATED: Clarify that the delete is permanent (hard delete)
            const confirmed = window.confirm(`WARNING: This is a permanent, direct database delete.\nAre you sure you want to delete ${type} ID ${id} and the associated users account (${email})? This action cannot be undone.`);

            if (!confirmed) return;

            const formData = new FormData();
            formData.append('action', 'delete');
            formData.append('id', id);
            formData.append('type', type);
            // Pass the email for users table deletion logic in PHP
            formData.append('email', email); 

            showMessage(`Deleting ${type} ID ${id}...`, false);

            try {
                const response = await fetch('dashboard.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showMessage(result.message, true);
                    // After CRUD operation, reload the entire page to ensure all data and charts are fresh
                    setTimeout(() => window.location.reload(), 500);
                } else {
                    showMessage(result.message, false);
                }

            } catch (error) {
                console.error('Error:', error);
                showMessage('Network or server error during deletion.', false);
            }
        }

        /**
         * Performs the search via AJAX and updates the table and charts.
         * @param {boolean} updateHistory If true, updates the URL history (used only by input listener).
         */
        async function searchRecords(updateHistory = true) {
            if (!dbConnected) {
                // If DB is not connected, we can't perform live search.
                // We keep showing the static mock data.
                return;
            }

            // Get the current values from the three dedicated input fields
            const queryName = searchNameInput.value.trim();
            const queryLrn = searchLrnInput.value.trim();
            const queryEmail = searchEmailInput.value.trim();

            // Concatenate all active queries into a single string for the PHP backend.
            // PHP search logic uses OR clauses, so combining queries here works as an inclusive search.
            let combinedQuery = [queryName, queryLrn, queryEmail].filter(q => q).join(' ');

            const type = document.querySelector('input[name="dataView"]:checked').value;
            const tableBody = document.getElementById('tableBody');

            // 1. Prepare UI for loading
            // Clear existing rows (both student and teacher, if present)
            tableBody.innerHTML = `<tr><td colspan="11" class="text-center py-4" style="color: var(--text-secondary);">Searching...</td></tr>`;

            // 2. Prepare Form Data for AJAX call
            const formData = new FormData();
            formData.append('action', 'search');
            // We pass the combined query to the single 'search_query' field PHP uses
            formData.append('search_query', combinedQuery);
            formData.append('type', type);

            try {
                const response = await fetch('dashboard.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    // 3. Update the table with new filtered HTML content
                    tableBody.innerHTML = result.html;

                    // 4. Update the stats/charts dynamically
                    const stats = result.stats;
                    
                    // Update global JS variables for charts
                    window.totalAccounts = stats.total;
                    window.elementaryCount = stats.elementary;
                    window.juniorHighCount = stats.juniorhigh;
                    window.seniorHighCount = stats.seniorhigh;
                    
                    // Update visual cards
                    document.getElementById('totalAccountsCard').textContent = stats.total;
                    document.getElementById('elementaryCountCard').textContent = stats.elementary;
                    document.getElementById('juniorHighCountCard').textContent = stats.juniorhigh;
                    document.getElementById('seniorHighCountCard').textContent = stats.seniorhigh;

                    // **********************************************
                    // FIX: Explicitly redraw charts after successful data/stat update
                    // **********************************************
                    if (typeof google !== 'undefined' && google.charts.loaded) {
                        drawCharts(); 
                    }
                    // **********************************************
                    
                    // 5. Update URL state without reloading (if triggered by input, not view switch)
                    if (updateHistory) {
                        let newUrl = window.location.pathname;
                        let params = new URLSearchParams();
                        params.set('view', type);
                        // Store the individual search fields in the URL
                        if (queryName) params.set('search_name', queryName);
                        if (queryLrn) params.set('search_lrn', queryLrn);
                        if (queryEmail) params.set('search_email', queryEmail);
                        
                        // Use replaceState to avoid cluttering history on every keystroke
                        history.replaceState(null, '', `${newUrl}?${params.toString()}#student-info`);
                    }
                    
                    // Ensure visibility matches the current view after AJAX loads all rows
                    document.querySelectorAll('#tableBody tr').forEach(row => {
                         const isMatchingType = row.getAttribute('data-type') === type;
                         if (isMatchingType) {
                             row.classList.remove('hidden');
                         } else {
                             row.classList.add('hidden');
                         }
                    });


                } else {
                    tableBody.innerHTML = `<tr><td colspan="11" class="text-center py-4 text-red-500 font-bold">${result.message}</td></tr>`;
                    showMessage(result.message, false);
                }

            } catch (error) {
                console.error('Error during AJAX search:', error);
                tableBody.innerHTML = `<tr><td colspan="11" class="text-center py-4 text-red-500 font-bold">Network or server error during search.</td></tr>`;
            }
        }


        // --- SIDEBAR ACTIVE LINK LOGIC (omitted, no change) ---

        function updateActiveSidebar(targetId) {
            // Remove active class from all links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('sidebar-active');
                link.style.color = 'var(--text-primary)';
            });

            const activeLink = document.querySelector(`.sidebar-link[data-section="${targetId}"]`);
            if (activeLink) {
                activeLink.classList.add('sidebar-active');
                activeLink.style.color = '#1d4ed8';
            }
        }

        // --- SCROLL SPY LOGIC (omitted, no change) ---

        function updateActiveSidebarOnScroll() {
            let currentActiveSection = 'top';
            const scrollPosition = document.documentElement.scrollTop + 150; // Offset for better detection below header

            // Iterate in reverse order to detect the lowest element first
            for (let i = sections.length - 1; i >= 0; i--) {
                const section = sections[i];
                if (section.id === 'top') continue; // Skip 'top' for iteration, it's the default/fallback

                const element = document.getElementById(section.id);

                if (element && scrollPosition >= element.offsetTop) {
                    currentActiveSection = section.id;
                    break;
                }
            }

            // Fallback for when scroll is near the top (Admin Dashboard)
            if (document.documentElement.scrollTop < 100) {
                 currentActiveSection = 'top';
            }

            // Update the active link based on the detected section
            updateActiveSidebar(currentActiveSection);
        }

        // Event listener for anchor link clicks (0.1 second delay)
        document.getElementById('sidebar-nav').addEventListener('click', function(e) {
            const link = e.target.closest('.sidebar-link');
            if (link) {
                // Check if the link is an internal scroll anchor or an external page link
                if (link.getAttribute('href').startsWith('#')) {

                    e.preventDefault();
                    const targetId = link.getAttribute('data-section');

                    let finalTargetId = targetId;

                    // Logic to handle 'Records' link (which now points to #student-info for scroll)
                    if (link.textContent.trim() === 'Records') {
                        finalTargetId = 'student-info';
                    } else if (finalTargetId === 'top') {
                         // Scroll to the very top
                         const targetTop = 0;
                         updateActiveSidebar(finalTargetId);
                         setTimeout(() => {
                             window.scrollTo({ top: targetTop, behavior: 'smooth' });
                         }, 100);
                         return;
                    }

                    // Determine scroll target for internal links
                    const targetElement = document.getElementById(finalTargetId);
                    const targetTop = targetElement ? targetElement.offsetTop : 0;

                    // Show immediate active state change
                    updateActiveSidebar(finalTargetId);

                    // 0.1-second delay before scrolling (100 milliseconds)
                    setTimeout(() => {
                        window.scrollTo({
                            top: targetTop,
                            behavior: 'smooth'
                        });
                    }, 100);
                }
                // If it's an external link (like Records), let the default action proceed (page change)
            }
        });


        // --- INITIALIZATION ---

        window.onload = function() {
            // 1. Restore previous search query from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const initialView = urlParams.get('view') || 'student';

            const initialQueryName = urlParams.get('search_name') || '';
            const initialQueryLrn = urlParams.get('search_lrn') || '';
            const initialQueryEmail = urlParams.get('search_email') || '';
            
            if (searchNameInput) searchNameInput.value = initialQueryName;
            if (searchLrnInput) searchLrnInput.value = initialQueryLrn;
            if (searchEmailInput) searchEmailInput.value = initialQueryEmail;

            // 2. Set the correct radio button
            const radio = document.getElementById(`view${initialView.charAt(0).toUpperCase() + initialView.slice(1)}s`);
            if (radio) {
                radio.checked = true;
                // If any query exists, run the search immediately to filter the pre-loaded data
                if (initialQueryName || initialQueryLrn || initialQueryEmail) {
                     searchRecords(false); // Do not update history on initial load
                } else {
                     // Still need to call switchView to handle initial visibility/header changes
                     switchView(initialView);
                }
            } else {
                 switchView('student');
            }


            // 3. Setup search input listener for automatic, debounced search
            let searchTimer = null;
            const delay = 500; // 500ms debounce delay

            function setupInputListeners(inputElement) {
                if (inputElement) {
                    inputElement.addEventListener('input', function() {
                        clearTimeout(searchTimer);
                        searchTimer = setTimeout(() => {
                            searchRecords(true); // Update history on live input search
                        }, delay);
                    });
                }
            }

            setupInputListeners(searchNameInput);
            setupInputListeners(searchLrnInput);
            setupInputListeners(searchEmailInput);

            // 4. Set initial active state based on current scroll position
            updateActiveSidebarOnScroll();

            // 5. Setup scroll listener for scroll spy (debounced for performance)
            let scrollTimer = -1;
            window.addEventListener('scroll', () => {
                if (scrollTimer !== -1) {
                    clearTimeout(scrollTimer);
                }
                // Debounce the scroll spy update slightly
                scrollTimer = window.setTimeout(updateActiveSidebarOnScroll, 100);
            });
        };

        // Listen for hash changes (e.g., if user uses back/forward buttons)
        window.addEventListener('hashchange', function() {
            // Re-run the logic in window.onload
            window.onload();
        });
    </script>
</body>
</html>