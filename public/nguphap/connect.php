<?php 
$host = 'localhost:3306';
$user = 'admindb';
$pass = 'admindb';
$dbName ='web_nihongo';

$conn = new mysqli($host, $user, $pass,$dbName);
if(!$conn) die('Không thể kết nối:'.mysqli_connect_error());
if (!$conn->set_charset("utf8")) {
	echo "fail";
}
 ?>