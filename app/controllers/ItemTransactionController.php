<?php
class ItemTransactionController {
	public function getItemsTransactionsByDateTime() {
		$date_time = Base::instance()->get('PARAMS[transaction_date_time]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByDateTime($date_time));
	}

	public function getItemsTransactions() {
		echo json_encode(ItemTransaction::all());

	}
}