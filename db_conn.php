<?php
    class Database {
        private $host = '127.0.0.1:3306';
        private $username = 'u507360145_root_mymp3';
        private $password = 'mymp3_rootPass';
        private $database = 'u507360145_mymp3_db';
        private $connection;

        public function __construct() {
            $this->connection = new Mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }
        
        public function getConnection() {
            return $this->connection;
        }
    }
?>