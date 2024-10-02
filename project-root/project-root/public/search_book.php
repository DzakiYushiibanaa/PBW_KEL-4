<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Search for a Book</h2>
    <form action="search_book.php" method="GET">
        <input type="text" name="query" placeholder="Search by title or author" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['query'])) {
        include 'views/connect.php';
        $query = $_GET['query'];

        $sql = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?";
        $search_query = "%$query%";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $search_query, $search_query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Title</th><th>Author</th><th>Genre</th><th>Year</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["author"] . "</td>
                    <td>" . $row["genre"] . "</td>
                    <td>" . $row["year"] . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No books found";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
