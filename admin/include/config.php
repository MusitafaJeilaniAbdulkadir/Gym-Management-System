<?php 
//DB Connection
define('DB_HOST','myserver.com');
define('DB_USER','University');
define('DB_PASS','mustafa@123');
define('DB_NAME','gymdb');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>