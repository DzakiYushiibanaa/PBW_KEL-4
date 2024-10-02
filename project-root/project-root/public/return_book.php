<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return a Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Return a Book</h2>
    <form action="views/return_book_process.php" method="POST">
        <label for="loan_id">Loan ID:</label>
        <input type="text" id="loan_id" name="loan_id" required><br>

        <input type="submit" value="Return Book">
    </form>
</body>
</html>
