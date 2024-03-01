<?php
//require_once './db_conn.php'; // Assuming you have a Database class
require_once __DIR__."/../db_conn.php";

class Users {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($fname, $lname, $num, $username, $email, $password) {
        $connection = $this->db->getConnection();
        $fname = $connection->real_escape_string($fname);
        $lname = $connection->real_escape_string($lname);
        $num = $connection->real_escape_string($num);
        $username = $connection->real_escape_string($username);
        $email = $connection->real_escape_string($email);
        $password = $connection->real_escape_string($password);

        $duplicate = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' OR email='$email'");

        if (mysqli_num_rows($duplicate) > 0) {
            return false;
            //username or email has already taken
        }else {
            $sql = "INSERT INTO users ( username, first_name, last_name, contact_number, email, password) VALUES ('$username', '$fname', '$lname', '$num', '$email', '$password')";
            if ($connection->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
}

// Handle AJAX requests
$data = new Users();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Add new users
    $fname = $_POST['floatingFname'];
    $lname = $_POST['floatingLname'];
    $num = $_POST['floatingNumber'];
    $username = $_POST['floatingUsername'];
    $email = $_POST['floatingEmail'];
    $password = $_POST['floatingPwd'];

    if (empty($fname)) {
        $em ="Name is required";
        header ("Location: homepage.php?error=$em");
        exit;    
    } else if (empty($lname)) {
        $em ="Name is required";
        header ("Location: homepage.php?error=$em");
        exit;   
    } else if (empty($num)) {
        $em ="Contact number is required";
        header ("Location: homepage.php?error=$em");
        exit;   
    } else if (empty($username)) {
        $em ="Username is required";
        header ("Location: homepage.php?error=$em");
    } else if (empty($email)) {
        $em ="Email is required";
        header ("Location: homepage.php?error=$em");
    } else if (empty($password)) {
        $em ="Email is required";
        header ("Location: homepage.php?error=$em");
    } else {
        //Hashing password
        $password = password_hash($password, PASSWORD_DEFAULT);
        if ($data->create($fname, $lname, $num, $username, $email, $password)) {
            echo 'Product added successfully';
        } else {
            echo 'Failed to add product';
        }
    }
}
