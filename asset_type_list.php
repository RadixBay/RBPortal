<?php
$page_title = "Asset Type List";
include_once "header.php";

// include database and object files
include_once 'cfg/database.php';
include_once 'obj/asset_types.php';

// instantiate database and product object
$database = new Database('RBPortalDB');
$db = $database->getConnection();

$asset_type = new Asset_Type($db);

// query categories
$stmt = $asset_type->read();

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
           echo "<th>Description</th>";

        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
               echo "<td>{$id_asset_type}</td>";
               echo "<td>{$name}</td>";
               echo "<td>{$description}</td>";
            echo "</tr>";

       }

    echo "</table>";

include_once "footer.php";
?>

