<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
    <link rel="stylesheet" href="/public/style_add_book.css"> <!-- Gaya CSS untuk halaman -->
</head>
<body>
    <form action="views/add_book_process.php" method="POST">
        <h2>Add a New Book</h2>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>