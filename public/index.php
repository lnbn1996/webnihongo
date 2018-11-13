<?php
include('header.inc');
?>
<div id="content">
	<div id="index_top">
		<section class="os-animation" data-os-animation="bounceInUp" data-os-animation-delay=".1s">
			<a class="btn" id="tuvung" href="tuvung/index.php" >Từ vựng</a>

			<a class="btn" id="game" href="game/index.php" >Game</a>

			<a class="btn" id="nguphap" href="nguphap/index.php" >Ngữ Pháp</a>
		</section>
	</div>
	<div id="index_bottom">
		<section class="os-animation" data-os-animation="fadeIn" data-os-animation-delay=".7s">
			<img id="img_left" src="../image/index_torii.png" />
			<img id="img_middle" src="../image/index_sensei.png"/>
			<img id="img_right" src="../image/index_mb12.png" width="300" height="250";/>
		</section>
	</div>
</div>
<?php
include('footer.inc')
?>
<script type="text/javascript">
	function topage($page){
 		window.location=$page;
 	}
</script>