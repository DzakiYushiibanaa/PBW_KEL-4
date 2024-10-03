<?php
class Book {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addBook($title, $author, $published_year, $isbn) {
        $query = "INSERT INTO books (title, author, published_year, isbn) VALUES (:title, :author, :published_year, :isbn)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':published_year', $published_year);
        $stmt->bindParam(':isbn', $isbn);
        return $stmt->execute();
    }

    public function editBook($id, $title, $author, $published_year, $isbn) {
        $query = "UPDATE books SET title=:title, author=:author, published_year=:published_year, isbn=:isbn WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':published_year', $published_year);
        $stmt->bindParam(':isbn', $isbn);
        return $stmt->execute();
    }

    public function deleteBook($id) {
        $query = "DELETE FROM books WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function fetchAllBooks() {
        $query = "SELECT * FROM books";
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBooks($keyword) {
        $query = "SELECT * FROM books WHERE title LIKE :keyword OR author LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $keyword = '%' . $keyword . '%'; // Menambahkan wildcard untuk pencarian
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $query = "SELECT * FROM books WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
