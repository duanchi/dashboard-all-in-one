<?php


const APPLICATION_KEY   =   '1436369968';
$_config_path           =   APPLICATION_KEY . '_application_' . ini_get('yaf.environ');
$_config                =   Yaconf::get($_config_path);
//define('APPLICATION_PATH', \CONF::get('application', 'path'));
var_dump($_config);
var_dump(APPLICATION_PATH);
$application = new Yaf\Application(APPLICATION_PATH.'/conf/application.ini');
$application->bootstrap()->run();