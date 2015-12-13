<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemTransactionController {
	
    public function getItemsTransactionsByDate() {
		$date = Base::instance()->get('PARAMS[transaction_date]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByDate($date));
	}


    public function getItemsTransactionsByTime() {
		$time = Base::instance()->get('PARAMS[transaction_time]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByTime($time));
	}


	public function getItemsTransactionsByDateTime() {
		$date = Base::instance()->get('PARAMS[transaction_date]');
		$time = Base::instance()->get('PARAMS[transaction_time]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByDateTime($date, $time));
	}

	public function getItemsTransactions() {
		echo json_encode(ItemTransaction::all());

	}
}