<?php
/**
 * @author Moch Deden (https://github.com/selesdepselesnul)
 */
require('lib/base.php');

class Boot {

	public function __construct() {
		$this->app = Base::instance();
		$this->app->config('config.ini');
		$this->app->set(
			'DB', 
			new DB\SQL(
				$this->app->get('db.dns'),
				$this->app->get('db.user'),
				$this->app->get('db.password')
				)
		);
		$this->initItemController();
		$this->initItemTransactionController();
		$this->initAppController();
	}

	private function initItemController() {
		$this->app->route('GET /json/item', 'ItemController->getAll');
		$this->app->route('GET /json/item/@id', 'ItemController->getItemById');
		$this->app->route('GET /json/item/@id/remove', 'ItemController->getRemovingItemById');
		$this->app->route('GET /json/item/@key/@operator/@value', 
			'ItemController->getItemsByKey');
		$this->app->route('POST /json/item/new', 
			'ItemController->postNewItem');
		$this->app->route('POST /json/item/@id/edit', 
			'ItemController->postEditItem');
	}

	private function initItemTransactionController() {
		$this->app->route('GET /json/itemtransaction', 
			'ItemTransactionController->getAll');
		$this->app->route('GET /json/itemtransaction/@id', 
			'ItemTransactionController->getItemTransactionById');
		$this->app->route('GET /json/itemtransaction/date/@date', 
			'ItemTransactionController->getItemsTransactionsByDate');
		$this->app->route('GET /json/itemtransaction/time/@time', 
			'ItemTransactionController->getItemsTransactionsByTime');
		$this->app->route('GET /json/itemtransaction/datetime/@date/@time', 
			'ItemTransactionController->getItemsTransactionsByDateTime');
		$this->app->route('GET /json/itemtransaction/datetime/@operator/@date/@time', 
			'ItemTransactionController->getItemsTransactionsByDateTime');
		$this->app->route('POST /json/itemtransaction/new', 
			'ItemTransactionController->postNewItemTransaction');
	}

	private function initAppController() {
		$this->app->route('GET @get_home:/', 
			'AppController->getHome');
		$this->app->route('GET @get_login:/login', 
			'AppController->getLogin');
		$this->app->route('GET /logout', 'AppController->getLogout');
		$this->app->route('POST /login', 'AppController->postLogin');
		$this->app->route('GET @get_inventory:/inventory', 
			'AppController->getInventory');
		$this->app->route('GET /cashier', 
			'AppController->getCashier');
	}

	public function start() {
		$this->app->run();
	}

}

$boot = new Boot;
$boot->start();