<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemTransaction extends DB\SQL\Mapper {

	public function __construct($db, $id=0) {
		parent::__construct($db, 'ItemTransaction');
		if($id != 0)
			$this->load(['id = ?', $id]);
	}

	
	private static function filterDateTime($pattern) {
		return Base::instance()
		->get('DB')
		->exec(
			"SELECT * FROM ItemTransaction WHERE transactionTime " 
			. $pattern
			);
	}

	public static function getItemsTransactionsByDateTime(
		$operator,$date, $time) {
		if($operator == 'eq')
			return self::filterDateTime("="."'".$date." ".$time."'"); 
		else if($operator == 'lt')
			return self::filterDateTime("<"."'".$date." ".$time."'");
		else 
			return self::filterDateTime(">"."'".$date." ".$time."'"); 
	}


	public static function getItemsTransactionsByDate($date) {
		return self::filterDateTime("REGEXP "."'".$date.".+"."'"); 
	}

	public static function getItemsTransactionsByTime($time) {
		return self::filterDateTime("REGEXP "."'".".+".$time."'"); 
	}

	public static function all() {
		return Base::instance()
		->get('DB')
		->exec("SELECT * FROM ItemTransaction");
	}
}