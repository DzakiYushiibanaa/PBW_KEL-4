<?php
class Book {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addBook($title, $author, $published_year, $isbn) {
        $query = "INSERT INTO books (title, author, published_year, isbn) VALUES ('$title', '$author', '$published_year', '$isbn')";
        return $this->conn->query($query);
    }

    public function editBook($id, $title, $author, $published_year, $isbn) {
        $query = "UPDATE books SET title='$title', author='$author', published_year='$published_year', isbn='$isbn' WHERE id='$id'";
        return $this->conn->query($query);
    }

    public function deleteBook($id) {
        $query = "DELETE FROM books WHERE id='$id'";
        return $this->conn->query($query);
    }

    public function fetchAllBooks() {
        $query = "SELECT * FROM books";
        return $this->conn->query($query);
    }

    public function searchBooks($keyword) {
        $query = "SELECT * FROM books WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%'";
        return $this->conn->query($query);
    }

    public function getBookById($id) {
        $query = "SELECT * FROM books WHERE id='$id'";
        return $this->conn->query($query)->fetch_assoc();
    }
}
?>
