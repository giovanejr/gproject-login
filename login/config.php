<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'mysql.gproject.svc');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '2c5efd15c8572817af9eaf798349068aa31f8d15');
define('DB_NAME', 'users');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
