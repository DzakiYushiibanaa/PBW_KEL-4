<?php
session_start();

function checkAuth() {
    if (!isset($_SESSION['username'])) {
        header("Location: ./login.php");
        exit();
    }
}

function checkAdmin() {
    if ($_SESSION['role'] !== 'admin') {
        echo "You do not have permission to access this page.";
        exit();
    }
}
?>
