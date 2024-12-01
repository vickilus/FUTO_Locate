<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the file is uploaded
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'File upload failed.']);
        exit;
    }

    // Directory to save uploaded files
    $uploadDir = '../public/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Save the file
    $fileName = basename($_FILES['file']['name']);
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        echo json_encode(['success' => false, 'message' => 'Error saving the file.']);
        exit;
    }

    // Generate file URL
    $fileUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $filePath;

    echo json_encode(['success' => true, 'fileUrl' => $fileUrl]);
    exit;
}
