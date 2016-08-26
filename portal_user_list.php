<?php
// set page headers
$page_title = "Read Portal Users";
include_once "header.php";
?>

<?php

echo "<div class='right-button-margin'>";
    echo "<a href='portal_user_create.php' class='btn btn-default pull-right'>Create Portal User</a>";
echo "</div>";

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'cfg/database.php';
include_once 'obj/portal_users.php';

// instantiate database and portal_user object
$database = new Database('RBPortalDB');
$db = $database->getConnection();

$portal_user = new Portal_User($db);

// query portal_users
$stmt = $portal_user->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();

// display the portal_users if there are any
if($num>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Full Name</th>";
            echo "<th>UserID</th>";
            echo "<th>Password</th>";
            echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
                echo "<td>{$full_name}</td>";
                echo "<td>{$userid}</td>";
                echo "<td>{$passwd}</td>";

                echo "<td>";
                    echo "<a href='portal_user_update.php?id={$id_portal_user}' class='btn btn-default left-margin'>Edit</a>";
                    echo "<a delete-id='{$id_portal_user}' class='btn btn-default delete-object'>Delete</a>";
                echo "</td>";

            echo "</tr>";
        }

    echo "</table>";

    include_once 'portal_user_paging.php';
}

// tell the user there are no portal users
else{
    echo "<div>'{$num}' portal users found.</div>";
}

?>


<script>
$(document).on('click', '.delete-object', function(){

    var id = $(this).attr('delete-id');
    var q = confirm("Are you sure?");

    if (q == true){

        $.post('portal_user_delete.php', {
            object_id: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Unable to delete.');
        });

    }

    return false;
});
</script>

<?php
include_once "footer.php";
?>

