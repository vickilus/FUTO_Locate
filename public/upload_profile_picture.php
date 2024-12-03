<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure a file is uploaded
    if (!isset($_FILES['profile_picture']) || $_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'File upload failed.']);
        exit;
    }

    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileType = mime_content_type($_FILES['profile_picture']['tmp_name']);
    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPEG, PNG, and GIF are allowed.']);
        exit;
    }

    // Validate file size (max 2MB)
    $maxSize = 2 * 1024 * 1024;
    if ($_FILES['profile_picture']['size'] > $maxSize) {
        echo json_encode(['success' => false, 'message' => 'File size exceeds 2MB limit.']);
        exit;
    }

    // Save the file
    $uploadDir = '../public/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileName = uniqid() . '-' . basename($_FILES['profile_picture']['name']);
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $filePath)) {
        echo json_encode(['success' => false, 'message' => 'Failed to save file.']);
        exit;
    }

    // Return success response
    echo json_encode(['success' => true, 'filePath' => $filePath]);
    exit;
}
?>
