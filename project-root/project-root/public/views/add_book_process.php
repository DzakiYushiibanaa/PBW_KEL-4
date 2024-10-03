<?php
include 'connect.php'; // Koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    // Siapkan query untuk menambahkan buku
    $sql = "INSERT INTO books (title, author, genre, year) VALUES (:title, :author, :genre, :year)";
    $stmt = $conn->prepare($sql);

    // Ikat parameter
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':year', $year);

    // Eksekusi statement dan periksa hasilnya
    if ($stmt->execute()) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Menampilkan error jika ada
    }
}

// Menutup koneksi tidak diperlukan jika menggunakan PDO dengan mode persistent
?>
