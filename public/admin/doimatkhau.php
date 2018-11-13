<?php
include('header.inc');
?>
<?php
	session_start();
	if (!isset($_SESSION["username"])||($_SESSION["quyen"]!="1")) {
		header('location: login.php');
	}else
 ?>
<div id="content">
	<div id="content-box-admin">
		<div class="admin-menu" id="khung-control-nguphap" >
			<div class="control-header">
				Bảng điều khiển
				<hr>
			</div>
			<div class="control-body" id="body-control-nguphap">
				<ul>
					<li ><a href="index.php" title="">Thêm từ vựng</a></li>
					<li ><a href="themnguphap.php" title="">Thêm ngữ pháp</a></li>
					<li class="active" ><a href="doimatkhau.php" title="">Đổi mật khẩu</a></li>
					<li><a href="logout.php" >=> Đăng xuất <=</a></li>
				</ul>
			</div>
		</div>
		<div class="menu-input" id="khung-input-nguphap">
			<div id="input-header">
				<p id="tieude-them">Đổi mật khẩu</p>
				<hr>

				<div class="khung-nhap-tuvung">
					<form action="#" method="POST" name="form_dmk">
					    <label for="txt-password">Mật khẩu cũ</label>
					    <input class="input-select" type="password" id="txt-password" name="txt-password" placeholder="Nhập mật khẩu cũ...">
					    <br>
					    <label for="txt-newpass">Mật khẩu mới</label>
					    <input class="input-select" type="password" id="txt-newpass" name="txt-newpass" placeholder="Nhập mật khẩu mới...">
					    <br>
					    <label for="txt-newpass">Nhập mật khẩu mới</label>
					    <input class="input-select" type="password" id="txt-renewpass" name="txt-renewpass" placeholder="Nhập lại mật khẩu mới...">
					    <br>
					    <div id="noti-fail">
					    <?php 
					 	if (isset($_POST['txt-password'])) {
					 		require("../../config_db.php");
					 		$pass=$_POST['txt-password'];
					 		$newpass =$_POST['txt-newpass'];
					 		$sql="SELECT * FROM nguoidung WHERE USERNAME ='admin' AND PASSWORD ='".$pass."'";
					    		$result = mysqli_query($conn,$sql);
					    		if (mysqli_num_rows($result)>0) {
					    				$sql = "UPDATE nguoidung SET PASSWORD = '".$newpass."' WHERE USERNAME = 'admin'";
					    				if(mysqli_query($conn, $sql))
					    					echo "<small class=\"success\">Đổi mật khẩu thành công!</small>";
					    				else
					    					echo "<small class=\"fail\">Đổi mật khẩu thất bại!</small>";
					    			}else{
					    				echo "<small class=\"fail\">Mật khẩu cũ không đúng!</small>";
					    			}
					 	}

					 	 ?>
					    </div>
				    	<input type="button" class="input-submit" name="btn-submit" value="Đổi mật khẩu" onclick="doimatkhau()">
					 </form>
					 


				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function doimatkhau(){
	var form=document.forms['form_dmk'];
	var error=false;
	for (var i = 0;i < form.elements.length; i++) {
		if (form.elements[i].value=='') {
			form.elements[i].focus();
			document.getElementById("noti-fail").innerHTML="<small class=\"fail\">Vui lòng nhập đầy đủ thông tin!</small>"
			error=true;
			break;
		}
	}
	var pass= document.getElementById("txt-password").value;
	var newpass= document.getElementById("txt-newpass").value;
	var renewpass = document.getElementById("txt-renewpass").value;
	if (newpass!=renewpass){
		document.getElementById("noti-fail").innerHTML="<small class=\"fail\">Mật khẩu nhập lại không giống nhau!</small>"
	}else if (pass==newpass) {
		document.getElementById("noti-fail").innerHTML="<small class=\"fail\">Mật khẩu mới không được giống mật khẩu cũ!</small>"
	} else{
		form.submit();
	}
}

</script>
<?php
include('footer.inc')
?>