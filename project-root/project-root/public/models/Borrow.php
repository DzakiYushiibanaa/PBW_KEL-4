<?php
class Borrow {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function borrowBook($userId, $bookId) {
        $query = "INSERT INTO borrows (id_user, id_buku, tanggal_pinjam, status) VALUES (:userId, :bookId, CURDATE(), 'dipinjam')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':bookId', $bookId);
        return $stmt->execute();
    }

    public function returnBook($borrowId) {
        $query = "UPDATE borrows SET tanggal_kembali = CURDATE(), status = 'dikembalikan' WHERE id_peminjaman = :borrowId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':borrowId', $borrowId);
        return $stmt->execute();
    }

    public function checkBorrowStatus($userId) {
        $query = "SELECT * FROM borrows WHERE id_user = :userId AND status = 'dipinjam'";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchAllBorrows() {
        $query = "SELECT * FROM borrows";
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function overdueBooks() {
        $query = "SELECT * FROM borrows WHERE status = 'dipinjam' AND DATEDIFF(CURDATE(), tanggal_pinjam) > 30"; // Contoh: overdue jika lebih dari 30 hari
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
