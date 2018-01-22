<div class="login">
<?php
	$sql1 = "SELECT * FROM user";
	$user1 = mysqli_query($con,$sql1);
	$sql2 = "SELECT * FROM user";
	$user2 = mysqli_query($con,$sql2);

	if(@$ac == "register"){
		
?>
    <form action="admin-vm2017/model/m_us.php" method="get" name='dangky'>
    <table style="padding-top:10px; ">
    <p style="padding-top:5px;text-align:center; font-size:12px; color:#999;">Nếu bạn chưa có tải khoản</p>
    <caption style="padding-top:10px; ">ĐĂNG KÝ TÀI KHOẢN</caption>
    	
        	<tr>
            	<td><label for='email'>Email: </label></td>
                <td><input class = 'text' id='email' type="text" name="email" placeholder ="&nbsp;Tài khoản"/></td>
            </tr>
            <tr>
            	<td><label for='sdt'>Số điện thoại: </label></td>
                <td><input class = 'text' id='sdt' type="text" name="sdt" placeholder ="&nbsp;Số điện thoại"/></td>
            </tr>
            <tr>
            	<td><label for='tem'>Họ tên: </label></td>
                <td><input class = 'text' id='ten' type="text" name="ten" placeholder ="&nbsp;Họ tên"/></td>
            </tr>
            <tr>
            	<td><label for='tem'>Địa chỉ </label></td>
                <td><input class = 'text' id='ten' type="text" name="diachi" placeholder ="&nbsp;Địa chỉ"/></td>
            </tr>
            <tr>
            	<td><label for='pass'>Mật khẩu: </label></td>
                <td><input class = 'text' id='pass' type="password" name="pass" placeholder ="&nbsp;Mật khẩu"/></td>
            </tr>
            <tr>
            	<td><label for='repass'>Nhập lại mật khẩu: </label></td>
                <td><input class = 'text' id='repass' type="password" name="repass" placeholder ="&nbsp;Nhập lại mật khẩu"/></td>
            </tr>
            <tr>
            	<td><input type="checkbox" name="dieukhoan" value="Đồng ý" /><a href="">&nbsp;Đồng ý với điều khoản dịch vụ?</a></td>
                <td></td>
            </tr>
<!--            <tr>
            	<td colspan ="2"><div class="g-recaptcha" data-sitekey="6LfQYh4UAAAAAMuhP1uht1pvLntIKzEMDqOPi4Xy"></div></td>
                
            </tr>-->
            <tr>
            	<td><label id='bottom'></label></td>
                <td><input id='submit' type='submit' name="add" value="Đăng ký" /></td>
            </tr>
        
        
    </table>
    </form>
   			<script>
				  var inputs = document.forms['dangky'].getElementsByTagName('input');
					var run_onchange = false;
					function valid(){
					 var errors = false;
					 var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
					 for(var i=0; i<inputs.length; i++){
					  var value = inputs[i].value;
					  var id = inputs[i].getAttribute('id');
					 
					  // Tạo phần tử span lưu thông tin lỗi
					  var span = document.createElement('span');
					  // Nếu span đã tồn tại thì remove
					  var p = inputs[i].parentNode;
					  if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
					 
					  // Kiểm tra rỗng
					  if(value == ''){
					   span.innerHTML ='<br>Bạn chưa nhập thông tin!';
					  }else{
					  // Kiểm tra các trường hợp khác
					   if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='<br>Email không hợp lệ (ví dụ: abc@gmail.com)';}		
						
						var email =value;
					   }
					   if(id == 'confirm_email' && value != email){span.innerHTML ='<br>Email nhập lại chưa đúng';}
					   if(id == 'email'){ 
					   	<?php while ($rows1 = mysqli_fetch_array($user1)) { ?> 
					   		if (value == '<?php echo $rows1['email']; ?>'){span.innerHTML ='<br>Email đã tồn tại trong hệ thống ';}<?php } ?>
							
					   }
					   // Kiểm tra password
					   if(id == 'pass'){
						if(value.length <7){span.innerHTML ='<br>Password phải từ 8 ký tự';}
						var pass =value;
					   }
					   // Kiểm tra password nhập lại
					   if(id == 'repass' && value != pass){span.innerHTML ='<br>Password nhập lại chưa đúng';}
					   // Kiểm tra số điện thoại
					   if(id == 'sdt' && isNaN(value) == true){span.innerHTML ='<br>Số điện thoại phải là kiểu số';}
					   if(id == 'sdt'){ 
					   	<?php while ($rows2 = mysqli_fetch_array($user2)) { ?> 
					   		if (value == '<?php echo $rows2['sdt']; ?>'){span.innerHTML ='<br>Số điện thoại đã tồn tại trong hệ thống ';}
					   	<?php } ?>
							}
					  
					  }
					 
					  // Nếu có lỗi thì chèn span vào hồ sơ, chạy onchange, submit return false, highlight border
					  if(span.innerHTML != ''){
					   inputs[i].parentNode.appendChild(span);
					   errors = true;
					   run_onchange = true;
					   inputs[i].style.border = '1px solid #c6807b';
					   inputs[i].style.background = '#fffcf9';
					  }
					 }// end for
					
					 
					 return !errors;
					}// end valid()
				   
					// Chạy hàm kiểm tra valid()
					var register = document.getElementById('submit');
					register.onclick = function(){
					 return valid();
					}
				   
					// Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
					 for(var i=0; i<inputs.length; i++){
					  var id = inputs[i].getAttribute('id');
					  inputs[i].onchange = function(){
					   if(run_onchange == true){
						this.style.border = '1px solid #999';
						this.style.background = '#fff';
						valid();
					   }
					  }
					 }// end for
				  </script>


        
    <?php
    	// nhập mail để kiểm tra cập nhật mật khẩu
    	}else if(@$ac == "Forgotpassword"){
    ?>

    <form action="admin-vm2017/model/m_us.php" method="post" name='dangky'>
    <table style="padding-top:10px; ">
    
    <caption style="padding-top:10px; ">LẤY LẠI MẬT KHẨU</caption>
    	
        	<tr>
            	<td><label for='email'>Nhập email: </label></td>
                <td><input class = 'text' id='email' type="text" name="email" placeholder ="&nbsp;Nhập email của bạn"/></td>
            </tr>
           
            
<!--            <tr>
            	<td colspan ="2"><div class="g-recaptcha" data-sitekey="6LfQYh4UAAAAAMuhP1uht1pvLntIKzEMDqOPi4Xy"></div></td>
                
            </tr>-->
            <tr>
            	<td><label id='bottom'></label></td>
                <td><input style="width: 100px;" id='submit' type='submit' name="xacnhan" value="Lấy lại mật khẩu" /></td>
            </tr>
        
        
    </table>
    </form>
   			<script>
				  var inputs = document.forms['dangky'].getElementsByTagName('input');
					var run_onchange = false;
					function valid(){
					 var errors = false;
					 var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
					 for(var i=0; i<inputs.length; i++){
					  var value = inputs[i].value;
					  var id = inputs[i].getAttribute('id');
					 
					  // Tạo phần tử span lưu thông tin lỗi
					  var span = document.createElement('span');
					  // Nếu span đã tồn tại thì remove
					  var p = inputs[i].parentNode;
					  if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
					 
					  // Kiểm tra rỗng
					  if(value == ''){
					   span.innerHTML ='<br>Bạn chưa nhập thông tin!';
					  }else{
					  // Kiểm tra các trường hợp khác
					   if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='<br>Email không hợp lệ (ví dụ: abc@gmail.com)';}		
						
						var email =value;
					   }
					   if(id == 'confirm_email' && value != email){span.innerHTML ='<br>Email nhập lại chưa đúng';}
					   
					  
					  }
					 
					  // Nếu có lỗi thì chèn span vào hồ sơ, chạy onchange, submit return false, highlight border
					  if(span.innerHTML != ''){
					   inputs[i].parentNode.appendChild(span);
					   errors = true;
					   run_onchange = true;
					   inputs[i].style.border = '1px solid #c6807b';
					   inputs[i].style.background = '#fffcf9';
					  }
					 }// end for
					
					 
					 return !errors;
					}// end valid()
				   
					// Chạy hàm kiểm tra valid()
					var register = document.getElementById('submit');
					register.onclick = function(){
					 return valid();
					}
				   
					// Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
					 for(var i=0; i<inputs.length; i++){
					  var id = inputs[i].getAttribute('id');
					  inputs[i].onchange = function(){
					   if(run_onchange == true){
						this.style.border = '1px solid #999';
						this.style.background = '#fff';
						valid();
					   }
					  }
					 }// end for
				  </script>
    <?php
    	// cập nhật lại mật khẩu
    	}else if(@$ac ==  md5(@$_REQUEST['id'])){
    	?>
    <form action="admin-vm2017/model/m_us.php" method="post" name='dangky'>
    <table style="padding-top:10px; ">
    
    <caption style="padding-top:10px; ">Nhập mật khẩu mới</caption>
    	
        	<tr>
            	<td><label for='email'>Email: </label></td>
                <td><input class = 'text' id='email' type="text" name="email" value="<?php echo $email?>" /></td>
            </tr>
            
            <tr>
            	<td><label for='pass'>Mật khẩu: </label></td>
                <td><input class = 'text' id='pass' type="password" name="pass" placeholder ="&nbsp;Mật khẩu"/></td>
            </tr>
            <tr>
            	<td><label for='repass'>Nhập lại mật khẩu: </label></td>
                <td><input class = 'text' id='repass' type="password" name="repass" placeholder ="&nbsp;Nhập lại mật khẩu"/></td>
            </tr>
            
<!--            <tr>
            	<td colspan ="2"><div class="g-recaptcha" data-sitekey="6LfQYh4UAAAAAMuhP1uht1pvLntIKzEMDqOPi4Xy"></div></td>
                
            </tr>-->
            <tr>
            	<td><label id='bottom'></label></td>
                <td><input id='submit' type='submit' name="update" value="Update" /></td>
            </tr>
        
        
    </table>
    </form>
   			<script>
				  var inputs = document.forms['dangky'].getElementsByTagName('input');
					var run_onchange = false;
					function valid(){
					 var errors = false;
					 var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
					 for(var i=0; i<inputs.length; i++){
					  var value = inputs[i].value;
					  var id = inputs[i].getAttribute('id');
					 
					  // Tạo phần tử span lưu thông tin lỗi
					  var span = document.createElement('span');
					  // Nếu span đã tồn tại thì remove
					  var p = inputs[i].parentNode;
					  if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
					 
					  // Kiểm tra rỗng
					  if(value == ''){
					   span.innerHTML ='<br>Bạn chưa nhập thông tin!';
					  }else{
					  // Kiểm tra các trường hợp khác
					   if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='<br>Email không hợp lệ (ví dụ: abc@gmail.com)';}		
						
						var email =value;
					   }
					   
					   
					   // Kiểm tra password
					   if(id == 'pass'){
						if(value.length <7){span.innerHTML ='<br>Password phải từ 8 ký tự';}
						var pass =value;
					   }
					   // Kiểm tra password nhập lại
					   if(id == 'repass' && value != pass){span.innerHTML ='<br>Password nhập lại chưa đúng';}			  
					  }
					 
					  // Nếu có lỗi thì chèn span vào hồ sơ, chạy onchange, submit return false, highlight border
					  if(span.innerHTML != ''){
					   inputs[i].parentNode.appendChild(span);
					   errors = true;
					   run_onchange = true;
					   inputs[i].style.border = '1px solid #c6807b';
					   inputs[i].style.background = '#fffcf9';
					  }
					 }// end for
					
					 
					 return !errors;
					}// end valid()
				   
					// Chạy hàm kiểm tra valid()
					var register = document.getElementById('submit');
					register.onclick = function(){
					 return valid();
					}
				   
					// Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
					 for(var i=0; i<inputs.length; i++){
					  var id = inputs[i].getAttribute('id');
					  inputs[i].onchange = function(){
					   if(run_onchange == true){
						this.style.border = '1px solid #999';
						this.style.background = '#fff';
						valid();
					   }
					  }
					 }// end for
				  </script>


        
    <?php
    // đăng nhập 
    	}else{
    ?>
<form action="admin-vm2017/model/m_us.php" method="post" name="dangky">
	<table style="padding-bottom:30px;border-bottom:1px dashed #0099ff;">
    <caption style="padding-top:30px; ">ĐĂNG NHẬP TẢI KHOẢN</caption>
    	
        	<tr>
            	<td><label for='taikhoan'>Tài khoản: </label></td>
                <td><input class = 'text' id='taikhoan' type="text" name="taikhoan" placeholder ="&nbsp;Email hoặc SĐT"/></td>
            </tr>
            <tr>
            	<td><label for='matkhau'>Mật khẩu: </label></td>
                <td><input class = 'text' id='matkhau' type="password" name="matkhau" placeholder ="&nbsp;Mật khẩu"/></td>
            </tr>
            <tr>
            	<td><a href="index.php?manage=login&ac=Forgotpassword">Quên mật khẩu?</a><label id='bottom'></label></td>
              
                <td><input id='submit' type='submit' name="login" value="Đăng Nhập" /><a style="color: #007dd1"  href="index.php?manage=login&ac=register" title="Đăng ký tài khoản">&nbsp;&nbsp;&nbsp;<u>Đăng ký</u></a></td>
            </tr>
            </table>
        </form>
        <script>
			<?php
				$sql = "SELECT * FROM user"; 
				$us = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array ($us);
			?>
				  var inputs = document.forms['dangky'].getElementsByTagName('input');
					var run_onchange = false;
					function valid(){
					 var errors = false;
					 var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
					 for(var i=0; i<inputs.length; i++){
					  var value = inputs[i].value;
					  var id = inputs[i].getAttribute('id');
					 
					  // Tạo phần tử span lưu thông tin lỗi
					  var span = document.createElement('span');
					  // Nếu span đã tồn tại thì remove
					  var p = inputs[i].parentNode;
					  if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
					  // Kiểm tra các trường hợp khác
					   if(value == ''){
					   span.innerHTML ='<br>Bạn chưa nhập thông tin!';
					  }
					 
					  // Nếu có lỗi thì chèn span vào hồ sơ, chạy onchange, submit return false, highlight border
					  if(span.innerHTML != ''){
					   inputs[i].parentNode.appendChild(span);
					   errors = true;
					   run_onchange = true;
					   inputs[i].style.border = '1px solid #c6807b';
					   inputs[i].style.background = '#fffcf9';
					  }
					 }// end for
					
					 
					 return !errors;
					}// end valid()
				   
					// Chạy hàm kiểm tra valid()
					var register = document.getElementById('submit');
					register.onclick = function(){
					 return valid();
					}
				   
					// Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
					 for(var i=0; i<inputs.length; i++){
					  var id = inputs[i].getAttribute('id');
					  inputs[i].onchange = function(){
					   if(run_onchange == true){
						this.style.border = '1px solid #999';
						this.style.background = '#fff';
						valid();
					   }
					  }
					 }// end for
					 
					 
					 
				  </script>
		<?php
			}

		
		?>
                  
</div>
