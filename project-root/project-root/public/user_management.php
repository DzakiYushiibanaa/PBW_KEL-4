<?php
session_start();
include './views/connect.php'; // Sertakan koneksi database
include './views/auth.php'; // Sertakan autentikasi

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Ambil semua pengguna untuk ditampilkan
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Manajemen Pengguna</h1>
    
    <?php if (isset($_GET['message'])): ?>
        <p><?php echo $_GET['message']; ?></p>
    <?php endif; ?>

    <form action="./views/user_management_process.php" method="POST">
        <h2>Tambah Pengguna</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="user">User Biasa</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="add_user" value="Tambah Pengguna">
    </form>

    <h2>Daftar Pengguna</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_user']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td>
                <form action="./views/user_management_process.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                    <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
                    <select name="role" required>
                        <option value="user" <?php echo $row['role'] == 'user' ? 'selected' : ''; ?>>User Biasa</option>
                        <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                    <input type="submit" name="edit_user" value="Edit">
                </form>
                <form action="./views/user_management_process.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                    <input type="submit" name="delete_user" value="Hapus" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
