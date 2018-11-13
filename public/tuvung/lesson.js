//Ham chuyen den link bai
function goto($id){
	document.getElementById("id_sent").value=$id;
	document.forms['id_form'].submit();
}