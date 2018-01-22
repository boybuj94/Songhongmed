<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$us = $_REQUEST['taikhoan'];
		$pass = $_REQUEST['pass'];
		$ten = $_REQUEST['ten'];
		$quyen = $_REQUEST['cv'];
		$date = date('YmdHis-');// lấy thời gian thực 
			if($_FILES['img']['name'] != NULL){ // Đã chọn img
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				
				// Tiến hành code upload img
				if($_FILES['img']['type'] == "image/jpeg"
				|| $_FILES['img']['type'] == "image/png"
				|| $_FILES['img']['type'] == "image/gif"){
				// là img ảnh
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 6048576){
						echo "img không được lớn hơn 5mb";
					}else{
						// img hợp lệ, tiến hành upload
						$path = '../public/img/anh/'.$name; // Đường dẫn chưa img upload
						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO admin (tenad,usad,passad,quyen,img) VALUES ('{$ten}','{$us}',MD5('{$pass}'),'{$quyen}','{$name}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công Admin!');";
								echo "window.location.href='../index.php?ql=ad&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../index.php?ql=ad&ac=add';";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=ad&ac=add';";
					echo "exit();";
					echo "</script>";
				}
		   }else{
				echo "<script>";
				echo "alert('Vui lòng chọn img ảnh');";
				echo "window.location.href='../index.php?ql=ad&ac=add';";
				echo "exit();";
				echo "</script>";
		   	}

	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$pass = $_REQUEST['newpass'];
		$ten = $_REQUEST['ten'];
		$quyen = $_REQUEST['cv'];
		$id = $_REQUEST['id'];
		$date = date('YmdHis-');// lấy thời gian thực 
			if($_FILES['img']['name'] != NULL && $pass != NULL){ // trường hợp pass và img khác NULL
				//if(){ 
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				// Tiến hành code upload img
				if($_FILES['img']['type'] == "image/jpeg"
				|| $_FILES['img']['type'] == "image/png"
				|| $_FILES['img']['type'] == "image/gif"){
				// là img ảnh
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 6048576){
						echo "img không được lớn hơn 5mb";
					}else{
						// img hợp lệ, tiến hành upload
						$path = '../public/img/anh/'.$name; // Đường dẫn chưa img upload
						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE admin SET tenad = '{$ten}',passad=MD5('{$pass}'),quyen='{$quyen}',img='{$name}' WHERE idad = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công Admin! 01');";
								echo "window.location.href='../index.php?ql=ad&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL && $pass != NULL){ // trường hợp pass khác NULL và img NULL
				$sql = "UPDATE admin SET tenad = '{$ten}',passad=MD5('{$pass}'),quyen='{$quyen}' WHERE idad = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công Admin 02!');";
								echo "window.location.href='../index.php?ql=ad&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";
								echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	}else if($_FILES['img']['name'] != NULL && $pass == NULL){ // trường hợp pass NULL và img khác NULL
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				// Tiến hành code upload img
				if($_FILES['img']['type'] == "image/jpeg"
				|| $_FILES['img']['type'] == "image/png"
				|| $_FILES['img']['type'] == "image/gif"){
				// là img ảnh
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 6048576){
						echo "img không được lớn hơn 5mb";
					}else{
						// img hợp lệ, tiến hành upload
						$path = '../public/img/anh/'.$name; // Đường dẫn chưa img upload
						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE admin SET tenad = '{$ten}',quyen='{$quyen}',img='{$name}' WHERE idad = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công Admin! 03');";
								echo "window.location.href='../index.php?ql=ad&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 03');";
								echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
			}else if(($_FILES['img']['name'] == NULL) && ($pass == NULL)){ // trường hợp pass và img NULL
				$sql = "UPDATE admin SET tenad = '$ten',quyen='$quyen' WHERE idad = '$id'"; 
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công Admin! 04');";
								echo "window.location.href='../index.php?ql=ad&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "Lốix".mysqli_error($con);
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 04');";
								
								/*echo "window.location.href='../index.php?ql=ad&ac=sua&id={$id}';";*/
								echo "exit();";
								echo "</script>";
							}
			}
			
			
			
	}else if ($ac=='xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM admin WHERE idad = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công Admin!');";
			echo "window.location.href='index.php?ql=ad&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=ad&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>