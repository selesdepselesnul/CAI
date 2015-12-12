<?php
/**
*@author Moch Deden (https://github.com/selesdepselesnul)
*/
require('lib/base.php');
$app = Base::instance();
$app->config('config.ini');

$app->route('GET @index: /', 'RootController->index');
$app->route('GET @get_login: /login', 'RootController->getLogin');
$app->route('GET /item', 'RootController->getItems');
$app->route('POST /login', 'RootController->postLogin');

$app->map('/item/@item','ItemController');

$app->run();