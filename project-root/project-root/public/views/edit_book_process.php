<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "UPDATE books SET title = ?, author = ?, genre = ?, year = ? WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $title, $author, $genre, $year, $book_id);

    if ($stmt->execute()) {
        echo "Book updated successfully";
        header("Location: ../view_books.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
