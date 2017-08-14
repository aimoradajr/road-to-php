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
        public $image;
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
            $this->image=htmlspecialchars(strip_tags($this->image));
            $this->timestamp = date('Y-m-d H:i:s');

            //write query
            $query = "INSERT INTO
                        " . $this->table_name . "
                    SET
                        name=?, price=?, description=?, category_id=?, image=?, created=?";
    
            $stmt = $this->dbconn->prepare($query);
            $stmt->bind_param("sisiss", $this->name, $this->price, $this->description, $this->category_id, $this->image, $this->timestamp);
    
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function readPart($start_offset,$row_num){
            $query = "select id,name,description,price,category_id,image from ".$this->table_name." order by name asc
                limit $start_offset, $row_num";

            $res = $this->dbconn->query($query);

            return $res;
        }

        public function readOne()
        {
            $query = "select id,name,description,price,category_id,image from ".$this->table_name." where id={$this->id}";

            $res = $this->dbconn->query($query);

            $row = $res->fetch_assoc();
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->category_id = $row['category_id'];
            $this->image = $row['image'];
        }

        public function totalRows() {
            $res = $this->dbconn->query("select id from {$this->table_name}");
            return $res->num_rows;
        }

        public function update()
        {
            if($this->image)
            {
                $prep_stmt = $this->dbconn->prepare("UPDATE {$this->table_name} SET name=?, description=?, price=?,image=?,category_id=? WHERE id=?");
                $prep_stmt->bind_param("ssisii",$this->name,$this->description,$this->price,$this->image,$this->category_id,$this->id);
            }
            else
            {
                $prep_stmt = $this->dbconn->prepare("UPDATE {$this->table_name} SET name=?, description=?, price=?,category_id=? WHERE id=?");
                $prep_stmt->bind_param("ssiii",$this->name,$this->description,$this->price,$this->category_id,$this->id);
            }

            //return $this->dbconn->query($query);
            return $prep_stmt->execute();
        }

        public function delete(){
            return $this->dbconn->query("delete from {$this->table_name} where id={$this->id}");
        }

        // read products by search term
        public function search($search_term, $from_record_num, $records_per_page){
        
            // select query
            $query = "SELECT
                        c.name as category_name, p.id, p.name, p.description, p.price, p.image, p.category_id, p.created
                    FROM
                        " . $this->table_name . " p
                        LEFT JOIN
                            categories c
                                ON p.category_id = c.id
                    WHERE
                        p.name LIKE '%{$search_term}%' OR p.description LIKE '%{$search_term}%'
                    ORDER BY
                        p.name ASC
                    LIMIT
                        $from_record_num, $records_per_page";
        
            return  $this->dbconn->query( $query );
        }
        
        public function uploadPhoto(){
            $result_message = "";

            if($this->image){
                $target_dir = "uploads/";
                $target_file = $target_dir . $this->image;
                $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

                $file_upload_error_messages = "";
                
                // verify image from $_FILES
                $check = getimagesize($_FILES['image']['tmp_name']);
                if($check===false){
                    $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
                }

                // limit file type
                $allowed_file_types=array("jpg","jpeg","png","gif");
                if(!in_array($file_type,$allowed_file_types))
                    $file_upload_error_messages.="<div>Image types allowed 'jpg', 'jpeg', 'png', 'gif'</div>";

                // file does not exists already?
                if(file_exists($target_file))
                    $file_upload_error_messages.="<div>Image already exists.</div>";

                // file too large?
                if($_FILES['image']['size'] > 1024000)
                    $file_upload_error_messages.="<div>Image too big. Must be 1MB less</div>";

                // uploads folder exists
                if(!is_dir($target_dir))
                    mkdir($target_dir,0777, true);

                // now try n upload beybe
                if(empty($file_upload_error_messages))
                {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
                    {
                        // yey. photo upload. Which really means that the previously upload file was moved from the temporary path to the uploads folder path
                        $result_message = 'Photo upload.';
                    }
                    else{
                        $result_message.="<div class='alert alert-danger'>";
                            $result_message.="<div>Unable to upload photo.</div>";
                            $result_message.="<div>Update the record to upload photo.</div>";
                            $result_message.="<div>I dunno what happened but something went wrong.</div>";
                        $result_message.="</div>";
                    }
                }
                else
                {
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="{$file_upload_error_messages}";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }

            return $result_message;
        }
        
        public function countAll_BySearch($search_term){
        
            // select query
            $query = "SELECT
                        COUNT(*) as total_rows
                    FROM
                        " . $this->table_name . " p
                        LEFT JOIN
                            categories c
                                ON p.category_id = c.id
                    WHERE
                        p.name LIKE '%$search_term%'";
        
            $ret = $this->dbconn->query( $query );
        
            $row = $ret->fetch_assoc();
        
            return $row['total_rows'];
        }
    }
?>