<?php 

$request = $peticion->metodo(); 

switch($request){

    case 'list':
        $sql = "select * from category order by id desc";
        $rows = Category::listQuery($sql);
        echo json_encode($rows);
    break;

    case 'list-ac':
        $sql = "select id,name as text from category order by id desc";
        $rows = Category::listQuery($sql);
        echo json_encode($rows);
    break;

    case 'retrieve':
        $id = $peticion->argumento();
        
        $msj = Array();
        if(!empty($id)){
            $sql = "select * from category where id = :x";
            $row = Category::retrieveQuery($sql,$id)->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($row[0]);
        }else{
            $msj['error'] = 'Se requiere un id para realizar una busqueda dentro de la base de datos';
            echo json_encode($msj);
        }
    break;


}



?>