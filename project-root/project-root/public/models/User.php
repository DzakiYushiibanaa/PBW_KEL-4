<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'user')";
        return $this->conn->query($query);
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user; // Return user data if password is correct
            }
        }
        return null; // User not found or password incorrect
    }
}
?>
