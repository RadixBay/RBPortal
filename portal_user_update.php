<?php
// set page headers
$page_title = "Update Portal User";
include_once "header.php";
?>

<?php
echo "<div class='right-button-margin'>";
    echo "<a href='portal_user_list.php' class='btn btn-default pull-right'>Read Portal Users</a>";
echo "</div>";

// get ID of the object to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'cfg/database.php';
include_once 'obj/portal_users.php';
 
// get database connection
$database = new Database('RBPortalDB');
$db = $database->getConnection();
 
// prepare the object
$portal_user = new Portal_User($db);
 
// set ID property of the object to be edited
$portal_user->id = $id;
 
// read the details of the object to be edited
$portal_user->readOne();

// if the form was submitted
if($_POST){
 
    // set object property values
    $portal_user->userid = $_POST['userid'];
    $portal_user->passwd = $_POST['passwd'];
    $portal_user->full_name = $_POST['full_name'];

 
    // update the object
    if($portal_user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Portal User was updated.";
        echo "</div>";
    }
 
    // if unable to update the object, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to update Portal User.";
        echo "</div>";
    }
}
?>

<form action='portal_user_update.php?id=<?php echo $id; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>ID</td>
            <td><input type='text' name='id_portal_user' value='<?php echo $portal_user->id; ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Full Name</td>
            <td><input type='text' name='full_name' value='<?php echo $portal_user->full_name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>UserID</td>
            <td><input type='text' name='userid' value='<?php echo $portal_user->userid; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='text' name='passwd' value='<?php echo $portal_user->passwd; ?>' class='form-control' /></td>
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

