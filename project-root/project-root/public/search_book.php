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
        include 'views/connect.php'; // Panggil koneksi database
        $query = $_GET['query'];

        // Query untuk mencari buku berdasarkan judul atau penulis
        $sql = "SELECT * FROM books WHERE title LIKE :query OR author LIKE :query";
        $stmt = $conn->prepare($sql);
        
        // Menggunakan wildcard untuk pencarian
        $search_query = "%$query%";
        $stmt->bindParam(':query', $search_query, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua hasil sebagai array asosiatif

        if (count($result) > 0) {
            echo "<table><tr><th>Title</th><th>Author</th><th>Genre</th><th>Year</th></tr>";
            foreach ($result as $row) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["title"]) . "</td>
                    <td>" . htmlspecialchars($row["author"]) . "</td>
                    <td>" . htmlspecialchars($row["genre"]) . "</td>
                    <td>" . htmlspecialchars($row["year"]) . "</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "No books found";
        }
    }
    ?>
</body>
</html>
