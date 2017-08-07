<?php
    class Category {
        // db conn
        private $dbconn;
        private $table_name = 'categories';

        private $id;
        private $name;
        
        public function __construct($dbconn){
            $this->dbconn = $dbconn;
        }

        public function read() // using this to get all categories
        {
            $res = $this->dbconn->query("select * from $this->table_name");

            return $res;
        }

        public function readName()
        {
            // use this to set name of cat
            $res = $this->dbconn->query("select name from $this->table_name where id=$this->id");
            $row = $res->fetch_assoc();

            $this->name = $row['name'];
        }
    }
?>