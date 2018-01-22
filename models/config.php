<?php
	$host ="localhost";
	$user="root";
	$pass="";
	$db="anhngoc";
	// kết nối đến csdl
	$con = mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, 'UTF8');
	if(mysqli_connect_errno($con)){
		echo "Không thể kết nối đến CSDL".mysqli_connect_error($con);
	}
?>