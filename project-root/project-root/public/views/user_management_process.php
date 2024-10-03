<?php
include 'connect.php'; // Sertakan koneksi database

// Fungsi untuk menambah pengguna
function addUser($conn, $username, $password, $role) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role);
    return $stmt->execute();
}

// Fungsi untuk mengedit pengguna
function editUser($conn, $id_user, $username, $role) {
    $query = "UPDATE users SET username = :username, role = :role WHERE id_user = :id_user";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    return $stmt->execute();
}

// Fungsi untuk menghapus pengguna
function deleteUser($conn, $id_user) {
    $query = "DELETE FROM users WHERE id_user = :id_user";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    return $stmt->execute();
}

// Proses berdasarkan permintaan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        if (addUser($conn, $username, $password, $role)) {
            header("Location: ./public/user_management.php?message=User added successfully");
            exit();
        } else {
            echo "Error adding user.";
        }
    } elseif (isset($_POST['edit_user'])) {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        if (editUser($conn, $id_user, $username, $role)) {
            header("Location: ./public/user_management.php?message=User updated successfully");
            exit();
        } else {
            echo "Error updating user.";
        }
    } elseif (isset($_POST['delete_user'])) {
        $id_user = $_POST['id_user'];
        if (deleteUser($conn, $id_user)) {
            header("Location: ./public/user_management.php?message=User deleted successfully");
            exit();
        } else {
            echo "Error deleting user.";
        }
    }
}
$conn = null; // Menutup koneksi
?>
