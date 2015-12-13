<?php
class ItemTransactionController {
	public function getItemsTransactionsByDate() {
		$date = Base::instance()->get('PARAMS[transaction_date]');
		echo json_encode(ItemTransaction::getItemsTransactionsByDate($date));
	}

	public function getItemsTransactionsByTime() {
		$time = Base::instance()->get('PARAMS[transaction_time]');
		echo json_encode(ItemTransaction::getItemsTransactionsByTime($time));
	}
}