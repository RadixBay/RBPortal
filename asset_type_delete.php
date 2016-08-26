<?php
    // check if value was posted
    if($_POST){
     
        // include database and object files
        include_once 'cfg/database.php';
        include_once 'obj/asset_types.php';
     
        // get database connection
        $database = new Database('RBPortalDB');
        $db = $database->getConnection();
     
        // prepare the object
        $asset_type = new Asset_Type($db);
          
        // set asset type id to be deleted
        $asset_type->id = $_POST['object_id'];
         
        // delete the asset type
        if($asset_type->delete()){
            echo "Asset Type was deleted.";
        }
         
        // if unable to delete the asset type
        else{
            echo "Unable to delete Asset Type.";
             
        }
    }
?>

