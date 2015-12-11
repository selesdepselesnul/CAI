<?php
require('lib/base.php');
$f3 = Base::instance();
$f3->config('config/config.ini');
$f3->config('config/route.ini');
$f3->run();
