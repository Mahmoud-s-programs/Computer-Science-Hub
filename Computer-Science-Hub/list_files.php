<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Set character encoding -->
    <title>Uploaded Files</title> <!-- Page title -->
    <link rel="stylesheet" href="resources.css"> <!-- Link to external CSS file -->
</head>
<body>
<div class="content"> <!-- Content section -->
    <h2>Uploaded Files</h2> <!-- Heading -->
    <div class="file-list"> <!-- File list section -->
        <?php
        $dir = "uploads/"; // Directory where files are stored

        if (is_dir($dir)){ // Check if directory exists
            if ($dh = opendir($dir)){ // Open directory
                echo "<ul>"; // Start unordered list
                while (($file = readdir($dh)) !== false){ // Loop through directory
                    if ($file != "." && $file != "..") { // Exclude current and parent directories
                        echo "<li><a href='download.php?file=" . urlencode($file) . "'>" . htmlspecialchars($file) . "</a></li>"; // Output file as a list item with a download link
                    }
                }
                echo "</ul>"; // End unordered list
                closedir($dh); // Close directory
            }
        }
        ?>
    </div>
</div>
</body>
</html>
