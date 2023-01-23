<?php
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'books');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into users table
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username',  '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>