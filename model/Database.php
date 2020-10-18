<?php 


class Database {

	static private $fields = 'name,description,category,username';
	static private $values = ':name,:description,:category,:username';
	


	static function createTable($table_name,$fields){
		
		$fields = 'id serial primary key,name varchar(50) not null,description varchar (255)';

		$sql = 'create table '.$table_name. '('.$fields.')';
	}

	static function connection()
	{

        try {
			$con = new PDO('pgsql:host=localhost;port=5432;dbname=prueba;user=postgres;password=root');
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// $con->exec('SET CHARACTER SET UTF-8');
		} catch (Exception $e) {
			die('ERROR EN LA CONEXION ' . $e->getMessage() . " " . $e->getLine());
		}
		return $con;

    }

	static public function listQuery($sql)
	{
		// Lista las tablas de manera generica, este metodo recibe una consulta sql.
		$query = self::connection()->query($sql);
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
    }
    
	static public function retrieveQuery($sql,$condicion)
	{
		// lista el detalle de un objeto dentro de una tabla, recibe 2 parametros
		// el sql y el identificador de la condicion where
		$query = self::connection()->prepare($sql);
		$query->execute(array(":x"=>$condicion));
		return $query;
	}


}



?>