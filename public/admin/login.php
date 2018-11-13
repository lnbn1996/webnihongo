<?php 
  session_start();

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Đăng Nhập</title>
<script src="xuly/js1.js" type="text/javascript" charset="utf-8" async defer></script>
<style type="text/css" media="screen">
  body,h2{
  background-color: #293A46;
  color: #FFFFFF;
  }

</style>

</head>
<body >

<h2 align="center"> Trang đăng nhập của Admin</h2>


<form action="#" method="POST">
<table width="400 " height="200" border="1" cellpadding="15" align="center">
    <tr>
            <td colspan="2" bgcolor="#003399"style="color:#FFF" align="center" > <b> Đăng Nhập </b> </td>  
    </tr>
    <tr>
    
    </tr>
   

    <tr>   
              <td width="240"><input type="text" placeholder=" Nhập tên đăng nhập " size="45" name="tendangnhap" /></td>
    </tr>     
    <tr>
          <td ><input type="password" placeholder=" Nhập tên mật khẩu " size="45" name="matkhau" /></td>
    </tr>
     <tr>
                  <td colspan="2" align="center">
                    <input type="hidden" name="check_submit" value="1">
                
                    <input type="button" name="ok"  value="Login" onclick="kiemtra()" /></td>
     </tr>

</table>

</form>

	
</div>
<div style="text-align:center; color:#F00">
	<?php
    	if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	?>
</div>
<!-- Xử lý đăng nhập -->
<?php
    if (!empty($_POST["check_submit"])) {
      
    
      if(empty($_POST["tendangnhap"]))
      {
    
        header('location:login.php');
      }
      else if(empty($_POST["matkhau"]))
      {
    
        header('location:login.php');
      }
      else{
        require("../../config_db.php");
        $username=$_POST["tendangnhap"];
        $passwords=$_POST["matkhau"];
        $sql = "SELECT * FROM nguoidung where USERNAME='".$username."' AND PASSWORD='".$passwords."' AND ID_QUYEN=1";
        $query = mysqli_query($conn,$sql); 
      if(mysqli_num_rows($query)==1)   
      {      
        $_SESSION['username']="admin";
        $_SESSION['quyen']="1";
        header('location:index.php');
      }
      else
      {
        $_SESSION["error"]="Vui lòng kiểm tra tên đăng nhập hoặc mật khẩu";
        header('location:login.php');
      }
      } 
    }
?>

<!-- =================== -->
<script type="text/javascript">
  function kiemtra(){
  var user = document.forms[0].elements["tendangnhap"].value;
  var pass = document.forms[0].elements["matkhau"].value;
  var password_kytu =pass.match(/[$&@'-]/gi);
  var error=false;
  if(user=='')
    {
    alert("Vui lòng nhập tên đăng nhập");
    document.forms.elements["tendangnhap"].focus();
    error=true;
    }
    else if((pass=='')||password_kytu!=null)
    {
      alert("Vui lòng nhập mật khẩu");
      document.forms.elements["matkhau"].focus();
      error=true;
    }
    if (!error) {
      document.forms[0].submit();
    }
}

</script>
</body>
</html>
<body>
</body>
</html>