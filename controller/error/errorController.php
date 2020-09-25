<?php 

$tmp = new Template('Error');
$tmp->listJs = [
    'staticfiles/scripts/class.js',
];
$msg = "ERROR 404 <br> PÁGINA NO ENCONTRADA.";


include 'view/error/errorView.phtml';

?>