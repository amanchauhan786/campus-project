<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
  $targetDir = "uploads/"; // Directory to store uploaded files
  $targetFile = $targetDir . basename($_FILES["file"]["name"]);

  // Check if the file is a PDF (you can add more file type validations)
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  if ($fileType != "pdf") {
    echo "Only PDF files are allowed.";
    exit();
  }

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    echo "File uploaded successfully!";
  } else {
    echo "Error uploading the file.";
  }
}
?>
