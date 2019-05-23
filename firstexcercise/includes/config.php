<?php


$config['db_user'] = 'root';
$config['db_pass'] = '';
$config['db_name'] = 'test2';
$config['db_host'] = 'localhost';

$production = false;

// development
if($production == false){
    error_reporting(E_ALL);
}
else{
    // production
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}

?>