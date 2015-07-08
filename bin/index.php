<?php
define('APPLICATION_PATH', dirname(dirname(__FILE__)));
define('APPLICATION_KEY', '1436369968');

$application = new Yaf\Application(APPLICATION_PATH.'/conf/application.ini');
$application->bootstrap()->run();