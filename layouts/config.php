<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'insim_school');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

date_default_timezone_set('Africa/Algiers');
$date = date('y-m-d h:i:s');

$gmailid = ''; // YOUR gmail email
$gmailpassword = ''; // YOUR gmail App password
$gmailusername = ''; // YOUR gmail Username