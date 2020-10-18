<?php 

class Product extends Database {

    static private $fields = 'name,description,category,username';
    static private $values = ':name,:description,:category,:username';
    static private $table = 'product';
    
    static public function insertQuery($obj) {

		$sql = "insert into ".self::$table."(".self::$fields.")values(".self::$values.")";
		$stmt = self::connection()->prepare($sql);

		$fields = explode(',',self::$values);

		for($i=0;$i<count($obj);$i++){
			$stmt->bindValue($fields[$i], $obj[$i]);
		}
        // execute the insert statement
        $stmt->execute();
        
	}
	
    static public function updateQuery($obj) {
		$sql = 'update '.self::$table.' set name=:name, description=:description, category=:category, username=:username where id = :x';
		$stmt = self::connection()->prepare($sql);
		$stmt->execute($obj);
		return $stmt;
        
	}

	static public function deleteQuery($id) {
		$sql = 'delete  from '.self::$table.' where id = :x';
		$stmt = self::connection()->prepare($sql);
		$stmt->execute(array(":x"=>$id));
		return $stmt;
        
    }


}


?>