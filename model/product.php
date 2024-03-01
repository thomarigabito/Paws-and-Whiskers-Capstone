<?php
//require_once('./db_conn.php');
require_once __DIR__."/../db_conn.php";

class Product {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($code, $name, $description, $new_img_name, $category, $dealer, $purchase_cost, $sale_price) {
        $connection = $this->db->getConnection();
        $code = $connection->real_escape_string($code);
        $name = $connection->real_escape_string($name);
        $description = $connection->real_escape_string($description);
        $image = $connection->real_escape_string($new_img_name);
        $category = $connection->real_escape_string($category);
        $dealer = $connection->real_escape_string($dealer);
        $purchase_cost = $connection->real_escape_string($purchase_cost);
        $sale_price = $connection->real_escape_string($sale_price);

        $sql = "INSERT INTO products ( code, name, description, image_dir, category, dealer, purchase_cost, sales_price) VALUES ('$code', '$name', '$description', '$image', '$category', '$dealer', '$purchase_cost', '$sale_price')";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function read() {
        $connection = $this->db->getConnection();
        $sql = "SELECT products.id, products.code, products.name, products.description, products.image_dir, dealers.dealer_name, products.dealer, products.category, categories.category_type, products.purchase_cost, products.sales_price FROM products INNER JOIN dealers ON dealers.id=products.dealer INNER JOIN categories ON categories.id=products.category";
        $result = $connection->query($sql);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public function update($id, $code, $name, $description, $new_img_name, $category, $dealer, $purchase_cost, $sale_price) {
        $connection = $this->db->getConnection();
        $id = $connection->real_escape_string($id);
        $code = $connection->real_escape_string($code);
        $name = $connection->real_escape_string($name);
        $description = $connection->real_escape_string($description);
        $image = $connection->real_escape_string($new_img_name);
        $category = $connection->real_escape_string($category);
        $dealer = $connection->real_escape_string($dealer);
        $purchase_cost = $connection->real_escape_string($purchase_cost);
        $sale_price = $connection->real_escape_string($sale_price);

        $sql = "UPDATE products SET name='$name', description='$description', image_dir='$image', category='$category', dealer='$dealer', purchase_cost='$purchase_cost', sales_price='$sale_price' WHERE id='$id'";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $connection = $this->db->getConnection();
        $sql = "DELETE FROM products WHERE id=$id";
        if ($connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

// Handle AJAX requests
$product = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // Get product by ID
        $id = $_GET['id'];
        $productData = $product->read();
        foreach ($productData as $row) {
            if ($row['id'] == $id) {
                echo json_encode($row);
                break;
            }
        }
    } else {
        // Get all products
        $productData = $product->read();
        echo json_encode($productData);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if (isset($_POST['deleteId'])) {
        // Delete product
        parse_str(file_get_contents("php://input"), $deleteParams);
        $id = $deleteParams['deleteId'];
        if ($product->delete($id)) {
            echo 'Product deleted successfully';
        } else {
            echo 'Failed to delete product';
        }
    } elseif (isset($_POST['editId'])) {
        // Update the product
        $id = $_POST['editId'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        $category = $_POST['category'];
        $dealer = $_POST['dealer'];
        $purchase_cost = $_POST['purchase_cost'];
        $sale_price = $_POST['sale_price'];

        if ($error === 0) {
            if ($img_size > 12500) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = dirname(__DIR__).'/img'.'/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    if ($product->update($id, $code, $name, $description, $new_img_name, $category, $dealer, $purchase_cost, $sale_price)) {
                        echo 'Product updated successfully';
                    } else {
                        echo 'Failed to updated product';
                    }
                } else {
                    $err = 'Sorry! You can not upload files of this type.';
                    print_r($err);
                }

            } else {
                $err = 'Sorry! Your file is too large.';
                print_r($err);
            }
        } else {
            $err = 'unknown error occured!';
            print_r($err);
        }
    } elseif (isset($_FILES['image'])) {
        // Add new product
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img_name = $_FILES['image']['name'];
        $img_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        $category = $_POST['category'];
        $dealer = $_POST['dealer'];
        $purchase_cost = $_POST['purchase_cost'];
        $sale_price = $_POST['sale_price'];
        
        if ($error === 0) {
            if ($img_size > 12500) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = dirname(__DIR__).'/img'.'/'.$new_img_name;
                    print_r($img_upload_path);
                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    if ($product->create($code, $name, $description, $new_img_name, $category, $dealer, $purchase_cost, $sale_price)) {
                        echo 'Product added successfully';
                    } else {
                        echo 'Failed to add product';
                    }
                } else {
                    $err = 'Sorry! You can not upload files of this type.';
                    print_r($err);
                }

            } else {
                $err = 'Sorry! Your file is too large.';
                print_r($err);
            }
        } else {
            $err = 'unknown error occured!';
            header('Location: index.php?error=$err');
        }
    }
}