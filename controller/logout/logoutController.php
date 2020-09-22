<?php 
$tmp = new Template('Logout de Usuarios');


// CSS
$tmp->listCss = [
    'axios.min.css',
];

// Javascript
$tmp->listJs = [
    'staticfiles/node_modules/axios/dist/axios.min.js',
];


$msg = "Me despido, estas cerrando session, hasta la próxima.";




include 'view/logout/logoutView.phtml';
?>