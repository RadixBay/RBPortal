<?php
$page_title = "Metric Type List";
include_once "header.php";

// include database and object files
include_once 'cfg/database.php';
include_once 'obj/metric_types.php';

// instantiate database and product object
$database = new Database('RBPortalDB');
$db = $database->getConnection();

$metric_type = new Metric_Type($db);

// query categories
$stmt = $metric_type->read();

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
           echo "<th>Description</th>";

        echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            echo "<tr>";
               echo "<td>{$id_metric_type}</td>";
               echo "<td>{$name}</td>";
               echo "<td>{$description}</td>";
            echo "</tr>";

       }

    echo "</table>";

include_once "footer.php";
?>

