<?php
include './models/User.php';
include './views/connect.php'; // Koneksi database

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->userModel->register($username, $password)) {
                header("Location: ./public/login.php?message=Registration successful.");
                exit();
            } else {
                header("Location: ./public/register.php?error=Registration failed.");
                exit();
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: ./public/dashboard.php");
                exit();
            } else {
                header("Location: ./public/login.php?error=Invalid credentials.");
                exit();
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ./public/login.php");
        exit();
    }
}
?>
