<?php 
$tmp = new Template('Login de Usuarios');

$persona = new Persona('Argenis','Vargas', 34);

// Javascript

$tmp->listJs = [
    'staticfiles/node_modules/axios/dist/axios.min.js',
    'staticfiles/scripts/class.js',
    'staticfiles/scripts/login.js',
];


$msg = "Para Iniciar sesión debes suministrarnos tus datos";




include 'view/login/loginView.phtml';
?>