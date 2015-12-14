<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemTransactionController {

	public function getAll() {
		echo json_encode(ItemTransaction::all());
	}

    public function getItemsTransactionsByDate() {
		$date = Base::instance()->get('PARAMS[date]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByDate($date)
		);
	}

    public function getItemsTransactionsByTime() {
		$time = Base::instance()->get('PARAMS[time]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByTime($time)
		);
	}

	public function getItemsTransactionsByDateTime() {
		$date = Base::instance()->get('PARAMS[date]');
		$time = Base::instance()->get('PARAMS[time]');
		echo json_encode(
			ItemTransaction::getItemsTransactionsByDateTime($date, $time)
		);
	}

}