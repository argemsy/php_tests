<?php 


class Database {


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

	static public function simpleQuery($sql)
	{
		$query = self::connection()->query($sql);
		$rows = $query->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
    }
    
	static public function EspecificQuery($sql,$condicion)
	{
		$query = self::connection()->prepare($sql);
		$query->execute(array(":x"=>$condicion));
		return $query;
	}



}



?>