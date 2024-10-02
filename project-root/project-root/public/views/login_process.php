<?php
session_start();
include 'connect.php'; // Sertakan koneksi database
include './models/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: ./public/dashboard.php"); // Redirect ke dashboard
            exit();
        } else {
            header("Location: ./public/login.php?error=Invalid credentials.");
            exit();
        }
    } else {
        header("Location: ./public/login.php?error=User not found.");
        exit();
    }
}
$conn->close();
?>
