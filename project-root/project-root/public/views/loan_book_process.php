<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];

    $sql = "INSERT INTO loans (user_id, book_id, loan_date) VALUES (?, ?, CURDATE())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $book_id);

    if ($stmt->execute()) {
        echo "Book loaned successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
