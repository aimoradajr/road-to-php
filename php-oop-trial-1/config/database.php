<?php
    class Database {
        private $server = 'localhost';
        private $username = 'temptemp';
        private $password = 'temptemp';
        private $db_name = 'php-oop';
        public $conn;

        public function getConnection() {
            $this->conn = null;
            
            try {
                $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db_name);
                if ($this->conn->connect_error) {
                    die("Connection failed: " . $this->conn->connect_error);
                } 
            }
            catch(Exception $e) {
                echo 'Failed to connect to DB: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }
?>