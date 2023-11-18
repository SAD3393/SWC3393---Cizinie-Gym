<?php
$servername = "localhost"; //database host name
$username = "root"; //database username
$password = ""; //database password
$dbName = "cizinie gym"; //database name

//database connection
$conn = new mysqli($servername, $username, $password, $dbName);

//check for connection errors
if ($conn->connect_error) {
	die("Connection fail: " . $conn->connect_error);
} else {
	echo "Connection successfully!"; 
}

define('SITEURL', 'http://localhost/CIZINIEGYM/staff/');

?>