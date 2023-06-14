<?php
include("connection.php");

if (isset($_GET['file_id'])) {
    $file_id = $_GET['file_id'];

    // Retrieve file data from the database
    $query = "SELECT * FROM template7 WHERE user_id = $file_id";
    $result = mysqli_query($con2, $query);
    $file = mysqli_fetch_assoc($result);

    // Set appropriate headers for file download
    header('Content-Type: ' . $file['filetype']);
    header('Content-Disposition: attachment; filename="' . $file['filename'] . '"');
    header('Content-Length: ' . strlen($file['filedata']));

    // Output the file data
    echo $file['filedata'];
    exit();
}
?>