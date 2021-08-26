<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'it210proba');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER.':'.DB_SERVER_PORT, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
