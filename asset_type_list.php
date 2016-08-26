<?php
// set page headers
$page_title = "Read Asset Types";
include_once "header.php";
?>

<?php

echo "<div class='right-button-margin'>";
    echo "<a href='asset_type_create.php' class='btn btn-default pull-right'>Create Asset Type</a>";
echo "</div>";

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

// include database and object files
include_once 'cfg/database.php';
include_once 'obj/asset_types.php';

// instantiate database and asset_type object
$database = new Database('RBPortalDB');
$db = $database->getConnection();

$asset_type = new Asset_Type($db);

// query asset_types
$stmt = $asset_type->readAll($page, $from_record_num, $records_per_page);
$num = $stmt->rowCount();

// display the asset_types if there are any
if($num>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Asset Type</th>";
            echo "<th>Description</th>";
            echo "<th>Actions</th>";
        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";

                echo "<td>";
                    echo "<a href='asset_type_update.php?id={$id_asset_type}' class='btn btn-default left-margin'>Edit</a>";
                    echo "<a delete-id='{$id_asset_type}' class='btn btn-default delete-object'>Delete</a>";
                echo "</td>";

            echo "</tr>";
        }

    echo "</table>";

    include_once 'asset_type_paging.php';
}

// tell the user there are no asset types
else{
    echo "<div>'{$num}' asset types found.</div>";
}

?>


<script>
$(document).on('click', '.delete-object', function(){

    var id = $(this).attr('delete-id');
    var q = confirm("Are you sure?");

    if (q == true){

        $.post('asset_type_delete.php', {
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

