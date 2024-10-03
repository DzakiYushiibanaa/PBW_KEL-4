<?php
include 'views/connect.php'; // Sertakan koneksi database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="/public/style_view_books.css">
</head>
<body>
    <h2>All Books</h2>

    <?php
    // Mengambil semua buku dari database
    $sql = "SELECT * FROM books";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "<table><tr><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th></tr>";
        foreach ($result as $row) {
            echo "<tr>
                <td>" . htmlspecialchars($row["title"]) . "</td>
                <td>" . htmlspecialchars($row["author"]) . "</td>
                <td>" . htmlspecialchars($row["genre"]) . "</td>
                <td>" . htmlspecialchars($row["year"]) . "</td>
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

    $conn = null; // Menutup koneksi
    ?>
</body>
</html>
