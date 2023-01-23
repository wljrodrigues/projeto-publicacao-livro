<!DOCTYPE html>
<html>
<head>
    <title>Book Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>Book Review</h1>
    <?php
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'books');

        // Approve a book submission
        if (isset($_GET['approve'])) {
            $id = $_GET['approve'];
            $query = "UPDATE books SET status='published' WHERE id=$id";
            $conn->query($query);
        }

        // Reject a book submission
        if (isset($_GET['reject'])) {
            $id = $_GET['reject'];
            $query = "UPDATE books SET status='rejected' WHERE id=$id";
            $conn->query($query);
        }

        // Get all book submissions
        $query = "SELECT * FROM books WHERE status='submitted'";
        $result = $conn->query($query);

        // Check if there are any book submissions
        if ($result->num_rows > 0) {
            // Display book submissions for review
            while ($row = $result->fetch_assoc()) {
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>By ' . $row['author'] . '</p>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<a href="?approve=' . $row['id'] . '">Approve</a>';
                echo '<a href="?reject=' . $row['id'] . '">Reject</a>';
            }
        } else {
            echo '<p>Não há registros para exibir</p>';
        }
    ?>
</body>
</html>