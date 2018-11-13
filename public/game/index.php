<?php
include('header.inc');
?>
<?php 
	session_start();
 ?>
<div id="menu_gr">
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_index.png"/></a>
		<div id="title_tc"><a href="../">Trang Chủ</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_game.png"/></a>
		<div id="title_tc"><a href="../game">Game</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_voc.png"/></a>
		<div id="title_tc"><a href="../tuvung">Từ Vựng</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_nguphap.png"/></a>
		<div id="title_tc" ><a href="../nguphap">Ngữ Pháp</a></div>
	</div>
</div>
<div id="content">
	<div id="content-box1" style="margin-top: 138px;">
		<div id="left-ds-bai">
			<div class="header-box">
				
				<div id="guest-name" title="Click vào để đăng xuất!" >
					<?php 
						if (isset($_SESSION['ten'])) {
							echo "<div onClick=\"dangxuat()\">".$_SESSION['ten']."</div>";
						}else echo "<a href=\"dangnhap.php\">ĐĂNG NHẬP</a>";

					 ?>
				</div>
				<div id="level">
					<?php 
						if (isset($_SESSION['bai'])) {
							echo "Cấp độ: Bài ".$_SESSION['bai'];
							echo "<input id=\"bai_level\" value=\"".$_SESSION['bai']."\" style=\"display:none;\">";
						}
					 ?>	
				</div>
			</div>
			<div class="body-box">
				<div id="1" onclick="chon_bai(1)"  class="ds-bai-game">
					Bài 1
				</div>
				<div id="2" onclick="chon_bai(2)" class="ds-bai-game">
					Bài 2
				</div>
				<div id="3" onclick="chon_bai(3)" class="ds-bai-game">
					Bài 3
				</div>
				<div id="4" onclick="chon_bai(4)" class="ds-bai-game">
					Bài 4
				</div>
				<div id="5" onclick="chon_bai(5)" class="ds-bai-game">
					Bài 5
				</div>
				<div id="6" onclick="chon_bai(6)" class="ds-bai-game">
					Bài 6
				</div>
				<div id="7" onclick="chon_bai(7)" class="ds-bai-game">
					Bài 7
				</div>
				<div id="8" onclick="chon_bai(8)" class="ds-bai-game">
					Bài 8
				</div>
			</div>
		</div>
		<div id="middle-game">
			<div id="clock-khung">
				<div  id="clock">
					
				</div>
				

				<div id="diem-game">
					
				</div>
					
			</div>
			<div id="game">
				<?php 
				if (isset($_SESSION['bai'])) {
					echo "<button id=\"btn-start\"class=\"btn\" onClick=\"active_bai(".$_SESSION['bai'].")\">baét ñaàu</button>";
				}else echo "<button id=\"btn-start\"class=\"btn\" onClick=\"active_bai(1)\">baét ñaàu</button>";

				 ?>
			</div>

		</div>
		<div id="right-rank">
			<div class="header-box">
				<div id="rank-header">
					Xeáp haïng

				</div>
				<div id="body-hang" class="body-box">
					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var khungGame = document.getElementById('game');
	var sec=100;
	//khungGame.innerHTML="<button id=\"btn-start\"class=\"btn\" onClick=\"start()\">baét ñaàu</button>";
</script>
<script type="text/javascript">
	function dangxuat(){
		window.location="dangnhap.php";
	}
	function active_bai(_bai){
		// if(_bai>document.getElementById('bai_level').value) document.getElementById('bai_level').value=_bai; 
		document.getElementById(_bai).setAttribute("style", "background-color:#0D03CF");
		setbai(_bai);
		load_sl_cau(bai);
		start(_bai);

	}
	function chon_bai(chon){
		endgame();
		for (var i = 1; i <= 8; i++) {
			document.getElementById(i).setAttribute("style", "background-color:#FF0000");
		}
		document.getElementById(chon).setAttribute("style", "background-color:#0D03CF");
		document.getElementById("game").innerHTML="<button id=\"btn-start\"class=\"btn\" onClick=\"active_bai("+chon+")\">baét ñaàu</button>"
	}
</script>

<script src="js.js" type="text/javascript" charset="utf-8" async defer></script>
<?php
include('footer.inc')
?>