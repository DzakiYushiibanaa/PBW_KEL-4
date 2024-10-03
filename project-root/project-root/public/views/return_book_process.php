<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loan_id = $_POST['loan_id'];

    $sql = "UPDATE loans SET return_date = CURDATE() WHERE loan_id = :loan_id";
    $stmt = $conn->prepare($sql);
    
    // Binding parameter
    $stmt->bindParam(':loan_id', $loan_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Book returned successfully";
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Menampilkan pesan kesalahan
    }
}

$conn = null; // Menutup koneksi
?>
