<?php
$dir = "uploads/"; // Directory where files are stored

if (isset($_GET['file'])) { // Check if 'file' parameter is set in the URL
    $fileName = basename($_GET['file']); // Get the file name from the URL
    $filePath = $dir . $fileName; // Construct the file path

    if (file_exists($filePath) && dirname(realpath($filePath)) === realpath($dir)) { // Check if the file exists and is within the uploads directory
        header('Content-Description: File Transfer'); // Set content description for file transfer
        header('Content-Type: application/octet-stream'); // Set content type as octet-stream
        header('Content-Disposition: attachment; filename="' . $fileName . '"'); // Set content disposition as attachment
        header('Expires: 0'); // Set expiration to 0
        header('Cache-Control: must-revalidate'); // Set cache control to must-revalidate
        header('Pragma: public'); // Set pragma as public
        header('Content-Length: ' . filesize($filePath)); // Set content length
        flush(); // Flush output buffer
        readfile($filePath); // Read and output file
        exit; // Exit script
    } else {
        echo "Error: File not found."; // Output error message if file not found
    }
} else {
    echo "Error: No file specified."; // Output error message if no file specified
}
?>
