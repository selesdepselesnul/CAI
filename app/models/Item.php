<?php
class Item extends DB\SQL\Mapper {
	
	public function __construct($db, $id) {
		parent::__construct($db, 'items');
		$this->load(['id = ?', $id]);
	}

	public static function all() {
		$db = new DB\SQL(
			Base::Instance()->get('db.dns'),
			Base::Instance()->get('db.user'),
			Base::Instance()->get('db.password')
		);
	    return $db->exec("SELECT * FROM items");
	}

}