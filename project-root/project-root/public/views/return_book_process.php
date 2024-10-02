<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loan_id = $_POST['loan_id'];

    $sql = "UPDATE loans SET return_date = CURDATE() WHERE loan_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $loan_id);

    if ($stmt->execute()) {
        echo "Book returned successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
