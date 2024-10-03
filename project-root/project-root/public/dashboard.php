<?php
include 'views/auth.php'; // Sertakan file untuk otentikasi
checkAuth(); // Memeriksa apakah pengguna sudah terautentikasi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Tautan ke file CSS -->
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2> <!-- Menampilkan nama pengguna -->
    <p>Your role is: <?php echo $_SESSION['role']; ?></p> <!-- Menampilkan peran pengguna -->

    <h3>Navigation</h3>
    <ul>
        <li><a href="view_books.php">View Books</a></li> <!-- Tautan untuk melihat buku -->
        
        <?php if ($_SESSION['role'] === 'admin'): ?> <!-- Tautan khusus untuk admin -->
            <li><a href="add_book.php">Add Book</a></li> <!-- Tautan untuk menambah buku -->
            <li><a href="manage_users.php">Manage Users</a></li> <!-- Tautan untuk mengelola pengguna -->
        <?php endif; ?>
        
        <li><a href="logout.php">Logout</a></li> <!-- Tautan untuk logout -->
    </ul>
</body>
</html>
