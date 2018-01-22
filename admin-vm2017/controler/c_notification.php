<?php
		
	$sql1 = "SELECT * FROM user ORDER BY idus DESC LIMIT 10 ";
	$user = mysqli_query($con,$sql1);
	$sql2 = "SELECT * FROM donhang,sanpham WHERE sanpham.idsp = donhang.idsp ORDER BY iddon DESC LIMIT 10";
	$donhang = mysqli_query($con,$sql2);
	
	include('view/v_notification.php');

?>