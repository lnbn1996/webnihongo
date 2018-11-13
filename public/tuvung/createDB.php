<?php 
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$conn = mysqli_connect($host,$user,$pass, 'web-nihongo');

if(! $conn){
	die("Khong the ket noi ".mysqli_connect_error());
}
else {echo 'ket noi thanh cong';}

mysqli_close($conn);
?>