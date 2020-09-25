<?php 
$tmp = new Template('Base de Datos');
$tmp->listJs = [
    'staticfiles/node_modules/axios/dist/axios.min.js',
    'staticfiles/scripts/class.js',
    'staticfiles/node_modules/datatables/media/js/jquery.dataTables.min.js',
    'staticfiles/scripts/table.js',
];

$msg = 'Simulación de consulta a base de datos';


include('view/table/tableView.phtml');
?>