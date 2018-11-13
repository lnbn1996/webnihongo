<?php
include('header.inc');
?>
<?php
session_start();
  if (isset($_SESSION)) {

  	session_destroy();
  }
   
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
	<div class="khung-form">
		<form action="#" method="post" name="form_tuvung">

					ĐĂNG NHẬP
					<br>
				    <input class="input-select" type="text" id="txt_username" name="txt_username" placeholder="USERNAME">
				    <br>
				    <input class="input-select" type="password" id="txt_password" name="txt_password" placeholder="PASSWORD">
				    <br>
				    <input type="button" class="input-submit" value="Đăng Nhập" onclick="kiemtra()">
				    <a href="dangky.php" title="">Đăng ký</a>
				    <div id="noti">
										    	<!-- Xử lý đăng nhập -->
						<?php
						    if (isset($_POST['txt_username'])) {
						        require("connect.php");
						        $username=$_POST["txt_username"];
						        $passwords=$_POST["txt_password"];
						        if ($username=="admin") {
						        	 echo "<small class=\"fail\">Tên đăng nhập không hợp lệ!</small>";
						        } else{
							        $sql = "SELECT * FROM nguoidung where USERNAME='".$username."' AND PASSWORD='".$passwords."'";
							        $query = mysqli_query($conn,$sql); 
								      if(mysqli_num_rows($query)==1)   
								      { 

								      	$rows=mysqli_fetch_assoc($query);     
								        $_SESSION['username']=$rows['USERNAME'];
								        $_SESSION['quyen']=$rows['ID_QUYEN'];
								        $_SESSION['ten']= $rows['TEN'];
								        //lấy data điểm
								      	$sql="SELECT * FROM diem WHERE USERNAME ='".$username."' ORDER BY ID_BAI DESC";
								      	$query = mysqli_query($conn,$sql); 
								      	if(mysqli_num_rows($query)>0){
								      		$rows=mysqli_fetch_assoc($query);
								      		$_SESSION['bai']=$rows['ID_BAI'];	
								      	}else $_SESSION['bai']=1;
								      	//======
								        header('location:index.php');
								      }
								      else
								      {
								        echo "<small class=\"fail\">Tên đăng nhập hoặc mật khẩu sai!</small>";
								      }
						  		}
						      } 
						    
						?>
				    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
  function kiemtra(){
  var user = document.forms[0].elements["txt_username"].value;
  var pass = document.forms[0].elements["txt_password"].value;
  var password_kytu =pass.match(/[$&@'-]/gi);
  var error=false;
  if(user=='')
    {
    document.getElementById("noti").innerHTML="<small class=\"fail\">Vui lòng nhập username</small>"
    document.forms[0].elements["txt_username"].focus();
    error=true;
    }
    else if(pass==''||password_kytu!=null)
    {
      document.getElementById("noti").innerHTML="<small class=\"fail\">Vui lòng nhập password</small>"
      document.forms[0].elements["txt_password"].focus();
      error=true;
    }
    if (!error) {
    	document.forms[0].submit();
    }

}

</script>

<?php
include('footer.inc')
?>