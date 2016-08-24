<?php
class Asset{

    // database connection and table name
    private $conn;
    private $table_name = "assets";

    // object properties
    public $id;
    public $asset_type_id;
    public $name;
    public $description;

    public function __construct($db){
        $this->conn = $db;
    }

    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    id_asset, id_asset_type, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used to read an asset record by its ID
    function readOne(){


        $query = "SELECT name, description FROM " . $this->table_name . " WHERE id_asset = :AssetID limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(':AssetID', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
    }
}
?>

