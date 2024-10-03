<?php
include 'views/connect.php'; // Mengimpor koneksi database

if (isset($_GET['id'])) { // Memeriksa apakah ada parameter 'id' di URL
    $book_id = $_GET['id']; // Mengambil ID buku dari parameter GET

    // Mempersiapkan query untuk mendapatkan data buku
    $sql = "SELECT * FROM books WHERE book_id = :book_id";
    $stmt = $conn->prepare($sql); // Mempersiapkan statement
    $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT); // Mengikat parameter
    $stmt->execute(); // Menjalankan query

    // Mengambil data buku
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect jika tidak ada ID yang diberikan
    header("Location: view_books.php?error=No book ID provided.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="/public/style_edit_book.css">
</head>
<body>
    <form action="views/edit_book_process.php" method="POST">
        <h2>Edit Book</h2>
        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book['genre']); ?>" required>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($book['year']); ?>" required>

        <input type="submit" value="Update Book">
    </form>
</body>
</html>