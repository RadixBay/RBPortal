class AssetTypes{

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

    // used get all records
    function readAll(){
        //select all data
        $query = "SELECT
                    id_asset_type, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used to read name by its ID
    function readOne(){

        $query = "SELECT name, description FROM " . $this->table_name . " WHERE id_asset_type = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
    }

}
?>


