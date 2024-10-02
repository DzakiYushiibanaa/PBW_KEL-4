<?php
include 'views/auth.php';
checkAuth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Your role is: <?php echo $_SESSION['role']; ?></p>

    <h3>Navigation</h3>
    <ul>
        <li><a href="view_books.php">View Books</a></li>
        
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <li><a href="add_book.php">Add Book</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
        <?php endif; ?>
        
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
