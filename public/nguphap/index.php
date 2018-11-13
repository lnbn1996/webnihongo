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
		<div id="btn_gra">
		<div id="title_list"><span>DANH SÁCH CÁC BÀI HỌC</span></div>
			<ul>
				<li id="b1"><a href="chitietbai.php?id=1">Bài 1</a></li>
				<li id="b2"><a href="chitietbai.php?id=2">Bài 2</a></li>
				<li id="b3"><a href="chitietbai.php?id=4">Bài 3</a></li>
				<li id="b4"><a href="chitietbai.php?id=4">Bài 4</a></li>
				<li id="b5"><a href="chitietbai.php?id=5">Bài 5</a></li>
				<li id="b6"><a href="chitietbai.php?id=6">Bài 6</a></li>
				<li id="b7"><a href="chitietbai.php?id=7">Bài 7</a></li>
				<li id="b8"><a href="chitietbai.php?id=8">Bài 8</a></li>
				<li id="b9"><a href="chitietbai.php?id=9">Bài 9</a></li>
			</ul>
		</div>
	</div>
</div>
<?php
include('footer.inc');
mysqli_close($conn); 
?>