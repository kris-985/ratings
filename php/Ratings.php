<?php

class Ratings {
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addRating($name, $rating) {
        $stmt = $this->conn->prepare("INSERT INTO ratings (name, rating) VALUES (?, ?)");
        $stmt->bind_param("sd", $name, $rating);
        $stmt->execute();
        $stmt->close();
    }

    public function editRating($id, $name, $rating) {
        $stmt = $this->conn->prepare("UPDATE ratings SET name = ?, rating = ? WHERE id = ?");
        $stmt->bind_param("sdi", $name, $rating, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteRating($id) {
        $stmt = $this->conn->prepare("DELETE FROM ratings WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getRatings() {
        $result = $this->conn->query("SELECT * FROM ratings");
        $ratings = [];
        while ($row = $result->fetch_assoc()) {
            $ratings[] = $row;
        }
        return $ratings;
    }
}
?>
