<?php
/**
*@author Moch Deden (https://github.com/selesdepselesnul)
*/
class Item extends DB\SQL\Mapper {
	
	public function __construct($db, $id=0) {
		parent::__construct($db, 'Item');
		if($id != 0)
		    $this->load(['id = ?', $id]);
	}

	public static function all() {
		return Base::Instance()->get('DB')->exec("SELECT * FROM Item");
	}

	public static function getItemsByKey($key, $operator, $value) {
		if($operator == 'eq')
			return self::getItemWhere($key, "=", $value);
		elseif ($operator == 'lt') 
			return self::getItemWhere($key, "<", $value);
		else
			return self::getItemWhere($key, ">", $value);
	}

	public static function getItemsByPattern($key, $pattern) {
		return Base::Instance()
		           ->get('DB')
		           ->exec(
		           	"SELECT * FROM Item WHERE ".$key." LIKE '".$pattern."%'");
	}

	private static function getItemWhere($key, $operator, $value) {
		return Base::Instance()->get('DB')->exec(
			"SELECT * FROM Item WHERE " 
			. $key . $operator . "'" .  $value . "'");
	}
}