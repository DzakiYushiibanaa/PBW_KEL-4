<?php
include 'views/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>All Books</h2>

    <?php
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["title"] . "</td>
                <td>" . $row["author"] . "</td>
                <td>" . $row["genre"] . "</td>
                <td>" . $row["year"] . "</td>
                <td>
                    <a href='edit_book.php?id=" . $row["book_id"] . "'>Edit</a> |
                    <a href='delete_book.php?id=" . $row["book_id"] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No books found";
    }

    $conn->close();
    ?>
</body>
</html>
