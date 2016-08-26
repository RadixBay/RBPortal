<?php
// set page headers
$page_title = "Update Metric Type";
include_once "header.php";
?>

<?php
echo "<div class='right-button-margin'>";
    echo "<a href='metric_type_list.php' class='btn btn-default pull-right'>Read Metric Types</a>";
echo "</div>";

// get ID of the object to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'cfg/database.php';
include_once 'obj/metric_types.php';
 
// get database connection
$database = new Database('RBPortalDB');
$db = $database->getConnection();
 
// prepare the object
$metric_type = new Metric_Type($db);
 
// set ID property of the object to be edited
$metric_type->id = $id;
 
// read the details of the object to be edited
$metric_type->readOne();

// if the form was submitted
if($_POST){
 
    // set object property values
    $metric_type->name = $_POST['name'];
    $metric_type->description = $_POST['description'];
 
    // update the object
    if($metric_type->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Metric Type was updated.";
        echo "</div>";
    }
 
    // if unable to update the object, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to update Metric Type.";
        echo "</div>";
    }
}
?>

<form action='metric_type_update.php?id=<?php echo $id; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>ID</td>
            <td><input type='text' name='name' value='<?php echo $metric_type->id; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $metric_type->name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $metric_type->description; ?></textarea></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
include_once "footer.php";
?>

