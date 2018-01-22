<?php
session_start();
ob_start();
include('config.php');
if(isset($_REQUEST['login'])){
	$us = $_REQUEST['taikhoan'];
	$pass1 = $_REQUEST['pass'];
	$pass = md5($pass1);
	
	$sql = "SELECT * FROM admin WHERE passad = '$pass' AND usad = '$us'";
	$kq = mysqli_query ($con,$sql);
	$rows = mysqli_fetch_array($kq);
if(mysqli_num_rows($kq)>0)
{ /*$d=mysql_fetch_array($kq);
echo "Chao ban ".$d['HoTen'];*/
 
$_SESSION['usad']=$us;
$_SESSION['passad']=$pass;
$_SESSION['idad']=$rows['idad'];
$_SESSION['namead']=$rows['tenad'];
$_SESSION['quyen']=$rows['quyen'];
$_SESSION['img']=$rows['img'];
echo "<script language='javascript'>alert('Đăng nhập thành công');";
			echo "location.href='../index.php';</script>";
}
else
{
echo "<script language='javascript'>alert('Sai tài khoản or mật khẩu');";
			echo "location.href='../index.php';</script>";
}
}
?>