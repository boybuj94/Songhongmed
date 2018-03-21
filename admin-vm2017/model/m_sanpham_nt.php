<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$ten = $_REQUEST['ten'];
		$ma = $_REQUEST['ma'];
		$hang = $_REQUEST['hang'];
		$thongtin = $_REQUEST['thongtin'];
		$bv = $_REQUEST['bv'];
		$nb = $_REQUEST['nb'];
		$dm = $_REQUEST['dm'];
		$nn = $_REQUEST['nn'];

		// biến đổi tiêu đề có dấu -> không đấu
			$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $ten);
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
			  $str = str_replace('"', "",$str);
			  
		$date = date('YmdHis-');// lấy thời gian thực 
			if($_FILES['img']['name'] != NULL){ // Đã chọn img
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				// Tiến hành code upload img
				
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 2276800){
						echo "img không được lớn hơn 2mb";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO sanpham_nt (tensp,masp,idnt,hangsp,thongtin,baiviet,ngonngu,img,noibat,link_title) VALUES ('{$ten}','{$ma}','{$dm}','{$hang}','{$thongtin}','{$bv}','{$nn}','{$name}','{$nb}','{$str}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Thêm thành công sản phẩm!');";
								echo "window.location.href='../index.php?ql=nt&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../index.php?ql=nt&ac=add';";
								echo "exit();";
								echo "</script>";
								echo $sql.mysqli_error($con);
							}
					}
				
		   }else{
				echo "<script>";
				echo "alert('Vui lòng chọn img ảnh');";
				echo "window.location.href='../index.php?ql=nt&ac=add';";
				echo "exit();";
				echo "</script>";
		   	}

	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id']; 
		$ten = $_REQUEST['ten'];
		$ma = $_REQUEST['ma'];
		$hang = $_REQUEST['hang'];
		$thongtin = $_REQUEST['thongtin'];
		$bv = $_REQUEST['bv'];
		$nb = $_REQUEST['nb'];
		$dm = $_REQUEST['dm'];
		$nn = $_REQUEST['nn'];
		$date = date('YmdHis-');// lấy thời gian thực  

		// biến đổi tiêu đề có dấu -> không đấu
			$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $ten);
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
			  $str = str_replace('"', "",$str);

			if($_FILES['img']['name'] != NULL){ 
				//if(){ 
				$img = $date.$_FILES['img']['name'];
				$name = str_replace(' ','-',$img);
				// Tiến hành code upload img
				if($_FILES['img']['type'] == "image/jpeg"
				|| $_FILES['img']['type'] == "image/png"
				|| $_FILES['img']['type'] == "image/gif"){
				// là img ảnh
				// Tiến hành code upload  
					if($_FILES['img']['size'] > 2276800){
						echo "img không được lớn hơn 2mb";
					}else{
						// img hợp lệ, tiến hành upload

						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE sanpham_nt SET tensp = '{$ten}',masp = '{$ma}',idnt = '{$dm}',hangsp = '{$hang}',thongtin = '{$thongtin}',baiviet = '{$bv}',ngonngu='{$nn}',img='{$name}',noibat ='{$nb}',link_title ='{$str}' WHERE idsp = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công loại sản phẩm! 01');";
								echo "window.location.href='../index.php?ql=nt&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=nt&ac=sua&id={$id}&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=nt&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL){ // trường hợp img NULL
				$sql = "UPDATE sanpham_nt SET tensp = '{$ten}',masp = '{$ma}',idnt = '{$dm}',hangsp = '{$hang}',thongtin = '{$thongtin}',baiviet = '{$bv}',ngonngu='{$nn}',noibat ='{$nb}',link_title ='{$str}' WHERE idsp = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công sản phẩm 02!');";
								echo "window.location.href='../index.php?ql=nt&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";

								echo "window.location.href='../index.php?ql=nt&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	
			}
			
			
			
	}else if ($ac=='xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM sanpham_nt WHERE idsp = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công sản phẩm!');";
			echo "window.location.href='index.php?ql=nt&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=nt&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>