
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add a New Book</h2>
    <form action="views/add_book_process.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required><br>

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
