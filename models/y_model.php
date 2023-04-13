<?php

    class ps_model{

        private $dns;
        private $dbUser;
        private $dbPass;
        private $condb;

        function __construct(object $conf){
            $this->dns = $conf->dns;
            $this->dbUser = $conf->dbUser;
            $this->dbPass = $conf->dbPass;
            $this->connect();
        }

        public function connect(){
            try{
                $this->condb = new PDO($this->dns,$this->dbUser,$this->dbPass);
                // echo "connected to database successfully!";
            }catch(PDOException $err){
                echo "Have an error about : " . $err->getMessage();
                echo "<br>Error in line : " . $err->getLine();
            }
        }

        public function getAllproducts(){
            $sql = "SELECT * FROM `Age`";
            $query = $this->condb->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function getphoneDetail($product_id){
            $sql = "SELECT * FROM `phone_tb` WHERE `product_id` = :product_id";
            $query = $this->condb->prepare($sql);
            $query->bindParam(':product_id',$product_id,PDO::PARAM_INT);
            if($query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }
        public function search_keyword($keyword){
            $sql = "SELECT * FROM `Age` WHERE `name` LIKE '%$keyword%' ";
            $query = $this->condb->prepare($sql);
            if($query->execute()){
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }

        public function addStudent($brith_day,$age,){
            $sql = "INSERT INTO `Age` ( `brith_day`, `age`) VALUES (:name, :Age, :brith_day, :age, );";
            $query = $this->condb->prepare($sql);
            $query->bindParam(':brith_day',$brith_day);
            $query->bindParam(':age',$age);
            if($query->execute()){
                return true;
            }else {
                return false;
            }
        }

        

        public function deleteStudent($Age){
           $sql = "DELETE FROM Age WHERE Age = :Age";
           $query = $this->condb->prepare($sql);
           $query->bindParam(':Age',$Age);
           try{
            $query->execute();
            return true;
           }catch(Exception $err){
            return false;
           }
        }
        

        public function editStudent($name,$Age,$major,$number_id,$brith_day,$age,$img){
            $sql = "UPDATE `student_tb` SET `name` = :name, `brith_day` = :brith_day, `age` = :age,;";
            $query = $this->condb->prepare($sql);
            $query->bindParam(':brith_day',$brith_day);
            $query->bindParam(':age',$age);
          
            if($query->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function getDetail($Age){
            $sql = "SELECT * FROM `Age` WHERE `Age` = :Age";
            $query = $this->condb->prepare($sql);
            $query->bindParam(':Age',$Age,PDO::PARAM_INT);
            if($query->execute()){
                $result = $query->fetch(PDO::FETCH_ASSOC);
                return $result;
                return true;
            }else {
                return false;
            }
        }


    }

?>