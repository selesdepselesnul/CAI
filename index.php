<?php
require('lib/base.php');
$app = Base::instance();
$app->config('config.ini');

$app->route('GET @index: /', 'RootController->index');
$app->route('GET @get_login: /login', 'RootController->getLogin');
$app->route('POST @post_login: /login', 'RootController->postLogin');

$app->map('/item/@item','ItemController');

$app->run();