<?php
include 'views/connect.php';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $sql = "DELETE FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $book_id);

    if ($stmt->execute()) {
        echo "Book deleted successfully";
        header("Location: view_books.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
