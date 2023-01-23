<!DOCTYPE html>
<html>
<head>
    <title>Published Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>
<div class="main">
    <h1>Published Books</h1>
    <?php
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'books');

        // Get all published books
        $query = "SELECT * FROM books WHERE status='published'";
        $result = $conn->query($query);

        // Check if there are any published books
        if ($result->num_rows > 0) {
            // Display published books
            while ($row = $result->fetch_assoc()) {
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>By ' . $row['author'] . '</p>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<a href="download.php?id=' . $row['id'] . '">Download</a>';
            }
        } else {
            echo '<p>Não há registros para exibir</p>';
        }
    ?>
    </div>
</body>
</html>