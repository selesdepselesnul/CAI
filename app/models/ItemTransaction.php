<?php
class ItemTransaction {
	
	private static function filterDateTime($pattern) {
    	return Base::instance()
		->get('DB')
		->exec(
			"SELECT * FROM items_transactions 
			WHERE transaction_time REGEXP '" . $pattern . "'");
    }

	public static function getItemsTransactionsByDate($date) {
		return self::filterDateTime(".*" . $date); 
	}

	public static function getItemsTransactionsByTime($time) {
		return self::filterDateTime($time .".*");
	}

}