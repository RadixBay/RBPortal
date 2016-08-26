<?php
class Asset_Type{

    // database connection and table name
    private $conn;
    private $table_name = "asset_types";

    // object properties
    public $id;
    public $name;
    public $description;

    public function __construct($db){
        $this->conn = $db;
    }

    // user for paging asset_types
    public function countAll(){
 
        $query = "SELECT id_asset_type FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
        return $num;
    }

    // used by select drop-down list
    function readAll($page, $from_record_num, $records_per_page){
        //select all data
        $query = "SELECT
                    id_asset_type, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name
                LIMIT 
                    {$from_record_num}, {$records_per_page}";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used to read an asset type record by its ID
    function readOne(){


        $query = "SELECT name, description FROM " . $this->table_name . " WHERE id_asset_type = :AssetTypeID limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(':AssetTypeID', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
    }

    // create Asset_Type
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = :name, description = :description";

        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
 
        // bind values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }

    // update Asset_Type
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    description = :description
                WHERE
                    id_asset_type = :id";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->id=htmlspecialchars(strip_tags($this->id));
 
        // bind parameters
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);
 
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // delete the Asset_Type
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE id_asset_type = :id";
         
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

