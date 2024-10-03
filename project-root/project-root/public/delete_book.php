<?php
include 'views/connect.php'; // Mengimpor koneksi database

if (isset($_GET['id'])) { // Memeriksa apakah ada parameter 'id' di URL
    $book_id = $_GET['id']; // Mengambil ID buku dari parameter GET

    try {
        // Query untuk menghapus buku
        $sql = "DELETE FROM books WHERE book_id = :book_id";
        $stmt = $conn->prepare($sql); // Mempersiapkan statement
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT); // Mengikat parameter

        if ($stmt->execute()) { // Menjalankan query
            header("Location: view_books.php?message=Book deleted successfully"); // Redirect dengan pesan sukses
            exit(); // Menghentikan skrip setelah pengalihan
        } else {
            echo "Error: Unable to delete the book."; // Menampilkan pesan error jika query gagal
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Menampilkan pesan error jika terjadi kesalahan PDO
    }
}
?>
