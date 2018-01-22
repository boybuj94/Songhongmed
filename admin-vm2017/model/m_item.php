<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$item = $_REQUEST['item'];
		$danhmuc = $_REQUEST['danhmuc'];
		$info = $_REQUEST['info'];
		$tieude = $_REQUEST['tieude'];
		$nn = $_REQUEST['nn'];
		$date = date('YmdHis-');// lấy thời gian thực 
		$test = mysqli_query($con,"SELECT iddm,item FROM item WHERE iddm = '{$danhmuc}' AND item = '{$item}'"); // kiểm tra bản ghi đã tồn tại hay chưa?
		$num = mysqli_num_rows($test);
		if($num == 0){ // chưa tồn tại bản ghi
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
					if($_FILES['img']['size'] > 2548576){
						
							echo "<script>";
							echo "alert('Anh khong duoc lon hon 2mb');";
							echo "window.location.href='../index.php?ql=item&ac=add';";
							echo "exit();";
							echo "</script>";
						
					}else{
						// img hợp lệ, tiến hành upload
	
						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "INSERT INTO item (item,tieude,iddm,info,ngonngu,img) VALUES ('{$item}','{$tieude}','{$danhmuc}','{$info}','{$nn}','{$name2}')";
							if(mysqli_query($con,$sql)){ // kiểm tra kết quả bản ghi
								$check = mysqli_query($con,"SELECT iddm,item FROM item WHERE iddm = '{$danhmuc}'"); //kiểm tra xem iddm đã đủ item? 
								$nums = mysqli_num_rows($check);

								if($nums == 1){ // mới chỉ có 1/2 item
									$rows = mysqli_fetch_array($check); 
									if($rows == 0){ // nếu đã tồn tại item 0 = Certificate
										echo "<script>";
										echo "alert('Them thanh cong item Catalog, tiep tuc them item Certificate !');";
										echo "window.location.href='../index.php?ql=item&ac=add&item=1&iddm={$danhmuc}';";
										echo "exit();";
										echo "</script>";	
									}else{ // ngược lại item 1 = Catalog
										echo "<script>";
										echo "alert('Them thanh cong item Certificate, tiep tuc them item Catalog!');";
										echo "window.location.href='../index.php?ql=item&ac=add&item=0&iddm={$danhmuc}';";
										echo "exit();";
										echo "</script>";
									}
								}else{ // Trường hợp đã có đầy đủ item
									echo "<script>";
									echo "alert('Them thanh cong item !');";
									echo "window.location.href='../index.php?ql=item&ac=add';";
									echo "exit();";
									echo "</script>";
								} // end kiem tra so luong item
							}else{ // khong them dc ban ghi
								echo "<script>";
								echo "alert('Co loi xay ra, thu lai or bao cao voi ky thuat vien');";
								echo "window.location.href='../index.php?ql=item&ac=add';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}// emd kiem tra them ban ghi
						} // end kiem tra dung luong anh
					}else{ // sai kieu anh
						echo "<script>";
						echo "alert('Không đúng kiểu img ảnh');";
						echo "window.location.href='../index.php?ql=item&ac=add';";
						echo "exit();";
						echo "</script>";
					} // end kiem tra kieu anh
				}else{// chua co anh nao dc chọn
					echo "<script>";
					echo "alert('Vui lòng chọn img ảnh');";
					echo "window.location.href='../index.php?ql=item&ac=add';";
					echo "exit();";
					echo "</script>";
				}// end kiểm tra ảnh
			}else{ // Ngược lại bản ghi đã tồn tại
				echo "<script>";
				echo "alert('Item cua Danh muc da ton tai, yeu cau kiem tra lai');";
				echo "window.location.href='../index.php?ql=item&ac=add';";
				echo "exit();";
				echo "</script>";
			}
	
	}else if (isset($_REQUEST['sua'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$item = $_REQUEST['item'];
		$danhmuc = $_REQUEST['danhmuc'];
		$info = $_REQUEST['info'];
		$tieude = $_REQUEST['tieude'];
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
						//$path = '../public/img/anh/'.$name; // Đường dẫn chưa img upload
						move_uploaded_file($_FILES['img']['tmp_name'], '../public/img/anh/'.$name);
						$sql = "UPDATE item SET item = '{$item}',iddm ='{$danhmuc}',info = '{$info}',tieude = '{$tieude}',ngonngu='{$nn}', img='{$name2}' WHERE iditem = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công item! 01');";
								echo "window.location.href='../index.php?ql=item&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=item&ac=sua&id={$id}'";
								echo "exit();";
								echo "</script>";
							}
					}
				}else{
					echo "<script>";
					echo "alert('Không đúng kiểu img ảnh');";
					echo "window.location.href='../index.php?ql=item&ac=sua&id={$id}';";
					echo "exit();";
					echo "</script>";
				}
		   }else if($_FILES['img']['name'] == NULL){ // trường hợp pass khác NULL và img NULL
				$sql = "UPDATE item SET item = '{$item}',iddm = '{$danhmuc}',info = '{$info}',ngonngu='{$nn}',tieude  = '{$tieude}' WHERE iditem = '{$id}'";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Sửa thành công item 02!');";
								echo "window.location.href='../index.php?ql=item&ac=v';";
								echo "exit();";
								echo "</script>";	
								echo $sql;
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 02');";
								echo "window.location.href='../index.php?ql=item&ac=sua&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
		   	
			}
			
			
			
	}else if ($ac == 'xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM item WHERE iditem = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công item!');";
			echo "window.location.href='index.php?ql=item&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=item&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>