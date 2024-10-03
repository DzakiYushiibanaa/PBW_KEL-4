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
    // Query untuk mendapatkan semua data pengguna
    $sql = "SELECT * FROM users"; 
    $stmt = $conn->prepare($sql); // Mempersiapkan statement
    $stmt->execute(); // Menjalankan query

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua data pengguna

    if (count($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                </tr>";
        foreach ($result as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["username"]) . "</td>
                    <td>" . htmlspecialchars($row["role"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada pengguna yang ditemukan";
    }

    $conn = null; // Tutup koneksi database
    ?>
</body>
</html>
