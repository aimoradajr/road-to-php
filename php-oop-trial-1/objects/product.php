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

        public function readPart($start_offset,$row_num){
            $query = "select id,name,description,price,category_id from ".$this->table_name." order by name asc
                limit $start_offset, $row_num";

            $res = $this->dbconn->query($query);

            return $res;
        }

        public function readOne()
        {
            $query = "select id,name,description,price,category_id from ".$this->table_name." where id={$this->id}";

            $res = $this->dbconn->query($query);

            $row = $res->fetch_assoc();
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->category_id = $row['category_id'];
        }

        public function totalRows() {
            $res = $this->dbconn->query("select id from {$this->table_name}");
            return $res->num_rows;
        }

        public function update()
        {
            $query = "update {$this->table_name} set 
                name='{$this->name}',
                description='{$this->description}',
                price={$this->price},
                category_id={$this->category_id} 
                where id={$this->id}";

                echo '<br/>';
            echo $query;
            echo '<br/>';

            return $this->dbconn->query($query);
        }

        public function delete(){
            return $this->dbconn->query("delete from {$this->table_name} where id={$this->id}");
        }
    }
?>