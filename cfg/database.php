<?php
class Database{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "RBPortalDB";
    private $username = "root";
    private $password = "R@d1xB@y";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
