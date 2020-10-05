<?php 
// Vista postgres 
$sql = "select * from products_all ";
$rows = Database::simpleQuery($sql);

echo json_encode($rows);

?>