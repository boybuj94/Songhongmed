<?php
	include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$ten = $_REQUEST['ten'];
		$email = $_REQUEST['email'];
		$diachi = $_REQUEST['diachi'];
		$sdt = $_REQUEST['sdt'];
		$noidung = $_REQUEST['noidung'];
	
		$tg = date('d/m/Y-H');
		
		
						$sql = "INSERT INTO lienhe (tenkh,email,diachi,sdt,noidung,thoigian,tinhtrang) VALUES ('{$ten}','{$email}','{$diachi}','{$sdt}','{$noidung}','{$tg}','0')";
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
								$mail->setFrom('ytevietmy.com@gmail.com', 'LienHe');
								$mail->addAddress('ytevietmy.com@gmail.com', $ten);  
								   // Add a recipient
								$mail->Subject = 'Lien he '.$tg;
								$mail->Body    = 'Khách hàng: '.$ten.' có số điện thoại: '.$sdt.' và email '.$email.' tại '.$diachi.' với nội dung: '.$noidung;
								if(!$mail->send()) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
								echo "<script>";
								echo "alert('Bạn đã gửi thành công liên hệ, chúng tôi sẽ phản hồi lại sớm nhất có thể!');";
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
				
	}else if (isset($_REQUEST['rep'])){ //    ----------------SỬA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
						$sql = "UPDATE lienhe SET tinhtrang = '1' WHERE idlh={$id}";
							if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Đã gửi thành công thư trả lời! 01');";
								echo "window.location.href='../index.php?ql=lh&ac=v';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";
								echo "window.location.href='../index.php?ql=lh&ac=rep&id={$id}";
								echo "exit();";
								echo "</script>";
							}
	
	}else if ($ac == 'xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM lienhe WHERE idlh = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công Liên hệ!');";
			echo "window.location.href='index.php?ql=lh&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=lh&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}
?>