<?php
include 'views/connect.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE book_id = $book_id";
    $result = $conn->query($sql);
    $book = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Book</h2>
    <form action="views/edit_book_process.php" method="POST">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" required><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="<?php echo $book['genre']; ?>" required><br>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="<?php echo $book['year']; ?>" required><br>

        <input type="submit" value="Update Book">
    </form>
</body>
</html>
