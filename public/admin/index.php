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
		<div class="admin-menu">
			<div class="control-header">
				Bảng điều khiển
				<hr>
			</div>
			<div class="control-body">
				<ul>
					<li class="active"><a href="index.php" title="">Thêm từ vựng</a></li>
					<li ><a href="themnguphap.php" title="">Thêm ngữ pháp</a></li>
					<li><a href="doimatkhau.php" title="">Đổi mật khẩu</a></li>
					<li><a href="logout.php" title="">=> Đăng xuất <=</a></li>
				</ul>
			</div>
		</div>
		<div class="menu-input">
			<div id="input-header">
				<p id="tieude-them">Thêm từ vựng</p>
				<hr>
				<div class="khung-nhap-tuvung" >
					<form action="#" method="post" name="form_tuvung">
					    <label for="txt-tuvung" >Từ vựng</label>
					    <input class="input-select" type="text" id="txt-tuvung" name="txt-tuvung" placeholder="Nhập từ vựng...">
					    <br>
					    <label for="txt-nghia">Nghĩa</label><br>
					    <input class="input-select" type="text" id="txt-nghia" name="txt-nghia" placeholder="Nhập nghĩa...">
					    <br>
					    <label for="txt-bai">Chọn bài</label>
					    <br>
					    <select class="input-select" id="txt-bai" name="txt-bai">
					    	<?php 
					    		require("../../config_db.php");
					    		$sql="SELECT * FROM baihoc";
					    		$result = mysqli_query($conn,$sql);
					    		if (mysqli_num_rows($result)>0) {
					    			while ($rows=mysqli_fetch_assoc($result)) {
					    				echo "<option value=\"{$rows['ID_BAI']}\">{$rows['TENBAI']}</option>";
					    			}
					    			
					    		
					    		}
					    		
					    	 ?>					    
					    	</select> <br>
					    <div id="noti-fail">
					    	<?php 
							if (isset($_POST['txt-tuvung'])) {
									$bai=$_POST['txt-bai'];
									$tiengnhat=$_POST['txt-tuvung'];
									$tiengviet=$_POST['txt-nghia'];
									require("../../config_db.php");
									$sql= "INSERT INTO tuvung(ID_BAI,TIENGNHAT,TIENGVIET) values ('$bai','$tiengnhat','$tiengviet')";
									if(mysqli_query($conn, $sql))
								  		echo "<small class=\"success\">Thêm từ vựng thành công!</small>";
								 	else
								  		echo "<small class=\"fail\">Thêm từ vựng thất bại!</small>";//. mysqli_error($conn);
								}
							?>
					    </div>
					    
					    	
					    <input type="button" class="input-submit" name="btn-submit" value="Thêm" onclick="them_tuvung()">
					 </form>			
				</div>
				<div class="khung-data">
					<!-- Khu vực xử lý xóa từ vựng -->
					<form action="#" method="POST" style="display: none" name="form_xoa">
						<input type="hidden" name="id_xoa" value="">
					</form>
					<?php 
						if (isset($_POST['id_xoa'])) {
							require("../../config_db.php");
							$id_del=$_POST['id_xoa'];
							$sql = "DELETE FROM tuvung WHERE ID_TUVUNG = "."'".$id_del."'";
							if(mysqli_query($conn, $sql))
						  		echo "<small class=\"success\">Xóa từ vựng thành công!</small>";
						 	else
						  		echo "<small class=\"fail\">Xóa từ vựng thất bại!</small>";
						}
					 ?>
					 <!-- ================= -->
					<table id="table-data">
						<thead>
							<tr>
								<th>Bài</th>
								<th>Từ Vựng</th>
								<th>Nghĩa</th>
								<th	></th>
							</tr>
						</thead>
						<tbody>

							<?php 
					    		require("../../config_db.php");
					    		$sql = "SELECT ID_TUVUNG,TENBAI,TIENGNHAT, TIENGVIET \n"
									    . "FROM baihoc,tuvung\n"
									    . "WHERE baihoc.ID_BAI=tuvung.ID_BAI\n"
									    . "ORDER BY TENBAI ASC";
					    		$result = mysqli_query($conn,$sql);
					    		if (mysqli_num_rows($result)>0) {
					    			while ($rows=mysqli_fetch_assoc($result)) {
					    				echo "<tr>
					    					  <td>{$rows['TENBAI']}</td>
					    					  <td>{$rows['TIENGNHAT']}</td>
					    					  <td>{$rows['TIENGVIET']}</td>
					    					  <td><a style=\"cursor: pointer;\" onclick=\"xoa({$rows['ID_TUVUNG']})\">Xóa</a></td>
					    					  </tr>";
					    			}					    		
					    		}
					    	 ?>	
						</tbody>
					</table>
				</div>
			</div>
			<div id="input-body">
				
			</div>
		</div>
	</div>
</div>
 

 <!-- Phần xử lý javaScript -->
<script type="text/javascript">
function them_tuvung(){
	var form=document.forms['form_tuvung'];
	var error=false;
	for (var i = 0;i < form.elements.length; i++) {
		if (form.elements[i].value=='') {
			form.elements[i].focus();
			document.getElementById("noti-fail").innerHTML="<small class=\"fail\">Vui lòng nhập đầy đủ thông tin!</small>"
			error=true;
			break;
		}
	}
	if (!error) {
		document.forms[0].submit();	
	}
 	
}

function xoa($id){
	var form = document.forms['form_xoa'];
	form["id_xoa"].value=$id;
	form.submit();
}
</script>
<!-- ================= -->
<?php
include('footer.inc')
?>
