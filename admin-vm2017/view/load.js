// JavaScript Document
//function loaddulieu(str)
//{
//	if(window.XMLHttpRequest)
//	{
//	 	xmlhttp = new XMLHttpRequest();
//			
//	}else{
//		xmlhttp = new ActiveXObject();	
//	}
//	xmlhttp.onreadystatechange = function(){
//		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
//		{
//			document.getElementById('txtHint').innerHTML = xmlhttp.responseText;	
//		}
//	}
//	xmlhttp.open("POST","view/ajaxsanpham&id=" + str,true); // lấy dữ liệu trong form sau đó chuyển sang file getdata.php
//	xmlhttp.send();
//}

//$(document).ready(function(){
//	$(".loaisp").change(function(){
//		var id = $(".loaisp").val();
		//alert(id);
//		$.post("view/data.php", {id: id}, function(data){
//			$(".view").html(data);
//		})
//	})
//})
$(document).ready(function(){
	$(".item").change(function(){
		var id = $(".item").val();
		alert(id);
		$.post("view/data.php", {id: id}, function(data){
			$(".view").html(data);
		})
	})
})

