<?php
include 'connect.php'; // Sertakan koneksi database
include './models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // Set role default sebagai user biasa

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan pengguna baru
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
    
    if ($conn->query($query) === TRUE) {
        header("Location: ./public/login.php?message=Registration successful, please log in.");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
$conn->close();
?>
