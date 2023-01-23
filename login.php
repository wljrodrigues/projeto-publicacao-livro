<?php

    session_start();

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'books');

    // Get form data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check if username and password match a user in the database
    $query = "SELECT id, role FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_role'] = $row['role'];
        header('Location: add-livro.html');
    } else {
        echo '<script type="text/javascript">alert("Invalid username or password.");</script>';
    }

    

    $conn->close();
?>

<!-- login form -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<form action="login.php" method="post">

        <div class="form-outline mb-4">
        <label for="username" class="form-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control" >

        <label for="password" class="form-label">Senha:</label>
        <input type="password" id="password" name="password" class="form-control" >
        </div>
        <button type="button" class="btn btn-link btn-floating mx-1">
            <input type="submit" value="Login">
          </button>
        
    </form>