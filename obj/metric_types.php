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

    // user for paging metric_types
    public function countAll(){
 
        $query = "SELECT id_metric_type FROM " . $this->table_name . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
        return $num;
    }

    // used by select drop-down list
    function readAll($page, $from_record_num, $records_per_page){
        //select all data
        $query = "SELECT
                    id_metric_type, name, description
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

    // create Metric_Type
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

    // update Metric_Type
    function update(){
 
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    description = :description
                WHERE
                    id_metric_type = :id";
 
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

    // delete the Metric_Type
    function delete(){
     
        $query = "DELETE FROM " . $this->table_name . " WHERE id_metric_type = :id";
         
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

