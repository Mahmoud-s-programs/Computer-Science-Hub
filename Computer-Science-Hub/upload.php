<?php
$targetDir = "uploads/"; // Directory where files will be uploaded
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); // Path to the uploaded file
$uploadOk = 1; // Flag to track if file upload is successful
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Get the file extension

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file extension to ensure it's PDF, PPT, or PPTX
if($fileType != "pdf" && $fileType != "ppt" && $fileType != "pptx") {
    echo "Sorry, only PDF, PPT, and PPTX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Attempt to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
