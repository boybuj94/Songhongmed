<?php
	include('config.php');
	if (isset($_REQUEST['add'])){
		$us = $_REQUEST['taikhoan'];
		$pass = $_REQUEST['pass'];
		$ten = $_REQUEST['ten'];
		$quyen = $_REQUEST['cv'];
		if(isset($_FILES['name'])){
			$img = $_FILES['name'];
			if($img != 'NULL'){
				if($_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png" || $_FILES['img']['type'] == "image/gif" ){
		 			move_uploaded_file($_FILES['img']['tmp_name'], "../public/img/anh/".$_FILES['img']['name']);
					$sql = "INSERT INTO admin (tenad,usad,passad,quyen,img) VALUES('{$ten}','{$us}','{$pass}','{$quyen}','{$_FILES['img']['name']}')";
					if(mysqli_query($con,$sql)){
					  echo "<script>";
					  echo "alert('Thêm thành công Admin!');";
					  echo "window.location.href='../index.php?ql=ad&ac=v';";
					  echo "exit();";
					  echo "</script>";	
					}else{
						echo "<script>";
					  echo "alert('Đã xảy ra lỗi');";
					  echo "window.location.href='index.php?ql=ad&ac=add';";
					  echo "exit();";
					  echo "</script>";
					}
	  			}else{
					echo "<script>";
					  echo "alert('Không đúng kiểu file ảnh');";
					  echo "window.location.href='index.php?ql=ad&ac=add';";
					  echo "exit();";
					  echo "</script>";
				}
			}
	  	}
	}
?>