var cau=0;
var Interval;
var sec=6;
var sl_cau=0;
var bai=0;
function setbai(_bai){
	bai=_bai;
	show_hang(bai)
}


function start(){
	
	show_hang(bai)
	clearInterval(Interval);
	cau=0;
	hiencau();
}

 function hiencau(){
 	sec=6;
 	document.getElementById('diem-game').innerHTML="Điểm:"+cau+"/"+sl_cau;
 	clearInterval(Interval);
 		
	load_data(cau, bai);
	Interval =setInterval(function(){
		sec=sec-1;
		document.getElementById('clock').innerHTML=sec;
		document.getElementById('clock').setAttribute("class","clock_active");
		console.log(sec);
		if (sec<=0) {
			clearInterval(Interval);
			endgame();
		}
	},1000);	
 	
 }
 function next(){
 	cau++;
 	if (cau==10) endgame();
 	hiencau();

 	document.getElementById('diem-game').innerHTML="Điểm:"+cau+"/"+sl_cau;
 }
 function endgame(){
 	document.getElementById('diem-game').innerHTML="";
 	document.getElementById('clock').setAttribute("class","");
 	clearInterval(Interval);
 	document.getElementById("clock").innerHTML="";
 	ghi_diem();
 	khungGame.innerHTML="<div id=\"endgame\">Ñieåm: "+cau+"/"+sl_cau+" <br><button  id=\"restart-game\" class=\"btn\" onClick=\"start()\" >Chôi laïi</button><button onClick=\"active_bai("+(bai+1)+")\" id=\"restart-game\" class=\"btn\" >baøi keá tieáp</button></div>";

 }

 function load_data(id,bai)
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
        	if(xmlhttp.responseText=="1"){
        		sec=-1;
        		clearInterval(Interval);
        		endgame();
        	} else
            document.getElementById("game").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "xulygame.php?id="+id+"&bai="+bai, false);
    xmlhttp.send();
}

 function load_sl_cau(bai)
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

        	sl_cau = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "xulygame_sl_cau.php?bai="+bai, false);
    xmlhttp.send();
}

function ghi_diem(){
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
        	//sl_cau = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "xulydiem.php?cau="+cau+"&bai="+bai, false);
    xmlhttp.send();
}
function show_hang(bai){
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
        	document.getElementById("body-hang").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "xulyhang.php?bai="+bai, false);
    xmlhttp.send();
}