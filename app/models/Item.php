<?php
/**
*@author : Moch Deden (https://github.com/selesdepselesnul)
*/
class Item extends DB\SQL\Mapper {
	
	public function __construct($db, $id) {
		parent::__construct($db, 'items');
		$this->load(['id = ?', $id]);
	}

	public static function all() {
		return Base::Instance()->get('DB')->exec("SELECT * FROM items");
	}

	public static function getItemsByKey($key, $value) {
		return Base::Instance()->get('DB')->exec("SELECT * FROM items WHERE " 
			. $key . " = " . "'" .  $value . "'");
	}
}