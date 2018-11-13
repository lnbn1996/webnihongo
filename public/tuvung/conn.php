<?php
$host = "localhost:3306";
// $user = "admin";
// $password = "admindb";
$user = 'root';
$password = '';
$conn = mysqli_connect($host,$user,$password,'web_nihongo');
if(! $conn){
	die("Khong the ket noi duoc".mysqli_connect_error());
			 }	
if (!$conn->set_charset("utf8")) {
	echo "fail";
}
?>