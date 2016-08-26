<?php
    // check if value was posted
    if($_POST){
     
        // include database and object files
        include_once 'cfg/database.php';
        include_once 'obj/metric_types.php';
     
        // get database connection
        $database = new Database('RBPortalDB');
        $db = $database->getConnection();
     
        // prepare the object
        $metric_type = new Metric_Type($db);
          
        // set metric type id to be deleted
        $metric_type->id = $_POST['object_id'];
         
        // delete the metric type
        if($metric_type->delete()){
            echo "Metric Type was deleted.";
        }
         
        // if unable to delete the metric type
        else{
            echo "Unable to delete Metric Type.";
             
        }
    }
?>

