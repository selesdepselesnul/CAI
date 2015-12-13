<?php
class ItemTransaction {
	public static function getItemsTransactionsByDate($date) {
		return Base::instance()
			       ->get('DB')
		           ->exec(
			           "SELECT * FROM items_transactions 
			           WHERE transaction_time REGEXP '.*" . $date ."'");

	}
}