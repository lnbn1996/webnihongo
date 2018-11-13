
<?php
$host = 'localhost:3306';
$user = 'root';
$pass = '';
$conn = mysqli_connect($host, $user, $pass);
if(! $conn )
{
die('Không thể kết nối: ' . mysqli_connect_error());
}
echo 'Kết nối thành công<br/>';

$dbName ="web_nihongo";
 

$sql = "CREATE USER 'binh'@'localhost' IDENTIFIED BY 'binhmk'";
$result = mysqli_query($conn, $sql);

// ALL PRIVILEGES
$sql = "GRANT CREATE, SELECT , INSERT , UPDATE , DELETE ON " . $dbName . " . * TO 'binh'@'localhost' IDENTIFIED BY 'binhmk'";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
