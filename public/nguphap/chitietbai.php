<?php
include('header.inc');
require('../../config_db.php');
?>
<div id="menu_gr">
	<div id="menu_tc">
		<a href="../index.php"><img src="../../image/gr_index.png"/></a>
		<div id="title_tc"><a href="../index.php">Trang Chủ</a></div>
	</div>
	<div id="menu_tc">
		<a href="../game/index.php"><img src="../../image/gr_game.png"/></a>
		<div id="title_tc"><a href="../game/index.php">Game</a></div>
	</div>
	<div id="menu_tc">
		<a href="../tuvung/index.php"><img src="../../image/gr_voc.png"/></a>
		<div id="title_tc"><a href="../tuvung/index.php">Từ Vựng</a></div>
	</div>
	<div id="menu_tc">
		<a href="../nguphap/index.php"><img src="../../image/gr_nguphap.png"/></a>
		<div id="title_tc"><a href="../nguphap/index.php">Ngữ Pháp</a></div>
	</div>
</div>
<div id="content">
	<div id="content-box1">
	<?php
		if(isset($_GET['id'])){
		$idbai = $_GET['id'];
		// echo $idbai."<br/>";

		$sql = "select TENBAI, TIEUDE, NOIDUNG from baihoc a, nguphap b where a.ID_BAI=b.ID_BAI and a.ID_BAI= '$idbai' ";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			echo "<div id=\"cont_gr_tb\">BÀI "."$idbai</div>";
			while($row = mysqli_fetch_array($result)){
			$tieude = $row['TIEUDE'];
			$noidung = $row['NOIDUNG'];
			echo "<div id=\"box_gra\">
				<div id=\"cont_gr_td\">$tieude</div>
					<div id=\"cont_gr\">
						$noidung
					</div>
				</div>";
			}
		}else{
			//echo "Lỗi là: ".mysql_error($conn);
			echo "Chưa có bài học này!";
		}
	}
	?>
	</div>
	<div id="cont_right">
		<div id="ribbon">
			<img src="../../image/arrow.png"/>
			<div id="ribbon_td">Danh Sách Bài Học</div>
		</div>
		<div id="cont_right_td">
			<a href="chitietbai.php?id=1">1</a>
			<a href="chitietbai.php?id=2">2</a>
			<a href="chitietbai.php?id=3">3</a>
			<a href="chitietbai.php?id=4">4</a>
			<a href="chitietbai.php?id=5">5</a>
			<a href="chitietbai.php?id=6">6</a>
			<a href="chitietbai.php?id=7">7</a>
			<a href="chitietbai.php?id=8">8</a>
			<a href="chitietbai.php?id=9">9</a>
		</div>
	</div>
</div>

<?php
include('footer.inc');
mysqli_close($conn);  
?>