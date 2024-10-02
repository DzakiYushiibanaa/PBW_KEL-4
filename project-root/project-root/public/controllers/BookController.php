<?php
include './models/Book.php';
include './views/connect.php'; // Koneksi database

class BookController {
    private $bookModel;

    public function __construct($db) {
        $this->bookModel = new Book($db);
    }

    public function addBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published_year = $_POST['published_year'];
            $isbn = $_POST['isbn'];

            if ($this->bookModel->addBook($title, $author, $published_year, $isbn)) {
                header("Location: ./public/view_books.php?message=Book added successfully.");
                exit();
            } else {
                header("Location: ./public/add_book.php?error=Failed to add book.");
                exit();
            }
        }
    }

    public function editBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $published_year = $_POST['published_year'];
            $isbn = $_POST['isbn'];

            if ($this->bookModel->editBook($id, $title, $author, $published_year, $isbn)) {
                header("Location: ./public/view_books.php?message=Book updated successfully.");
                exit();
            } else {
                header("Location: ./public/edit_book.php?id=$id&error=Failed to update book.");
                exit();
            }
        }
    }

    public function deleteBook() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->bookModel->deleteBook($id)) {
                header("Location: ./public/view_books.php?message=Book deleted successfully.");
                exit();
            } else {
                header("Location: ./public/view_books.php?error=Failed to delete book.");
                exit();
            }
        }
    }

    public function fetchBooks() {
        return $this->bookModel->fetchAllBooks();
    }
}
?>
