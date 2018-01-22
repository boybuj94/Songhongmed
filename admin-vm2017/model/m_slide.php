<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$tieude = $_REQUEST['tieude'];
		$link = $_REQUEST['link'];
		$tag = $_REQUEST['tag'];
		$nn = $_REQUEST['nn'];
		
		$date = date('YmdHis-');// lấy thời gian thực 
			if($_FILES['img']['name'] != NULL){ // Đã chọn img
				$path = 'public/img/anh/';
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				$name2=$path.$name;
				// Tiến hành code upload img
				
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 2548576){
						echo "<script>";
								echo "alert('file không được lớn hơn 2mb!');";
								echo "window.location.href='../index.php?ql=sl&ac=add';";
								echo "exit();";
								echo "</script>";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO slide (tieude,link,tags,ngonngu,img) VALUES ('{$tieude}','{$link}','{$tag}','{$nn}','{$name2}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công slide!');";
								echo "window.location.href='../index.php?ql=sl&ac=v';";
								echo "exit();";
								echo "</script>";
							
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../index.php?ql=sl&ac=add';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
					}
				
		   }else{
				echo "<script>";
				echo "alert('Vui lòng chọn img ảnh');";
				echo "window.location.href='../index.php?ql=sl&ac=add';";
				echo "exit();";
				echo "</script>";
		   	}

	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$tieude = $_REQUEST['tieude'];
		$link = $_REQUEST['link'];
		$tag = $_REQUEST['tag'];
		$nn = $_REQUEST['nn'];
		
		$date = date('YmdHis-');// lấy thời gian thực 
			if($_FILES['img']['name'] != NULL){ 
				//if(){ 
				$path = 'public/img/anh/';
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				$name2=$path.$name;
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

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE slide SET tieude = '{$tieude}',link = '{$link}',tags = '{$tag}',ngonngu='{$nn}',img='{$name2}' WHERE idsl = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công slide! 01');";
								echo "window.location.href='../index.php?ql=sl&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=sl&ac=sua&id={$id}&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=sl&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL){ // trường hợp pass khác NULL và img NULL
				$sql = "UPDATE slide SET tieude = '{$tieude}',link = '{$link}',tags = '{$tag}',ngonngu='{$nn}' WHERE idsl = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công slide 02!');";
								echo "window.location.href='../index.php?ql=sl&ac=v';";
								echo "exit();";
								echo "</script>";	
								echo $sql;
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";
								echo "window.location.href='../index.php?ql=sl&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	
			}
			
			
			
	}else if ($ac == 'xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM slide WHERE idsl = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công slide!');";
			echo "window.location.href='index.php?ql=sl&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=sl&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>