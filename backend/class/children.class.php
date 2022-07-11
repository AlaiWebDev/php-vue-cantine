<?php
    class Children{

        // conn
        private $conn;

        // table
        private $dbTable = "children";

        // col
        public $id;
        public $parent_id;
        public $child_firstname;
        public $child_birthdate;
        public $child_scheme;
        public $child_allergies;
        public $approved;
        public $registered_at;
        public $unsuscribed_at;
        
        // db conn
        public function __construct($db){
            $this->conn = $db;
        }

        // GET Messages
        public function getChildren(){
            $sqlQuery = "SELECT *
                FROM " . $this->dbTable . "
                WHERE 
                parent_id = :parent_id AND approved <> 0";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(':parent_id', $this->parent_id);
            $stmt->execute();
            return $stmt;
        }

    }
?>