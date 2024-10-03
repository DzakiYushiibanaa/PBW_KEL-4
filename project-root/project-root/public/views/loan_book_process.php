<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];

    $sql = "INSERT INTO loans (user_id, book_id, loan_date) VALUES (?, ?, CURDATE())";
    $stmt = $conn->prepare($sql);

    // Menggunakan try-catch untuk menangani kesalahan
    try {
        $stmt->execute([$user_id, $book_id]);
        echo "Book loaned successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Menutup koneksi
?>
