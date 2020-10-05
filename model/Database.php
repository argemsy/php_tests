<?php 


class Database {

	static private $fields = 'name,description,category';
	static private $values = ':name,:description,:category';
	
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

    static public function Insertar($table,$obj) {

		$sql = "insert into ".$table."(".self::$fields.")values(".self::$values.")";
		$stmt = self::connection()->prepare($sql);

		$fields = explode(',',self::$values);
		$values = explode(',',$obj);

		for($i=0;$i<count($obj);$i++){
			$stmt->bindValue($fields[$i], $obj[$i]);
		}
			

        // execute the insert statement
        $stmt->execute();
        
    }



}



?>