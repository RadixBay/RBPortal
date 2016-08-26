<?php
class Portal_User{

    // database connection and table name
    private $conn;
    private $table_name = "portal_users";

    // object properties
    public $id;
    public $userid;
    public $passwd;
    public $full_name;

    public function __construct($db){
        $this->conn = $db;
    }

    // user for paging portal_users
    public function countAll(){
 
        $query = "SELECT id_portal_user FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
        return $num;
    }

    // used by select drop-down list
    function readAll($page, $from_record_num, $records_per_page){
        //select all data
        $query = "SELECT
                    id_portal_user, userid, passwd, full_name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    userid
                LIMIT 
                    {$from_record_num}, {$records_per_page}";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used to read an portal user record by its ID
    function readOne(){


        $query = "SELECT userid, passwd, full_name FROM " . $this->table_name . " WHERE id_portal_user = :PortalUserID limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(':PortalUserID', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->userid = $row['userid'];
        $this->passwd = $row['passwd'];
        $this->full_name = $row['full_name'];
    }

    // create Portal_User
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    userid = :userid, passwd = :passwd, full_name = :full_name";

        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->userid=htmlspecialchars(strip_tags($this->userid));
        $this->passwd=htmlspecialchars(strip_tags($this->passwd));
        $this->full_name=htmlspecialchars(strip_tags($this->full_name));
 
        // bind values
        $stmt->bindParam(':userid', $this->userid);
        $stmt->bindParam(':passwd', $this->passwd);
        $stmt->bindParam(':full_name', $this->full_name);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    // update Portal_User
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    userid = :userid,
                    passwd = :passwd,
                    full_name = :full_name
                WHERE
                    id_portal_user = :id";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->userid=htmlspecialchars(strip_tags($this->userid));
        $this->passwd=htmlspecialchars(strip_tags($this->passwd));
        $this->full_name=htmlspecialchars(strip_tags($this->full_name));
        $this->id=htmlspecialchars(strip_tags($this->id));
 
        // bind parameters
        $stmt->bindParam(':userid', $this->userid);
        $stmt->bindParam(':passwd', $this->passwd);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':id', $this->id);
 
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // delete the Portal_User
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE id_portal_user = :id";
         
echo $query;
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
     
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

}
?>

