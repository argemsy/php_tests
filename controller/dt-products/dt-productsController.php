<?php 
$tmp = new Template('Base de Datos');
$tmp->listJs = [
    'staticfiles/node_modules/datatables/media/js/jquery.dataTables.min.js',
    'staticfiles/node_modules/sweetalert/dist/sweetalert.min.js',
    'staticfiles/node_modules/select2/dist/js/select2.full.min.js',
    'staticfiles/node_modules/select2/dist/js/select2.min.js',
    'staticfiles/node_modules/axios/dist/axios.min.js',
    'staticfiles/scripts/class.js',

    'staticfiles/scripts/dt-products.js',
];

$msg = 'Consulta a base de datos';


include('view/dt-products/dt-productsView.phtml');
?>