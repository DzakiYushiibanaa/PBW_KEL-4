<?php
session_start();
include 'connect.php'; // Koneksi database

function checkAuth() {
    if (!isset($_SESSION['username'])) {
        header("Location: ./login.php");
        exit();
    }
}

function checkAdmin() {
    if (!isset($_SESSION['username'])) {
        checkAuth(); // Pastikan pengguna terautentikasi
    }

    global $conn; // Menggunakan koneksi PDO global

    // Ambil role pengguna dari database
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT role FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['role'] !== 'admin') {
        echo "You do not have permission to access this page.";
        exit();
    }
}
?>
