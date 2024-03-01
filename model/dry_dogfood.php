<?php
//require_once './db_conn.php'; // Assuming you have a Database class
require_once __DIR__."/../db_conn.php";

class Inventory {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function read() {
        $connection = $this->db->getConnection();
        $sql = "SELECT inventory.id, inventory.product_id, products.code, products.name, products.description, products.image_dir, inventory.quantity, products.purchase_cost, products.sales_price FROM inventory INNER JOIN products ON inventory.product_id=products.id WHERE inventory.quantity!=0 AND products.category=3";
        $result = $connection->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}

// Handle AJAX requests
$data = new Inventory();

// Fetch options from the database
$options = $data->read();

// Output options as JSON
echo json_encode($options);