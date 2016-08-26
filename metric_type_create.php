<?php
// set page headers
$page_title = "Create Metric Type";
include_once "header.php";
?>

<?php
echo "<div class='right-button-margin'>";
    echo "<a href='metric_type_list.php' class='btn btn-default pull-right'>Read Metric Types</a>";
echo "</div>";

// include database files
include_once 'cfg/database.php';
 
// get database connection
$database = new Database('RBPortalDB');
$db = $database->getConnection();
 

// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // instantiate object
    include_once 'obj/metric_types.php';
    $metric_type = new Metric_Type($db);
 
    // set object property values
    $metric_type->name = $_POST['name'];
    $metric_type->description = $_POST['description'];
 
    // create the object
    if($metric_type->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Metric Type was created.";
        echo "</div>";
    }
 
    // if unable to create the object, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to create Metric Type.";
        echo "</div>";
    }
}
?>

<!-- HTML form for creating an object -->
<form action='metric_type_create.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
include_once "footer.php";
?>

