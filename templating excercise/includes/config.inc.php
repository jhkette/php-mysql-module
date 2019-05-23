<?php
/**
 * Configuration settings for HOE - PHP with MySQL
 * Edit these to match your environment
 */


/**
 * Database connection credentials
 * Change these to suit the database you are working on
 */
$config['db_host'] = 'mysqlsrv.dcs.bbk.ac.uk';
$config['db_name'] = 'jkette01db';
$config['db_user'] = 'jkette01';
$config['db_pass'] = 'bbkmysql';

/**
 * Set the default timezone as we are using some date/time functions and the
 * server time zone may not be what we want/expect
 * To see what time zone the server uses: echo date_default_timezone_get();
 */
date_default_timezone_set('Europe/London');

?>
