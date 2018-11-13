<?php 
	session_start();
	if (isset($_SESSION['username'])&&isset($_GET['bai'])&&($_GET['cau']!="0")) {
		$bai=$_GET['bai'];
		$diem=$_GET['cau'];
		$username=$_SESSION['username'];
		require("connect.php");
		$sql1 = "SELECT * FROM diem WHERE USERNAME='".$username."' AND ID_BAI='".$bai."'";
		$result = mysqli_query($conn,$sql1);
		if (mysqli_num_rows($result)==0){
			$sql = "INSERT INTO diem(DIEM_GAME, ID_BAI, USERNAME) VALUES ('".$diem."','".$bai."', '".$username."')";
			if(mysqli_query($conn, $sql)) echo "ok";
		}else{

			$sql = "UPDATE diem SET DIEM_GAME = '".$diem."' WHERE USERNAME = '".$username."'";
			if(mysqli_query($conn, $sql)) echo "ok";
		}
	}
 ?>