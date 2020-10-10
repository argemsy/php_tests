<?php 

$request = $peticion->metodo(); 

switch($request){

    case 'list':
        $sql = "select * from products_all ";
        $rows = Product::listQuery($sql);
        $datatable = [
            'responsive' => true,
            'bDestroy' => true,
            'aaData' => $rows,
            'aaSorting'=>Array(Array(0,'desc')),
            'aoColumns' => Array(
                            Array('data'=>'id','className'=>'text-center text-primary'),
                            Array('data'=>'name'),
                            Array('data'=>'description'),
                            Array('data'=>'category_','className'=>'text-center'),
                            Array('data'=>'username','className'=>'text-center text-success'),
                        )
            ];
        $sql = 'select id from auth_user where id = :x';
        $condicion = 101; 
        $username_id = Database::retrieveQuery($sql,$condicion)->fetchAll(PDO::FETCH_ASSOC);
        $username_id = $username_id[0]['id'];
        
        $output = [
            'datatable'=>$datatable,
            'user_id'=>$username_id,
        ];

        echo json_encode($output);
    break;

    case 'retrieve':
        $id = $peticion->argumento();
        
        $msj = Array();
        if(!empty($id)){
            $sql = "select * from products_all where id = :x";
            $row = Product::retrieveQuery($sql,$id)->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($row[0]);
        }else{
            $msj['error'] = 'Se requiere un id para realizar una busqueda dentro de la base de datos';
            echo json_encode($msj);
        }
    break;

    case 'create':
        $msj = Array();

        $_POST = json_decode(file_get_contents("php://input"), true);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $username = $_POST['username'];

        if(!empty($_POST['username'])){

            $obj = [$name,$description,$category,$username];
            $insert = Product::insertQuery($obj);
            if(!isset($insert)){
                $msj['exito'] = 'Ok';
                $msj['statusCode'] = 201;
                $msj['msj'] = 'Registro de producto guardado satisfactoriamente';
            }else{
                $msj['error'] = "Ha ocurrido un error";
            }

        }else{
            $msj['error'] = "Ha ocurrido un error, Alguno o todos los campos se encuentra vacio(s), 
                            todos los datos son requeridos";
        }

        
        echo json_encode($msj);
    break;

    case 'put':
        $msj = Array();
        $id = $peticion->argumento();
        $_POST = json_decode(file_get_contents("php://input"), true);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $username = $_POST['username'];

        if(!empty($_POST['username'])){

            $obj = [$name,$description,$category,$username,$id];
            $insert = Product::updateQuery($obj);
            if(!isset($insert)){
                $msj['exito'] = 'Ok';
                $msj['statusCode'] = 201;
                $msj['msj'] = 'Registro de producto guardado satisfactoriamente';
            }else{
                $msj['error'] = "Ha ocurrido un error";
            }

        }else{
            $msj['error'] = "Ha ocurrido un error, Alguno o todos los campos se encuentra vacio(s), 
                            todos los datos son requeridos";
        }

        
        echo json_encode($msj);

    break;

    case 'delete':
        $msj = Array();
        $id = $peticion->argumento();
        $_POST = json_decode(file_get_contents("php://input"), true);

        if(!empty($id) && ($id == $_POST['id'])){

            $delete = Product::deleteQuery($id);
            if(!isset($delete)){
                $msj['exito'] = 'Ok';
                $msj['statusCode'] = 201;
                $msj['msj'] = 'Registro de producto eliminado satisfactoriamente';
            }else{
                $msj['error'] = "Ha ocurrido un error";
            }

        }else{
            $msj['error'] = "Ha ocurrido un error, Alguno o todos los campos se encuentra vacio(s), 
                            todos los datos son requeridos";
        }

        
        echo json_encode($msj);
    break;

}






?>