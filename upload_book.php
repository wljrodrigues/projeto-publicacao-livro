<?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'books');

    // Get form data
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $file = $_FILES['file'];

    // Check if file was uploaded
    if (!empty($file['name'])) {
        // File uploaded
        // Move file to appropriate location
        $target_dir = "path/to/uploaded/books/";
        $target_file = $target_dir . basename($file["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
            echo "Sorry, only PDF, DOC & DOCX files are allowed.";
            exit;
        }
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            echo "The file ". basename( $file["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        // Insert book data into database
        $query = "INSERT INTO books (title, author, description, file, date_published, status) VALUES ('$title', '$author', '$description', '$file[name]', NOW(), 'submitted')";
        $conn->query($query);

        echo 'Book uploaded successfully.';
    
         
    } else {
        // File not uploaded
        echo "Sorry, no file was selected.";
    }

    
    $conn->close();

    
?>