<?php
    // check if value was posted
    if($_POST){
     
        // include database and object files
        include_once 'cfg/database.php';
        include_once 'obj/portal_users.php';
     
        // get database connection
        $database = new Database('RBPortalDB');
        $db = $database->getConnection();
     
        // prepare the object
        $portal_user = new Portal_User($db);
          
        // set asset type id to be deleted
        $portal_user->id = $_POST['object_id'];
         
        // delete the asset type
        if($portal_user->delete()){
            echo "Portal User was deleted.";
        }
         
        // if unable to delete the asset type
        else{
            echo "Unable to delete Portal User.";
             
        }
    }
?>

