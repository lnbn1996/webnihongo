<?php 
		if (isset($_GET['id'])) {
		
		
			$id=$_GET['id'];
			$bai=$_GET['bai'];
			$a=0;$b=0;$c=0;
			$mang_kq;
			$i=0;
			require('connect.php');
			$sql="SELECT * FROM tuvung WHERE ID_BAI='".$bai."'";
			$result = mysqli_query($conn,$sql);
			$kq=mysqli_num_rows($result);
			if (mysqli_num_rows($result)>0)
				while ($rows=mysqli_fetch_assoc($result)) {
					$mang_kq[$i]=$rows;
					$i++;
				}
			if ($id==$kq) {
				echo "1";
			}else{
				// for ($j=0; $j <$i ; $j++) { 
				// 	echo $mang_kq[$j]['TIENGNHAT']."\n";
				// }
				// echo "câu hỏi: ".$mang_kq[$id]['TIENGNHAT']."Đáp án: ".$mang_kq[$id]['TIENGVIET'];
				$cauhoi=$mang_kq[$id]['TIENGNHAT'];
				$dapan=$mang_kq[$id]['TIENGVIET'];
				
				$sql="SELECT * FROM tuvung";
				$result = mysqli_query($conn,$sql);
				$sl_kq=mysqli_num_rows($result);

				if (mysqli_num_rows($result)>0)
					$i=0;
					while ($rows=mysqli_fetch_assoc($result)) {
						$mang_kq[$i]=$rows;
						$i++;
					}

				
				while (true) {
					$a=mt_rand(0,$sl_kq-1);
					if ($a!=$id) {
						// echo "a=".$a;
						break;
					}
				}
				while (true) {
					$b=mt_rand(0,$sl_kq-1);
					if (($b!=$id)&&($b!=$a)) {
						// echo "b=$b";
						break;
						
					}
				}
				while (true) {
					$c=mt_rand(0,$sl_kq-1);
					if (($c!=$id)&&($c!=$a)&&($c!=$b)) {
						// echo "c=$c";
						break;

					}
				}
				
				$question="<div id=\"question\">".$cauhoi."</div>";
				$answer1="<div class=\"answer correct\" onclick=\"next()\"> ".$dapan."</div>";
				$answer2="<div class=\"answer\" onclick=\"endgame()\"> ".$mang_kq[$a]['TIENGVIET']."</div>";
				$answer3="<div class=\"answer\"  onclick=\"endgame()\"> ".$mang_kq[$b]['TIENGVIET']."</div>";
				$answer4="<div class=\"answer\"  onclick=\"endgame()\"> ".$mang_kq[$c]['TIENGVIET']."</div>";
				// echo $question;
				// echo $answer1;
				// echo $answer2;
				// echo $answer3;
				// echo $answer4;
				$answer="";
				$mang_answer = array($answer1,$answer2,$answer3,$answer4);		
				$a=mt_rand(0,3);
				$answer=$answer."".$mang_answer[$a];
				while (true) {
					$b=mt_rand(0,3);
					if (($b!=$a)) {
						$answer=$answer.$mang_answer[$b];
						break;			
					}
				}
				while (true) {
					$c=mt_rand(0,3);
					if (($c!=$a)&&($c!=$b)) {
						$answer=$answer.$mang_answer[$c];
						break;
					}
				}
				while (true) {
					$d=mt_rand(0,3);
					if (($d!=$a)&&($d!=$b)&&($d!=$c)) {
						$answer=$answer.$mang_answer[$d];
						break;
					}
				}
				echo "$question"."$answer";
	 		}
 	}

 ?>