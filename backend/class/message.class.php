<?php
    class Message{

        // conn
        private $conn;

        // table
        private $dbTable = "messages";

        // col
        public $id;
        public $user_id;
        public $user_profile;
        public $message;
        public $message_created;
      
        // db conn
        public function __construct($db){
            $this->conn = $db;
        }

        // GET Messages
        public function getMessages(){
            $sqlQuery = "SELECT *
               FROM " . $this->dbTable . "
                WHERE 
                   user_id = :user_id";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();
            return $stmt;
        }

        // INSERT Message
        public function sendMessage(){
            $sqlQuery = "INSERT INTO
                        ". $this->dbTable ."
                    SET
                    user_id = :user_id, 
                    user_profile = :user_profile, 
                    message = :user_message,
                    message_created = now()";
            
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->user_id=htmlspecialchars(strip_tags($this->user_id));
            $this->user_profile=htmlspecialchars(strip_tags($this->user_profile));
            $this->user_message=htmlspecialchars(strip_tags($this->user_message));
                   
            // bind data
            $stmt->bindParam(":user_id", $this->user_id);
            $stmt->bindParam(":user_profile", $this->user_profile);
            $stmt->bindParam(":user_message", $this->user_message);
            $stmt->execute();
        }
    }
?>