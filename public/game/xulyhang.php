<?php 
	if (isset($_GET['bai'])) {
		require("connect.php");
		$sql = "SELECT * FROM diem, nguoidung WHERE diem.USERNAME=nguoidung.USERNAME AND ID_BAI='".$_GET['bai']."' ORDER BY DIEM_GAME DESC";
		$sql1 = "SELECT * FROM tuvung WHERE ID_BAI='".$_GET['bai']."'"; 
		$result = mysqli_query($conn,$sql);
		$result1 = mysqli_query($conn,$sql1);

		if (mysqli_num_rows($result)>0) {
			while ($rows=mysqli_fetch_assoc($result)) {
				echo "<div class=\"rank-user\">".$rows['TEN']."(".$rows['DIEM_GAME']."/".mysqli_num_rows($result1).")</div>";
					
			}					    		
		}
	}


 ?>