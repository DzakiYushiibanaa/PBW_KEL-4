<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan a Book</title>
    <link rel="stylesheet" href="/public/style_loan_book.css">
</head>
<body>
    <form action="views/loan_book_process.php" method="POST">
    <h2>Loan a Book</h2>
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br>

        <label for="book_id">Book ID:</label>
        <input type="text" id="book_id" name="book_id" required><br>

        <input type="submit" value="Loan Book">
    </form>
</body>
</html>
