<?php


include('config.php');
	if (isset($_REQUEST['add'])){ //    ----------------THÊM DỮ LIỆU ----------------
		$us = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];
		$ten = $_REQUEST['ten'];
		$sdt = $_REQUEST['sdt'];
		$diachi = $_REQUEST['diachi'];
		$date = date('Y/m/d');// lấy thời gian thực 
			
						$sql = "INSERT INTO user (unus,ngaydk,passus,tenus,sdt,email,diachi) VALUES ('{$us}','{$date}',MD5('{$pass}'),'{$ten}','{$sdt}','{$us}','{$diachi}')";
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
								$mail->addAddress($us, $ten);  
								   // Add a recipient
								$mail->Subject = 'Thong bao dang ky thanh cong tai khoan!';
								$mail->Body    = 'Chúc mừng '.$ten.' đã đăng ký thành công tài khoản. Tài khoản của bạn là : '.$us.' hoặc: '.$sdt.' Cảm ơn bạn đã quan tâm đến công ty chúng tôi!';
								if(!$mail->send()) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
								echo "<script>";
								echo "alert('Bạn đã tạo thành công tài khoản, hãy check mail để xác nhận nhé!');";
								echo "window.location.href='../../index.php?manage=login';";
								echo "exit();";
								echo "</script>";	
								}
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi');";
								echo "window.location.href='../../index.php?manage=login';";
								echo "exit();";
								echo "</script>";
							}
					
		   	}else if (@$ac=='xoa'){  //    ----------------XÓA DỮ LIỆU ----------------
		$id = $_REQUEST['id'];
		$sql = "DELETE FROM user WHERE idus = '{$id}'";
		if(mysqli_query($con,$sql)){
			echo "<script>";
			echo "alert('Đã xóa thành công thành viên!');";
			echo "window.location.href='index.php?ql=us&ac=v';";
			echo "exit();";
			echo "</script>";	
		}else{
			echo "<script>";
			echo "alert('Đã xảy ra lỗi!');";
			echo "window.location.href='index.php?ql=us&ac=v';";
			echo "exit();";
			echo "</script>";
		}
		
	}else if(isset($_REQUEST['login'])){
		ob_start();
		session_start();
		$pass = md5($_REQUEST['matkhau']);
		$taikhoan = $_REQUEST['taikhoan'];
		$sql = "SELECT * FROM user WHERE (passus = '{$pass}' AND unus = '{$taikhoan}') OR (passus = '{$pass}' AND sdt ='{$taikhoan}')"; 
		$us = mysqli_query($con,$sql);
		$rows = mysqli_fetch_array($us);
		$num = mysqli_num_rows($us);
		
		if($num>'0'){
			$_SESSION['email']=$rows['email'];
			$_SESSION['passus']=$rows['passus'];
			$_SESSION['idus']=$rows['idus'];
			$_SESSION['sdt']=$rows['sdt'];
			$_SESSION['diachi']=$rows['diachi'];
			$_SESSION['tenkh']=$rows['tenus'];
			
				echo "<script language='javascript'>alert('Logged in successfully');";
				echo "location.href='../../index.php';</script>";

			}else{
				echo "<script language='javascript'>alert('Sai tài khoản or mật khẩu');";
				echo "location.href='../../index.php?manage=login';</script>";
				echo "</script>";
		}
	}else if(isset($_REQUEST['xacnhan'])){
		$email = $_REQUEST['email'];
		$md5 = md5($email);
		$sql = "SELECT email FROM user WHERE email = '{$email}'";
		$user = mysqli_query($con,$sql);
		$num = mysqli_num_rows($user);
		if($num == '0'){
			echo "<script language='javascript'>alert('Email không tồn tại trong hệ thống!');";
			echo "location.href='../../index.php?manage=login&ac=Forgotpassword';</script>";
		}else{
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
								$mail->addAddress($email, $email);  
								   // Add a recipient
								$mail->Subject = 'Lay lai mat khau - ytevietmy.com!';
								$mail->Body    = "Bạn vừa có yêu cầu lấy lại mật khẩu, hãy xác nhận thông tin bằng cách ấn vào xác nhận bên dưới! <p><a style='padding:7px;border:1px solid #0099ff;background:#0099ff;color:#fff;line-height: 2;    line-height: 2; border-radius: 7px;margin-left: 40%;text-decoration: none;' href='http://localhost/duan/thanglong/index.php?manage=login&ac={$md5}&id={$email}'>Xác nhận</a></p>";
								if(!$mail->send()) {
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
								echo "<script>";
								echo "alert('Hãy kiểm tra mail để thay đổi mật khẩu!');";
								echo "alert('Quay về trang chủ!');";
								echo "window.location.href='../../index.php';";
								echo "exit();";
								echo "</script>";	
								}
		}
	}else if(isset($_REQUEST['update'])){
		$email = $_REQUEST['email'];
		$pass = md5($_REQUEST['pass']);
		$sql = "UPDATE user SET passus = '{$pass}' WHERE email = '{$email}'";
		if(mysqli_query($con,$sql)){
								echo "<script>";
								echo "alert('Cập nhật thành công mật khẩu! 01');";
								echo "window.location.href='../../index.php?manage=login';";
								echo "exit();";
								echo "</script>";	
							}else{
								echo "<script>";
								echo "alert('Đã xảy ra lỗi 01');";	
								echo "window.location.href='../index.php?manage=login&ac=email&id={$email}';";
								echo "exit();";
								echo "</script>";
							}
	}
?>