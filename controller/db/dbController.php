<?php 

// Insertar un elemento en un producto


// Vista postgres 

// Products All <-- Nombre
// query:
// select p.id,p.name,p.description,c.name as category_ from product p inner join category c on p.categoy = c.id

$sql = "select * from products_all ";
$rows = Database::simpleQuery($sql);

echo json_encode($rows);

?>