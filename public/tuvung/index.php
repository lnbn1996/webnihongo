<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<script src="lesson.js" type="text/javascript"></script>
<title>
	Từ vựng
</title>
</head>

<body>	
	<a href="../index.php"><img id="home" src="../../image/Graphicloads-Colorful-Long-Shadow-Home.ico"/></a>
	<div id="trangchu">Trang Chủ</div>
	<a href="../game/index.php"><img id="home" src="../../image/gr_game.png"/><div id="game">Game</div></a>
	<a href="../nguphap/index.php"><img id="home" src="../../image/gr_nguphap.png"/><div id="trangchu">Ngữ Pháp</div></a>	
	<div id="header">	
		TỪ VỰNG    
	</div>
	<div id="content">
		<div id="content-box1" >
			<div id="row1">
				<button name="1" onClick="goto(1);">
					BÀI 1
				</button>
				<button name="2" onClick="goto(2);">
					BÀI 2
				</button>
				<button name="3" onClick="goto(3);">
					BÀI 3
				</button>
			</div>
			<div id="row2" >
				<button onClick="goto(4);">
					BÀI 4
				</button>
				<button onClick="goto(5);">
					BÀI 5
				</button>
			</div>
		</div>
	</div>
<!--Tạo form bất kì đâu-->
<form name="id_form" action="lessonabc.php" method="Post" style="display: none">
	<input type="hidden" id="id_sent" name="id_sent" value="">
</form>

</body>
</html>