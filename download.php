<?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'books');
   
    // Get book ID
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Get book file name
    $query = "SELECT file FROM books WHERE id=$id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $file_name = $row['file'];

   
        // Set headers
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/octet-stream");

        // Read and output file content
        readfile("path/to/uploaded/books/$file_name");
    
    $conn->close();
?>
