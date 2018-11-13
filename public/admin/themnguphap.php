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
					<li class="active" ><a href="#" title="">Thêm ngữ pháp</a></li>
					<li><a href="doimatkhau.php" title="">Đổi mật khẩu</a></li>
					<li><a href="logout.php" >=> Đăng xuất <=</a></li>
				</ul>
			</div>
		</div>
		<div class="menu-input" id="khung-input-nguphap">
			<div id="input-header">
				<p id="tieude-them">Thêm ngữ pháp</p>
				<hr>

				<div class="khung-nhap-tuvung">
					<form action="#" method="POST" name="form_nguphap">
					    <label for="txt-tieude">Tiêu đề ngữ pháp</label>
					    <input class="input-select" type="text" id="txt-tieude" name="txt-tieude" placeholder="Nhập tiêu đề...">
					    <br>
					    <label for="txt-noidung">Nội dung ngữ pháp</label>
					    <textarea class="input-select" type="text" id="txt-noidung" name="txt-noidung" placeholder="Nhập nội dung..."></textarea>
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
					    </select><br>
					   	<div id="noti-fail">
					    	<?php 
							if (isset($_POST['txt-tieude'])) {
									$bai=$_POST['txt-bai'];
									$tieude=$_POST['txt-tieude'];
									$noidung=$_POST['txt-noidung'];
									require("../../config_db.php");
									$sql= "INSERT INTO nguphap(ID_BAI,TIEUDE,NOIDUNG) values ('$bai','$tieude','$noidung')";
									if(mysqli_query($conn, $sql))
								  		echo "<small class=\"success\">Thêm ngữ pháp thành công!</small>";
								 	else
								  		echo "<small class=\"fail\">Thêm ngữ pháp thất bại!</small>";//. mysqli_error($conn);
								}
							?>
					    </div> 
					    	<input type="button" class="input-submit" name="btn-submit" value="Thêm" onclick="them_nguphap()">
					 </form>					
				</div>
				<div class="khung-data" style="margin-top: -6px;">
					<!-- Khu vực xử lý xóa ngữ pháp -->
					<form action="#" method="POST" style="display: none" name="form_xoa">
						<input type="hidden" name="id_xoa" value="">
					</form>
					<?php 
						if (isset($_POST['id_xoa'])) {
							require("../../config_db.php");
							$id_del=$_POST['id_xoa'];
							$sql = "DELETE FROM nguphap WHERE ID_CAU = "."'".$id_del."'";
							if(mysqli_query($conn, $sql))
						  		echo "<small class=\"success\">Xóa ngữ pháp thành công!</small>";
						 	else
						  		echo "<small class=\"fail\">Xóa ngữ pháp thất bại!</small>";
						}
					 ?>
					 <!-- ================= -->

					<table id="table-data">
						<thead>
							<tr>
								<th>Bài</th>
								<th>Tiêu đề</th>
								<th>Nội dung</th>
								<th	></th>
							</tr>
						</thead>
						<tbody>
							<?php 
					    		require("../../config_db.php");
					    		$sql = "SELECT ID_CAU,TENBAI,TIEUDE, NOIDUNG \n"
									    . "FROM baihoc,nguphap\n"
									    . "WHERE baihoc.ID_BAI=nguphap.ID_BAI\n"
									    . "ORDER BY TENBAI ASC";
					    		$result = mysqli_query($conn,$sql);
					    		if (mysqli_num_rows($result)>0) {
					    			while ($rows=mysqli_fetch_assoc($result)) {
					    				echo "<tr>
					    					  <td>{$rows['TENBAI']}</td>
					    					  <td>{$rows['TIEUDE']}</td>
					    					  <td>{$rows['NOIDUNG']}</td>
											  <td><a style=\"cursor: pointer;\"  onclick=\"xoa({$rows['ID_CAU']})\">Xóa</a></td>
					    					  </tr>";
					    			}					    		
					    		}
					    	 ?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

 <!-- Phần xử lý javaScript -->
<script type="text/javascript">
function them_nguphap(){
	var form=document.forms['form_nguphap'];
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



<?php
include('footer.inc')
?>