<?php
    class Product {
        // db conn
        private $dbconn;
        private $table_name = 'products';

        // props
        public $id;
        public $name;
        public $price;
        public $description;
        public $category_id;
        public $timestamp;
        
        public function __construct($dbconn){
            $this->dbconn = $dbconn;
        }

        public function create()
        {
            // posted values. lets clean em beybe
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->category_id=htmlspecialchars(strip_tags($this->category_id));

            $this->timestamp = date('Y-m-d H:i:s');

            //write query
            $query = "INSERT INTO
                        " . $this->table_name . "
                    SET
                        name=?, price=?, description=?, category_id=?, created=?";
    
            $stmt = $this->dbconn->prepare($query);
            $stmt->bind_param("sisis", $this->name, $this->price, $this->description, $this->category_id, $this->timestamp);
    
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>