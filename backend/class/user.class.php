<?php
    class User{

        // conn
        private $conn;

        // table
        private $dbTable = "users";

        // col
        public $id;
        public $user_name;
        public $user_email;
        public $user_phone;
        public $user_password;
        public $user_street;
        public $user_city;
        public $user_zipcode;
        public $user_profile;
        public $created_at;
        public $deleted_at;
      
        // db conn
        public function __construct($db){
            $this->conn = $db;
        }

        // GET Users
        public function getUsers(){
            $sqlQuery = "SELECT *
               FROM " . $this->dbTable . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE User
        public function createUser(){
            $sqlQuery = "INSERT INTO
                        ". $this->dbTable ."
                    SET
                    user_name = :user_name, 
                    user_email = :user_email, 
                    user_phone = :user_phone,
                    user_password = :user_password,
                    user_street = :user_street,
                    user_city = :user_city,
                    user_zipcode = :user_zipcode,
                    user_profile = :user_profile,
                    created_at = now()";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->user_name=htmlspecialchars(strip_tags($this->user_name));
            $this->user_email=htmlspecialchars(strip_tags($this->user_email));
            $this->user_phone=htmlspecialchars(strip_tags($this->user_phone));
            $this->user_password=htmlspecialchars(strip_tags($this->user_password));
            $this->user_street=htmlspecialchars(strip_tags($this->user_street));
            $this->user_city=htmlspecialchars(strip_tags($this->user_city));
            $this->user_zipcode=htmlspecialchars(strip_tags($this->user_zipcode));
            $this->user_profile=htmlspecialchars(strip_tags($this->user_profile));
                   
            // bind data
            $stmt->bindParam(":user_name", $this->user_name);
            $stmt->bindParam(":user_email", $this->user_email);
            $stmt->bindParam(":user_phone", $this->user_phone);
            $stmt->bindParam(":user_password", $this->user_password);
            $stmt->bindParam(":user_street", $this->user_street);
            $stmt->bindParam(":user_city", $this->user_city);
            $stmt->bindParam(":user_zipcode", $this->user_zipcode);
            $stmt->bindParam(":user_profile", $this->user_profile);
           
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

       // GET User
       public function getSingleUser(){
        $sqlQuery = "SELECT
                    *
                  FROM
                    ". $this->dbTable ."
                WHERE 
                   user_email = :user_email";

        $stmt = $this->conn->prepare($sqlQuery);
        
        $stmt->bindParam(':user_email', $this->user_email);
        // $encrypted_password = password_hash($this->user_password, PASSWORD_DEFAULT);
        // $stmt->bindParam(':user_password', $this->user_password);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->user_name = $dataRow['user_name'];
        $this->user_email = $dataRow['user_email'];
        $this->user_phone = $dataRow['user_phone'];
        $this->user_password = $dataRow['user_password'];
        $this->user_street = $dataRow['user_street'];
        $this->user_city = $dataRow['user_city'];
        $this->user_zipcode = $dataRow['user_zipcode'];
        $this->user_profile = $dataRow['user_profile'];
        $this->created_at = $dataRow['created_at'];
        $this->deleted_at = $dataRow['deleted_at'];
    }      
        

        // UPDATE User
        public function updateUser(){
            $sqlQuery = "UPDATE
                        ". $this->dbTable ."
                    SET
                    user_name = :user_name, 
                    user_email = :user_email, 
                    user_phone = :user_phone,
                    user_password = :user_password,
                    user_street = :user_street,
                    user_city = :user_city,
                    user_zipcode = :user_zipcode,
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->user_name=htmlspecialchars(strip_tags($this->user_name));
            $this->user_email=htmlspecialchars(strip_tags($this->user_email));
            $this->user_phone=htmlspecialchars(strip_tags($this->user_phone));
            $this->user_password=htmlspecialchars(strip_tags($this->user_password));
            $this->user_street=htmlspecialchars(strip_tags($this->user_street));
            $this->user_city=htmlspecialchars(strip_tags($this->user_city));
            $this->user_zipcode=htmlspecialchars(strip_tags($this->user_zipcode));
            $this->user_profile=htmlspecialchars(strip_tags($this->user_profile));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":user_name", $this->user_name);
            $stmt->bindParam(":user_email", $this->user_email);
            $stmt->bindParam(":user_phone", $this->user_phone);
            $stmt->bindParam(":user_password", $this->user_password);
            $stmt->bindParam(":user_street", $this->user_street);
            $stmt->bindParam(":user_city", $this->user_city);
            $stmt->bindParam(":user_zipcode", $this->user_zipcode);
            $stmt->bindParam(":user_profile", $this->user_profile);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE User
        function deleteUser(){
            $sqlQuery = "UPDATE
            ". $this->dbTable . "SET user_deleted_at = :deleted_at WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            
            $this->id=htmlspecialchars(strip_tags($this->id));
            $this->deleted_at = date('Y-m-d H:i:s');
        
            $stmt->bindParam(1, $this->id);
            $stmt->bindParam($this->deleted_at);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        // public function changeUserPassword(){
        //     return $this->user_password; 
        // }

    }
?>