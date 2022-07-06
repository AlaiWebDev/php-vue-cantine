<?php 
    class DB {
        private $host = "localhost";
        private $db = "cantine";
        private $username = "alain";
        private $password = "Mapics1971*";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host .
                 ";dbname=" . $this->db, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                echo "<p>Database connected</p>";
            }catch(PDOException $exception){
                echo "<p>Database not connected: " . $exception->getMessage() . "</p>";
            }
            return $this->conn;
        }
    }  
?>