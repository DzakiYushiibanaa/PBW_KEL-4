<?php
include 'connect.php'; // Sertakan koneksi database

// Fungsi untuk menambah pengguna
function addUser($conn, $username, $password, $role) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";
    return $conn->query($query);
}

// Fungsi untuk mengedit pengguna
function editUser($conn, $id_user, $username, $role) {
    $query = "UPDATE users SET username='$username', role='$role' WHERE id_user='$id_user'";
    return $conn->query($query);
}

// Fungsi untuk menghapus pengguna
function deleteUser($conn, $id_user) {
    $query = "DELETE FROM users WHERE id_user='$id_user'";
    return $conn->query($query);
}

// Proses berdasarkan permintaan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        addUser($conn, $username, $password, $role);
        header("Location: ./public/user_management.php?message=User added successfully");
        exit();
    } elseif (isset($_POST['edit_user'])) {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        editUser($conn, $id_user, $username, $role);
        header("Location: ./public/user_management.php?message=User updated successfully");
        exit();
    } elseif (isset($_POST['delete_user'])) {
        $id_user = $_POST['id_user'];
        deleteUser($conn, $id_user);
        header("Location: ./public/user_management.php?message=User deleted successfully");
        exit();
    }
}
$conn->close();
?>
