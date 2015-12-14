<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemTransactionController {

	public function getAll() {
		echo json_encode(ItemTransaction::all());
	}

	public function postNewItemTransaction($f3) {
		$item_transactions = new ItemTransaction($f3->get('DB'));
		$item_transactions->itemId = $f3->get('POST["itemId"]');
		$item_transactions->price = $f3->get('POST["price"]');
		$item_transactions->save();
		echo "cucok";

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