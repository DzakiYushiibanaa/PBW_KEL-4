<?php
include 'connect.php'; // Koneksi database dengan PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    // Siapkan SQL untuk memperbarui data buku
    $sql = "UPDATE books SET title = :title, author = :author, genre = :genre, year = :year WHERE book_id = :book_id";
    $stmt = $conn->prepare($sql);

    // Ikat parameter
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':book_id', $book_id);

    // Eksekusi perintah
    if ($stmt->execute()) {
        echo "Book updated successfully";
        header("Location: ../view_books.php");
        exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Menampilkan pesan kesalahan
    }

    $stmt->closeCursor(); // Menutup cursor untuk penggunaan selanjutnya
    $conn = null; // Menutup koneksi PDO
}
?>
