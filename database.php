<?php 
    class database{
        private $hostname;
        private $username;
        private $password;
        private $db ;

        protected function connect(){
            $this->hostname = "localhost";
            $this->username = "shahbaj";
            $this->password = "password";
            $this->db = "husenDB";

        $conn = new mysqli($this->hostname,$this->username,$this->password,$this->db);
        return $conn;
        }
    }
   
    class query extends database{
        //SELECT OPERATIONS START
        public function getdata($table,$field='*',$condition='',$order_by_field='',$order_by_type='ASC',$limit=''){
            $sql = "select $field from $table ";
            
            if($condition != ''){
                $sql.= " where " ;
                $arlen = count($condition);
                $i=1;
                foreach($condition as $key=>$value){
                    if($i==$arlen){
                        $sql.= "$key='$value'";
                        
                    }
                    else{
                        $sql.= "$key='$value' and ";
                    }
                    $i++;
                }
                
            }

            if($order_by_field != ''){
                $sql.=" ORDER BY $order_by_field $order_by_type";
            }

            if($limit != ''){
                $sql.=" LIMIT $limit ";
            }
            // die($sql);
            $result = $this->connect()->query($sql);
            
            if($result->num_rows > 0){
                $arr = array();
                while($row=$result->fetch_assoc()){
                    $arr[] = $row;
                }
                return $arr;
            }
            else{
                return 0;
            }
        }
        /*
        SELECT $field FROM $table WHERE $condition LIKE $like $order_by_field $order_by_type LIMIT $limit;
        */
        //SELECT OPERATIONS END

        //INSERT OPERATIONS START
        public function insertdata($table,$condition=''){
            if($condition != ''){
                
                foreach($condition as $key=>$value){
                    $fieldArr[] = $key;
                    $valueArr[] = $value;
                    
                }
                $field = implode(",",$fieldArr);
                $value = implode("','",$valueArr);
                $value = "'".$value."'";
                // echo $value;
                // die();
                $sql = "INSERT INTO $table($field) VALUES($value) ";
                // die($sql);
                $result = $this->connect()->query($sql);
            }

            // echo $sql;
        }
        //INSERT OPERATIONS END

        //DELETE OPERATIONS START
        public function deleteData($table,$condition=''){
            if($condition != ''){
                $sql = "DELETE FROM $table WHERE ";
                $arlen = count($condition);
                $i=1;
                foreach($condition as $key=>$value){
                    if($i==$arlen){
                        $sql.= "$key='$value'";
                        
                    }
                    else{
                        $sql.= "$key='$value' and ";
                    }
                    $i++;
                    
                }
                
                // die($sql);
                $result = $this->connect()->query($sql);
            }

            // echo $sql;
        }
        //DELETE OPERATIONS END

         //UPDATE OPERATIONS START
         public function updateData($table,$condition,$where_field,$where_value){
            if($condition != ''){
                $sql = "UPDATE $table SET ";
                $arlen = count($condition);
                $i=1;
                foreach($condition as $key=>$value){
                    if($i==$arlen){
                        $sql.= "$key='$value'";
                        
                    }
                    else{
                        $sql.= "$key='$value', ";
                    }
                    $i++;
                    
                }
                $sql.=" WHERE $where_field = '$where_value' ";
                // die($sql);
                $result = $this->connect()->query($sql);
            }

            // echo $sql;
        }
        //UPDATE OPERATIONS END
    }
?>