<?php 
include 'model/Link.php';


Link::autoload();

$peticion = new Request();

Link::mvc();

?>