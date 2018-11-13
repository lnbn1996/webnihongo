<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="lesson.css">
	<script src="" type="text/javascript"></script>
	<title>
		<?php
		$ID_bai = $_POST['id_sent'];
		echo "Từ vựng-Bài ",$ID_bai; 
		?>
	</title>
</head>

<body>
	<a href="../index.php"><img id="home" src="../../image/Graphicloads-Colorful-Long-Shadow-Home.ico"/></a>
	<div id="trangchu">Trang Chủ</div>
	<a href="../game/index.php"><img id="home" src="../../image/gr_game.png"/><div id="game">Game</div></a>
	<a href="../nguphap/index.php"><img id="home" src="../../image/gr_nguphap.png"/><div id="trangchu">Ngữ Pháp</div></a>
	<a href="index.php"><img id="home" src="../../image/back.png"/><div id="trangchu">Trang Trước</div></a>	
	<div id = "header"> 
		<?php echo "<h1> BÀI ".$ID_bai."</h1>"; ?>
	</div>
	
	<div id = "content">
		<?php 
			require('conn.php');
			$sql = "SELECT * FROM tuvung WHERE ID_BAI='$ID_bai'";
			$result = mysqli_query($conn,$sql) or die(mysqli_error());
			echo "<table border = 0>";
			echo "<tr><th> Hiragana</th>
					  <th>Tiếng Việt</th>
				   </tr>";
			while ($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td> ".$row["TIENGNHAT"]."</td>";
				echo "<td> ".$row["TIENGVIET"]."</td>";
				echo "</tr>";	
			}
			echo "</table>";
		?>
	</div>
</body>
</html>