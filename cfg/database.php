<?php
class Database{

    // specify your database credentials in cfg/db.ini

    public $conn;
    private $username;
    private $password;

    public function __construct($DBName)
    {
        $result = parse_ini_file('db.ini',true);
        $dsn = $result[$DBName]['dsn'];
        $username = $result[$DBName]['username'];
        $password = $result[$DBName]['password'];
        $this->conn = null;

        try{
            $this->conn = new PDO($dsn, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public function __destruct()
    {
        $dsn = "";
        unset($this->conn);
    }

    // get the database connection
    public function getConnection(){

        return $this->conn;
    }

    // close the database connection
    public function closeConnection(){

        $this->conn - null;
        return $this->conn;
    }

}
?>
