<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$tieude = $_REQUEST['tieude'];
		$tomtat = $_REQUEST['tomtat'];
		$noidung = $_REQUEST['noidung'];
		$tag = $_REQUEST['tag'];
		$nn = $_REQUEST['nn'];
		$thoigian = $_REQUEST['thoigian'];
		$date = date('YmdHis-');// lấy thời gian thực 

		// biến đổi tiêu đề có dấu -> không đấu
			$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $tieude);
			  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
			  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
			  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
			  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
			  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
			  $str = preg_replace("/(đ)/", 'd', $str);
			  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
			  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
			  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
			  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
			  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
			  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
			  $str = preg_replace("/(Đ)/", 'D', $str);	 
			  $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
			  $str = str_replace("/", "-",$str);
			  $str = strtolower(str_replace('"', "",$str));


			if($_FILES['img']['name'] != NULL){ // Đã chọn img
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
					if($_FILES['img']['size'] > 2648576){
						echo "img không được lớn hơn 2mb";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO tintuc (tieude,tomtat,noidung,tags,ngonngu,img,thoigian,link_title) VALUES ('{$tieude}','{$tomtat}','{$noidung}','{$tag}','{$nn}','{$name2}','{$thoigian}','{$str}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công dịch vụ 1!');";
								echo "window.location.href='../index.php?ql=tt&ac=v';";
								echo "exit();";
								echo "</script>";	

							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 2');";
								//echo "window.location.href='../index.php?ql=tt&ac=add';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=tt&ac=add';";
					echo "exit();";
					echo "</script>";
				}
		   }else{
				$sql = "INSERT INTO tintuc (tieude,tomtat,noidung,tags,ngonngu,thoigian) VALUES ('{$tieude}','{$tomtat}','{$noidung}','{$tag}','{$nn}','{$thoigian}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công dịch vụ 2!');";
								echo "window.location.href='../index.php?ql=tt&ac=v';";
								echo "exit();";
								echo "</script>";	

							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 2');";
								//echo "window.location.href='../index.php?ql=tt&ac=add';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
		   	}

	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$tieude = $_REQUEST['tieude'];
		$tomtat = $_REQUEST['tomtat'];
		$noidung = $_REQUEST['noidung'];
		$tag = $_REQUEST['tag'];
		$nn = $_REQUEST['nn'];
		$date = date('YmdHis-');// lấy thời gian thực 

		// biến đổi tiêu đề có dấu -> không đấu
			$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $tieude);
			  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
			  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
			  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
			  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
			  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
			  $str = preg_replace("/(đ)/", 'd', $str);
			  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
			  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
			  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
			  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
			  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
			  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
			  $str = preg_replace("/(Đ)/", 'D', $str);
			  $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
			  $str = str_replace("/", "-",$str);
			  $str = strtolower(str_replace('"', "",$str));

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
					if($_FILES['img']['size'] > 2648576){
						echo "img không được lớn hơn 2mb";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE tintuc SET tieude = '{$tieude}',tomtat = '{$tomtat}',noidung = '{$noidung}',tags = '{$tag}',ngonngu='{$nn}',img='{$name2}', thoigian = '{$thoigian}', link_title = '{$str}' WHERE idtin = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công tin tức! 01');";
								echo "window.location.href='../index.php?ql=tt&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=tt&ac=sua&id={$id}&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=tt&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL){ // trường hợp pass khác NULL và img NULL
				$sql = "UPDATE tintuc SET tieude = '{$tieude}',tomtat = '{$tomtat}',noidung = '{$noidung}',tags = '{$tag}',ngonngu='{$nn}' ,thoigian = '{$thoigian}', link_title = '{$str}' WHERE idtin = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công tin tức 02!');";
								echo "window.location.href='../index.php?ql=tt&ac=v';";
								echo "exit();";
								echo "</script>";	

							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";
								echo "window.location.href='../index.php?ql=tt&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	
			}
			
			
			
	}else if ($ac == 'xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM tintuc WHERE idtin = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công tin tức!');";
			echo "window.location.href='index.php?ql=tt&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=tt&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>