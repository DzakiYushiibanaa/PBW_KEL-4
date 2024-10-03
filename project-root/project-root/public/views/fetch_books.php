<?php
include './config/config.php'; // Mengimpor koneksi database
include './models/Book.php'; // Mengimpor model Buku

// Membuat objek Book
$bookModel = new Book($conn);

// Mengambil semua buku dari database
$books = $bookModel->fetchAllBooks();
$bookData = [];

// Memeriksa apakah ada buku yang ditemukan
if ($books->rowCount() > 0) { // Menggunakan rowCount() untuk PDO
    while ($row = $books->fetch(PDO::FETCH_ASSOC)) { // Menggunakan fetch() untuk PDO
        $bookData[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'author' => $row['author'],
            'published_year' => $row['published_year'],
            'isbn' => $row['isbn']
        ];
    }
}

// Mengembalikan data buku dalam format JSON
header('Content-Type: application/json');
echo json_encode($bookData);
?>
