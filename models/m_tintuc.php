<?php
include('config.php');
	if (isset($_REQUEST['gui'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$ten = $_REQUEST['ten'];
		$email = $_REQUEST['email'];
		$id = $_REQUEST['id'];
		$noidung = $_REQUEST['noidung'];
	
		$tg = date('d/m/Y-H');
		
		
						$sql = "INSERT INTO binhluan (tenkhach,email,noidung,thoigian,idtin) VALUES ('{$ten}','{$email}','{$noidung}','{$tg}','{$id}')";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Bạn đã gửi bình luận thành công!');";
								echo "window.location.href='../index.php?manage=News&v=vde&id={$id}';";
								echo "exit();";
								echo "</script>";
							
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../index.php?manage=News&v=vde&id={$id}';";
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
						}
?>