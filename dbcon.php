<?php

/*$DB_HOST = 'localhost';

$DB_USER = 'root';

$DB_PASS = 'root';

$DB_NAME = 'commentsection';

// $DB_PORT = '8889';*/


$DB_HOST = '--'; // server

$DB_USER = '--'; // database user

$DB_PASS = '--'; // database password

$DB_NAME = '--'; // database name



$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

//$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

if ($link->connect_error) { 

   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);

}

$link->set_charset('utf8'); 

?>
