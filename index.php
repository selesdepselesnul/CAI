<?php
/**
 * @author Moch Deden (https://github.com/selesdepselesnul)
 */
require('lib/base.php');


$app = Base::instance();
$app->config('config.ini');
$app->set(
	'DB', 
	new DB\SQL(
        $app->get('db.dns'),
        $app->get('db.user'),
        $app->get('db.password')
    )
);


// root controller
$app->route('GET @get_index: /', 'RootController->getIndex');
$app->route('GET @get_login: /login', 'RootController->getLogin');
$app->route('GET /logout', 'RootController->getLogout');
$app->route('POST /login', 'RootController->postLogin');


// item controller
$app->route('GET /json/item', 'ItemController->getAll');
$app->route('GET /json/item/@id', 'ItemController->getItemById');
$app->route('GET /json/item/@key/@operator/@value', 
	'ItemController->getItemsByKey');
$app->route('POST /json/item/new', 
	'ItemController->postNewItem');
$app->route('POST /json/item/@id/edit', 
	'ItemController->postEditItem');


// item transaction controller
$app->route('GET /json/itemtransaction', 
	'ItemTransactionController->getAll');
$app->route('GET /json/itemtransaction/@id', 
	'ItemTransactionController->getItemTransactionById');
$app->route('GET /json/itemtransaction/date/@date', 
	'ItemTransactionController->getItemsTransactionsByDate');
$app->route('GET /json/itemtransaction/time/@time', 
	'ItemTransactionController->getItemsTransactionsByTime');
$app->route('GET /json/itemtransaction/datetime/@date/@time', 
	'ItemTransactionController->getItemsTransactionsByDateTime');
$app->route('POST /json/itemtransaction/new', 
	'ItemTransactionController->postNewItemTransaction');

// web route
$app->route('GET /item/form/submit',
	'ItemFormController->getFormSubmiting');
$app->route('POST /item/form/submit', 
	'ItemFormController->postFormSubmiting');

$app->run();