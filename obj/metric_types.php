<?php
class Metric_Type{

    // database connection and table name
    private $conn;
    private $table_name = "metric_types";

    // object properties
    public $id;
    public $name;
    public $description;

    public function __construct($db){
        $this->conn = $db;
    }

    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    id_metric_type, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

    // used to read an metric type record by its ID
    function readOne(){


        $query = "SELECT name, description FROM " . $this->table_name . " WHERE id_metric_type = :MetricTypeID limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(':MetricTypeID', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->description = $row['description'];
    }
}
?>

