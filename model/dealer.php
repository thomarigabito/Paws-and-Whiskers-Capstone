<?php
//require_once('./db_conn.php');
require_once __DIR__."/../db_conn.php";

class Dealer {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function read() {
        $connection = $this->db->getConnection();
        $sql = "SELECT id, dealer_name FROM dealers";
        $result = $connection->query($sql);
        $dealer = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dealer[] = $row;
            }
        }
        return $dealer;
    }
}

// Handle AJAX requests
$dealer = new Dealer();

// Fetch options from the database
$options = $dealer->read();

// Output options as JSON
echo json_encode($options);