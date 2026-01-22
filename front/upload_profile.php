<?php
// Tandaan: Ang file na ito ay kailangan ng valid database connection ($conn)
// at isang 'users' table na may 'profile_pic' column.

session_start();
header('Content-Type: application/json');

// KONEKSYON SA DATABASE: Siguraduhin na 'connection.php' ay tama ang path
// at mayroon itong $conn variable.
include 'connection.php'; 

// I-check kung naka-login ang user
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated.']);
    exit;
}

$user_id = $_SESSION['user_id'];
$upload_dir = 'uploads/profiles/'; // Siguraduhin na may folder na ito at WRITABLE!

// I-check kung may na-upload na file
if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No file uploaded or upload error occurred.']);
    exit;
}

$file = $_FILES['profile_image'];
$file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$max_size = 5 * 1024 * 1024; // 5MB limit

// Validation
if (!in_array($file_ext, $allowed_extensions)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, and GIF are allowed.']);
    exit;
}

if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'message' => 'File size exceeds the 5MB limit.']);
    exit;
}

// Gumawa ng unique filename: user_ID_timestamp.ext
$new_filename = $user_id . '_' . time() . '.' . $file_ext;
$target_file = $upload_dir . $new_filename;
$new_url = 'http://localhost/als/front/' . $target_file; // Ayusin ang URL base path

// Subukan i-move ang uploaded file
if (move_uploaded_file($file['tmp_name'], $target_file)) {
    
    // I-update ang profile_pic URL sa database
    $stmt = $conn->prepare("UPDATE users SET profile_pic = ? WHERE user_id = ?"); 
    
    if ($stmt) {
        $stmt->bind_param("si", $new_url, $user_id); 
        
        if ($stmt->execute()) {
            // I-update ang session variable
            $_SESSION['profile_pic'] = $new_url;
            
            // Success response
            echo json_encode([
                'success' => true, 
                'message' => 'Profile picture updated successfully.',
                'new_url' => $new_url
            ]);
            
        } else {
            // Hindi na-update ang database (dapat burahin ang file)
            unlink($target_file); 
            echo json_encode(['success' => false, 'message' => 'Database update failed: ' . $conn->error]);
        }
        $stmt->close();
    } else {
        // Prepare statement error (dapat burahin ang file)
        unlink($target_file); 
        echo json_encode(['success' => false, 'message' => 'Database preparation failed.']);
    }

} else {
    // Hindi na-move ang file
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to move the uploaded file. Check directory permissions.']);
}

// Isara ang koneksyon
if (isset($conn)) {
    $conn->close();
}
?>
