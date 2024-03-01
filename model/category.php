<?php
//require_once('./db_conn.php');
require_once __DIR__."/../db_conn.php";

class Category {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function read() {
        $connection = $this->db->getConnection();
        $sql = "SELECT id, category_type FROM categories";
        $result = $connection->query($sql);
        $category = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category[] = $row;
            }
        }
        return $category;
    }
}

// Handle AJAX requests
$category = new Category();

// Fetch options from the database
$options = $category->read();

// Output options as JSON
echo json_encode($options);