<?php
const APPLICATION_KEY   =   '1436369968';
$_config                =   [
	'application'   =>  Yaconf::get(APPLICATION_KEY . '_application_' . ini_get('yaf.environ'))
];
$application = new Yaf\Application($_config);
$application->bootstrap()->run();