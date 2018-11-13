<?php 
	if (isset($_GET['u'])) {
		$u=$_GET['u'];
		require('connect.php');
		$sql="SELECT * FROM nguoidung WHERE USERNAME='".$u."'";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0)
			echo "<small class=\"fail\">Username đã tồn tại!</small>";
	}

 ?>
  <?php 
 	if (isset($_POST['txt_newuser'])) {
 		require("connect.php");
 		$user=$_POST['txt_newuser'];
 		$ten=$_POST['txt_ten'];
 		$pass =$_POST['txt_password'];

    	$sql = "INSERT INTO nguoidung(USERNAME,TEN,PASSWORD) VALUES('".$user."','".$ten."','".$pass."')";
		if(mysqli_query($conn, $sql)){
			echo "Đăng ký thành công! Nhấp <a href=\"dangnhap.php\">vào đây</a> để đăng nhập.";
						
		}else
			echo "Đăng ký thất bại! Nhấp <a href=\"dangky.php\">vào đây</a> để đăng ký.";
		
 	}

?>
