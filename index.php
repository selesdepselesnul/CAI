<?php
/**
*@author Moch Deden (https://github.com/selesdepselesnul)
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

$app->route('GET @get_index: /', 'RootController->getIndex');
$app->route('GET @get_login: /login', 'RootController->getLogin');
$app->route('GET /logout', 'RootController->getLogout');
$app->route('GET /item', 'RootController->getItems');
$app->route('GET /item/key/@key/@value', 'ItemController->getItemsByKey');
$app->route('GET /item/transaction/date/@transaction_date', 
	'ItemTransactionController->getItemsTransactionsByDate');
$app->route('GET /item/transaction/time/@transaction_time', 
	'ItemTransactionController->getItemsTransactionsByTime');
$app->route('POST /login', 'RootController->postLogin');

$app->map('/item/@item','ItemController');

$app->run();