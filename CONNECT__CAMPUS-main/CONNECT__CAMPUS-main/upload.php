<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $file = $_FILES['certificate'];

  // Check for errors during file upload
  if ($file['error'] !== UPLOAD_ERR_OK) {
    echo "File upload failed with error code: " . $file['error'];
    exit;
  }

  // Specify the directory where you want to save the uploaded file
  $uploadDir = 'uploads/';

  // Create the directory if it doesn't exist
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
  }

  // Generate a unique filename for the uploaded file
  $filename = uniqid() . '_' . $file['name'];

  // Move the uploaded file to the desired location
  if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
    echo "File uploaded successfully";
  } else {
    echo "Failed to move the uploaded file";
  }
}
?>
