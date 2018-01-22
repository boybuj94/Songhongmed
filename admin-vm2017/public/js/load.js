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

$(document).ready(function(){
	$(".loaisp").change(function(){
		var id = $(".loaisp").val();
		//alert(id);
		$.post("view/data.php", {id: id}, function(data){
			$("#view").html(data);
		})
	})
})
$(document).ready(function(){
	$(".lang").change(function(){
		var id2 = $(".lang").val();
		//alert(id2);
		$.post("view/data.php", {id2: id2}, function(data){
			$("#view").html(data);
		})
	})
})
$(document).ready(function(){
	$(".loai").change(function(){
		var dm = $(".loai").val();
		//alert(dm);
		$.post("view/data.php", {dm: dm}, function(data){
			$("#view").html(data);
		})
	})
})
$(document).ready(function(){
	$(".lang_l").change(function(){
		var lang_l = $(".lang_l").val();
		//alert(lang_l);
		$.post("view/data.php", {lang_l: lang_l}, function(data){
			$("#view").html(data);
		})
	})
})
$(document).ready(function(){
	$(".item").change(function(){
		var item = $(".item").val();
		//alert(item);
		$.post("view/data.php", {item: item}, function(data){
			$("#view").html(data);
		})
	})
})