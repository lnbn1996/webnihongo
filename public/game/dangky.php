<?php
include('header.inc');
?>
<div id="menu_gr">
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_index.png"/></a>
		<div id="title_tc"><a href="#">Trang Chủ</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_game.png"/></a>
		<div id="title_tc"><a href="#">Game</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_voc.png"/></a>
		<div id="title_tc"><a href="#">Từ Vựng</a></div>
	</div>
	<div id="menu_tc">
		<a href="#"><img src="../../image/gr_nguphap.png"/></a>
		<div id="title_tc"><a href="#">Ngữ Pháp</a></div>
	</div>
</div>
<div id="content">
	<div class="khung-form">
		<form action="xulydangky.php" method="post" name="form_tuvung">
					ĐĂNG KÝ
					<br>
				    <input class="input-select" type="text" id="txt_newuser" name="txt_newuser" placeholder="Tên đăng nhập" onchange="kiemtra_dangky()" maxlength="30">
				    <br>
				    <div id="noti_user"></div>
				    <input class="input-select" type="text" id="txt_ten" name="txt_ten" placeholder="Tên của bạn là gì?" maxlength="8">
				    <input class="input-select" type="password" id="txt_password" name="txt_password" placeholder="Nhập mật khẩu">
				    <br>
				    <input class="input-select" type="password" id="txt_repassword" name="txt_repassword" placeholder="Nhập lại mật khẩu">
				    <input type="button" class="input-submit" value="Đăng ký" onclick="kiemtra()">
				    <a href="dangnhap.php" title="" onclick="">Đăng nhập</a>
				    <div id="noti">
				    	
				    </div>
		</form>
	</div>
</div>

<script type="text/javascript">
  function kiemtra(){
  var user = document.forms[0].elements["txt_newuser"].value;
  var pass = document.forms[0].elements["txt_password"].value;
  var repass = document.forms[0].elements["txt_repassword"].value;
  var ten = document.forms[0].elements["txt_ten"].value;
  var error = false;
  if(user=='')
    {
    document.getElementById("noti").innerHTML="<small class=\"fail\">Vui lòng nhập tên đăng nhập</small>"
    document.forms[0].elements["txt_newuser"].focus();
    error=true;
    }
    else if(pass=='')
    {
      document.getElementById("noti").innerHTML="<small class=\"fail\">Vui lòng nhập mật khẩu</small>"
      document.forms[0].elements["txt_password"].focus();
     error=true; 
    }
    else if(ten==''){
	    document.getElementById("noti").innerHTML="<small class=\"fail\">Vui lòng nhập tên</small>"
	    document.forms[0].elements["txt_ten"].focus();
    error=true;
    }else if (pass!=repass) {
    	document.getElementById("noti").innerHTML="<small class=\"fail\">Mật khẩu nhập lại không đúng</small>"
    	document.forms[0].elements["txt_repassword"].focus();
    error=true;
    }else if(!error){
    	document.forms[0].submit();
    }
}

</script>

<script language="javascript">
            function kiemtra_dangky()
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("noti_user").innerHTML = xmlhttp.responseText;
                    }
                };
                un = document.getElementById("txt_newuser").value;
                xmlhttp.open("GET", "xulydangky.php?u="+un, true);
                xmlhttp.send();
            }
        </script>


<?php
include('footer.inc')
?>