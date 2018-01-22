<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$tieude = $_REQUEST['tieude'];
		
		$tag = $_REQUEST['tags'];
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
								echo "window.location.href='../index.php?ql=img&ac=add';";
								echo "exit();";
								echo "</script>";
					}else{
						// img hợp lệ, tiến hành uploa

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO img (tieude,tags,ngonngu,img) VALUES ('{$tieude}','{$tag}','{$nn}','{$name2}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công img!');";
								echo "window.location.href='../index.php?ql=img&ac=v';";
								echo "exit();";
								echo "</script>";
							
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../index.php?ql=img&ac=add';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
					}
				
		   }else{
				echo "<script>";
				echo "alert('Vui lòng chọn img ảnh');";
				echo "window.location.href='../index.php?ql=img&ac=add';";
				echo "exit();";
				echo "</script>";
		   	}

	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$tieude = $_REQUEST['tieude'];
		
		$tag = $_REQUEST['tags'];
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
					if($_FILES['img']['size'] > 2048576){
						echo "img không được lớn hơn 5mb";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE img SET tieude = '{$tieude}',tags = '{$tag}',ngonngu='{$nn}',img='{$name2}' WHERE idimg = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công img! 01');";
								echo "window.location.href='../index.php?ql=img&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=img&ac=sua&id={$id}&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=img&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL){ // trường hợp pass khác NULL và img NULL
				$sql = "UPDATE img SET tieude = '{$tieude}' = '{$url}',tags = '{$tag}',ngonngu='{$nn}' WHERE idimg = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công img 02!');";
								echo "window.location.href='../index.php?ql=img&ac=v';";
								echo "exit();";
								echo "</script>";	
								echo $sql;
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";
								echo "window.location.href='../index.php?ql=img&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	
			}
			
			
			
	}else if ($ac == 'xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM img WHERE idimg = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công img!');";
			echo "window.location.href='index.php?ql=img&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=img&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>