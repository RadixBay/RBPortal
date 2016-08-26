<?php
// set page headers
$page_title = "Update Asset Type";
include_once "header.php";
?>

<?php
echo "<div class='right-button-margin'>";
    echo "<a href='asset_type_list.php' class='btn btn-default pull-right'>Read Asset Types</a>";
echo "</div>";

// get ID of the object to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'cfg/database.php';
include_once 'obj/asset_types.php';
 
// get database connection
$database = new Database('RBPortalDB');
$db = $database->getConnection();
 
// prepare the object
$asset_type = new Asset_Type($db);
 
// set ID property of the object to be edited
$asset_type->id = $id;
 
// read the details of the object to be edited
$asset_type->readOne();

// if the form was submitted
if($_POST){
 
    // set object property values
    $asset_type->name = $_POST['name'];
    $asset_type->description = $_POST['description'];
 
    // update the object
    if($asset_type->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Asset Type was updated.";
        echo "</div>";
    }
 
    // if unable to update the object, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to update Asset Type.";
        echo "</div>";
    }
}
?>

<form action='asset_type_update.php?id=<?php echo $id; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>ID</td>
            <td><input type='text' name='name' value='<?php echo $asset_type->id; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $asset_type->name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $asset_type->description; ?></textarea></td>
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

