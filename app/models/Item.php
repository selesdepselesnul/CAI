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

	public static function getItemsByKey($key, $value) {
		return Base::Instance()->get('DB')->exec(
			"SELECT * FROM Item WHERE " 
			. $key . " = " . "'" .  $value . "'");
	}
}