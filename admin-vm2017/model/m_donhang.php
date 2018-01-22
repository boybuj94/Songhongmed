<?php
	include('config.php');
	if(isset($_REQUEST['add'])){
		
		ob_start();
		session_start();
		$ten = $_REQUEST['ten'];
		$email = $_REQUEST['email'];
		$sdt = $_REQUEST['sdt'];
		$diachi = $_REQUEST['diachi'];
		$noidung = $_REQUEST['noidung'];
		$tg = date('d/m/Y');
		$madon = date('dmYHis');
		if(isset($_SESSION['cart'])){
			$idsp = '';
			$dongia = 0;
			$sl = '';
			foreach ($_SESSION['cart'] as $key => $value) {
				$idsp = $idsp.' '.$_SESSION['cart'][$key]['idsp'];
				$sl = $sl.' '.$_SESSION['cart'][$key]['sl'];

			}

		}
		
						$sql = "INSERT INTO donhang (tenkhach,email,diachi,sdt,noidung,ngaydat,tinhtrang,madon,dongia,idsp,soluong) VALUES ('{$ten}','{$email}','{$diachi}','{$sdt}','{$noidung}','{$tg}','0','VM{$madon}','NULL','{$idsp}','{$sl}')";
							if(mysqli_query($con,$sql)){
								require '../public/mail/PHPMailerAutoload.php';
								require '../public/mail/class.phpmailer.php'; // path to the PHPMailer class
       							require '../public/mail/class.smtp.php';
								$mail = new PHPMailer;
								$mail->isSMTP();                                      // Set mailer to use SMTP	
								
								$mail->Host = 'smtp.gmail.com';  // host mail gg
								$mail->SMTPAuth = true;
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                               // Enable SMTP authentication
								$mail->Username = 'ytevietmy.com@gmail.com';                 // SMTP username
								$mail->Password = 'vietmy123';                           // SMTP password
								                       // Enable TLS encryption, `ssl` also accepted
								   
								$mail->isHTML(true);   
								$mail->setFrom('ytevietmy.com@gmail.com', 'ytevietmy.com');
								$mail->addAddress($email, $ten);  
								   // Add a recipient
								$mail->Subject = 'Xac nhan don hang '.$madon;
								$mail->Body    = 'Cám ơn quý khách đã tin tưởng sản phẩm công ty chúng tôi, dưới đây là đơn hàng của quý khách. Sản phẩm của quý khác sẽ được chuyển tới trong thời gian sớm nhất, dự kiến là sau 3 ngày kể từ ngày đặt hàng.';
								if(!$mail->send()) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
								echo "<script>";
								echo "alert('Quý khác đã đặt hàng thành công, hãy truy cập email để xác nhận đơn hàng của quý khách!');";
								echo "window.location.href='../../index.php';";
								echo "exit();";
								echo "</script>";	
								}
								//echo "<script>";
								//echo "alert('Bạn đã gửi thư thành công!');";
								//echo "window.location.href='../../index.php';";
								//echo "exit();";
								//echo "</script>";
							
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								/*echo "window.location.href='../../index.php?manage=Contact';";*/
								echo "exit();";
								echo "</script>";
								echo mysqli_error($con);
							}
				
	}else if(@$ac == 'xoa'){
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM donhang WHERE iddon = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công đơn hàng!');";
			echo "window.location.href='index.php?ql=dh&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=dh&ac=v';";
			echo "exit();";
			echo "</script>";
		}
	}else if(@$ac == 'duyet'){
		$id = $_REQUEST['id'];
		$sql = "UPDATE donhang SET tinhtrang = '1' WHERE iddon = '{$id}'";
		if(mysqli_query($con,$sql)){
								echo "<script>";
								
								echo "window.location.href='index.php?ql=dh&ac=sr&id={$id}';";
								
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";	
								echo "window.location.href='index.php?ql=dh&ac=ct&id={$id}';";
								echo "exit();";
								echo "</script>";
							}
	}else if(isset($_REQUEST['luu'])){
		$id = $_REQUEST['id'];
			$sr = implode(' ',$_REQUEST['sr']);
			$sql = "UPDATE donhang SET serialnumber = '{$sr}' WHERE iddon = '{$id}'";
			if(mysqli_query($con,$sql)){
									echo "<script>";
									echo "alert('Lưu thành công serialnumber vào kho hàng');";
									echo "window.location.href='../index.php?ql=dh&ac=v';";
									
									echo "</script>";	
								}else{
									echo "<script>";
									echo "alert('Đã xảy ra lỗi 01');";	
									echo "window.location.href='../index.php?ql=dh&ac=v';";
									echo "exit();";
									echo "</script>";
								}

	}
	
	
	
?>