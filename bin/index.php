<?php
const APPLICATION_KEY   =   '1436369968';
$_config                =   [
	'application'   =>  Yaconf::get(APPLICATION_KEY . '_' . ini_get('yaf.environ') . '_application')
];
$application = new Yaf\Application($_config);
$application->bootstrap()->run();