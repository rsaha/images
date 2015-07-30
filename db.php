<?php
ob_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gg_admin');
define('DB_PASSWORD', 'xMapleAdmin123');
define('DB_DATABASE', 'gg_stage_db'); //gg_stage_db
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>