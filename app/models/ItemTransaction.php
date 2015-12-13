<?php
class ItemTransaction {
	
	private static function filterDateTime($pattern) {
		return Base::instance()
		->get('DB')
		->exec(
			"SELECT * FROM items_transactions 
			WHERE transaction_time " . $pattern);
	}

	public static function getItemsTransactionsByDateTime($date, $time) {
		return self::filterDateTime("="."'".$date." ".$time."'"); 
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
		->exec("SELECT * FROM items_transactions");
	}
}