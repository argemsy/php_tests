<?php 


$table = [
    'data'=>[
        [
            'name'=>'Argenis',
            'last_name'=>'Vargas',
            'age'=>34,
            'cedula'=>'18.188.043'
        ],
        [
            'name'=>'Argeris',
            'last_name'=>'Vargas',
            'age'=>34,
            'cedula'=>'1.127.572.293'
        ],
        
    ],
    'columns'=>[
        [
            'data'=>'name'
        ],
        [
            'data'=>'last_name'
        ],
        [
            'data'=>'age'
        ],
        [
            'data'=>'cedula'
        ],
    ],
    'destroy' => true,
    ];

header('Content-Type: application/json');
$json = json_encode($table);
echo $json;

?>