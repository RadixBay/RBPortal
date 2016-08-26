<?php
// set page headers
$page_title = "Create Portal Users";
include_once "header.php";
?>

<?php
echo "<div class='right-button-margin'>";
    echo "<a href='portal_user_list.php' class='btn btn-default pull-right'>Read Portal Users</a>";
echo "</div>";

// include database files
include_once 'cfg/database.php';
 
// get database connection
$database = new Database('RBPortalDB');
$db = $database->getConnection();
 

// if the form was submitted
if($_POST){
 
    // instantiate object
    include_once 'obj/portal_users.php';
    $portal_user = new Portal_User($db);
 
    // set object property values
    $portal_user->full_name = $_POST['full_name'];
    $portal_user->userid = $_POST['userid'];
    $portal_user->passwd = $_POST['passwd'];
 
    // create the object
    if($portal_user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Portal User was created.";
        echo "</div>";
    }
 
    // if unable to create the object, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to create Portal User.";
        echo "</div>";
    }
}
?>

<!-- HTML form for creating an object -->
<form action='portal_user_create.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Full Name</td>
            <td><input type='text' name='full_name' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>UserID</td>
            <td><input type='text' name='userid' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Password</td>
            <td><input type='text' name='passwd' class='form-control' /></td>
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

