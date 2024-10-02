<?php
include './views/auth.php'; // Panggil file autentikasi
checkAuth();   // Memeriksa apakah pengguna sudah login
checkAdmin();  // Memeriksa apakah pengguna adalah admin
include './views/connect.php'; // Panggil koneksi database

// Jika sudah login dan admin, lanjutkan menampilkan daftar user
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Semua Pengguna</h2>

    <?php
    $sql = "SELECT * FROM users"; // Query untuk mendapatkan semua data pengguna
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["role"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada pengguna yang ditemukan";
    }

    $conn->close(); // Tutup koneksi database
    ?>
</body>
</html>
