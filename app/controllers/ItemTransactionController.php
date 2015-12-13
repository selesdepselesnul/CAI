<?php
class ItemTransactionController {
	public static function getItemsTransactionsByDate() {
		$date = Base::instance()->get('PARAMS[transaction_date]');
		echo json_encode(ItemTransaction::getItemsTransactionsByDate($date));
	}
}