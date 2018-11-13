<?php 
	if (isset($_GET['bai'])) {
		$bai= $_GET['bai'];
		require('connect.php');
		$sql="SELECT * FROM tuvung WHERE ID_BAI='".$bai."'";
		$result = mysqli_query($conn,$sql);
		echo mysqli_num_rows($result);
	}


 ?>