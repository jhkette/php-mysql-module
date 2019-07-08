<?php
/**
 * Building Web Applications using MySQL and PHP (W1)
 *
 * HOE - Uploading Files: configuration settings
 *
 */

/**
 * Absolute path to application root directory (one level above current dir)
 * Tip: using dynamically generated absolute paths makes the app more portable.
 */
$config['app_dir'] = dirname(dirname(__FILE__));
 
/**
 * Absolute path to directory where uploaded files will be stored
 * Using an absolute path to the upload dir can help circumvent security restrictions on some servers
 */
$config['upload_dir'] = $config['app_dir'] . '/uploads/';

?>
