<?php
//require_once './db_conn.php'; // Assuming you have a Database class
require_once __DIR__."/../db_conn.php";

class Inventory {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($code, $qty) {
        $connection = $this->db->getConnection();
        $code = $connection->real_escape_string($code);
        $qty = $connection->real_escape_string($qty);

        $sql = "INSERT INTO inventory ( product_id, quantity) VALUES ('$code', '$qty')";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function read() {
        $connection = $this->db->getConnection();
        $sql = "SELECT inventory.id, inventory.product_id, products.code, products.name, products.description, inventory.quantity, products.purchase_cost FROM inventory INNER JOIN products ON inventory.product_id=products.id";
        $result = $connection->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function update($id,$code, $qty) {
        $connection = $this->db->getConnection();
        $id = $connection->real_escape_string($id);
        $code = $connection->real_escape_string($code);
        $qty = $connection->real_escape_string($qty);

        $sql = "UPDATE inventory SET product_id='$code', quantity='$qty' WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $connection = $this->db->getConnection();
        $sql = "DELETE FROM inventory WHERE inventory.id=$id";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

// Handle AJAX requests
$data = new Inventory();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Get product by ID
        $id = $_GET['id'];
        $invData = $data->read();
        foreach ($invData as $row) {
            if ($row['id'] == $id) {
                echo json_encode($row);
                break;
            }
        }
    } else {
        // Get all products
        // Fetch inventory from the database
        $inventory = $data->read();
        echo json_encode($inventory);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['deleteId'])) {
        // Delete product
        parse_str(file_get_contents("php://input"), $deleteParams);
        $id = $deleteParams['deleteId'];
        if ($data->delete($id)) {
            echo 'Product deleted successfully';
        } else {
            echo 'Failed to delete product';
        }
    }elseif (isset($_POST['editStockID'])){
        // Update the Stocks
        $id = $_POST['editStockID'];
        $code = $_POST['editProduct_id'];
        $qty = $_POST['editQty'];

        if ($data->update($id, $code, $qty)) {
            echo 'Product updated successfully';
        } else {
            echo 'Failed to updated product';
        }
    }else {
        // Add new product
        $code = $_POST['code'];
        $qty = $_POST['quantity'];

        if ($data->create($code, $qty)) {
            echo 'Stocks has been added successfully';
        } else {
            echo 'Failed to add Stocks';
        }
    }
}
