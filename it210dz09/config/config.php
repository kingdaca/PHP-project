<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'it210_dz09');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER.':'.DB_SERVER_PORT, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
