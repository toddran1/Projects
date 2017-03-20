
<?php

// varibles to connect to databases
$mysql_hostname = "127.0.0.1";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "eh_login";

$db = new PDO('mysql:host=localhost;dbname=eh_login', $mysql_username, $mysql_password) or die("something went wrong");
//mysql_select_db($mysql_database, $db) or die("Couldnt find database");



?>
