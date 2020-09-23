<?php 


class Database {


    static function connection(){

        try {
			$con = new PDO('mysql:host=localhost;dbname=senas','root','');
			$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$con->exec('SET CHARACTER SET UTF8');
		} catch (Exception $e) {
			die('ERROR EN LA CONEXION ' . $e->getMessage() . " " . $e->getLine());
		}
		return $con;


    }

	static public function simpleQuery($sql)
	{
		$query = self::connection()->prepare($sql);
		$query->execute(array());
		return $query;
    }
    
	static public function EspecificQuery($sql,$condicion)
	{
		$query = self::connection()->prepare($sql);
		$query->execute(array(":x"=>$condicion));
		return $query;
	}



}



?>