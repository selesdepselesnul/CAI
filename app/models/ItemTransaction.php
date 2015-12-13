<?php
class ItemTransaction {
	
	private static function filterDateTime($pattern) {
		return Base::instance()
		->get('DB')
		->exec(
			"SELECT * FROM items_transactions 
			WHERE transaction_time REGEXP '.*" . $pattern . ".*'");
	}

	public static function getItemsTransactionsByDateTime($datetime) {
		return self::filterDateTime($datetime); 
	}

	public static function all() {
		return Base::instance()
		->get('DB')
		->exec("SELECT * FROM items_transactions");
	}
}