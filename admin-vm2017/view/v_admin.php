<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;&nbsp;&nbsp;Other&nbsp;&nbsp;&rsaquo;<a href='index.php?ql=ad&ac=v'>&nbsp;&nbsp;Admin</a></p>
</div>
<div class='admin'>
<?php
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			echo "
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1'>
    		<caption><p>DANH SÁCH ADMIN</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='60px'></td>
                <td>Tên Admin</td>
                <td>Tài khoản</td>
                
                <td>Quyền/Chức vụ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$num = mysqli_num_rows($admin);
			while($rows = mysqli_fetch_array($admin)){
            echo "<tr>
            	<td><div class='admin-img' style='background-image:url(public/img/anh/{$rows['img']})'></div></td>
                <td>{$rows['tenad']}</td>
                <td>{$rows['usad']}</td>
                
                <td>";
					if($rows['quyen'] == '0'){
						echo "Toàn quyền";
					}else if($rows['quyen'] == '1'){
						echo "Kế toán";
					}else if($rows['quyen'] == '2'){
						echo "Biên tập";
					}
					echo "
				</td>
                <td width='40px'>
					<a href='index.php?ql=ad&ac=sua&id={$rows['idad']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=ad&ac=xoa&id={$rows['idad']}' title='Xóa admin'>
					<script language='javascript'> 
						function CheckSure(){ 
						if( window.confirm('Bạn có chắc chắn xóa bỏ không?')){ 
						return true; 
						}else{ 
						return false 
						} 
						} 
						</script>
						<div class='admin-icon' style='background-image:url(public/img/icon/thungrac.png);'> </div>
					</a>
				</td>
            </tr>";
			}

            echo "<tr height='50px;'>
            	<td colspan='7'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=ad&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới&nbsp;&nbsp;</a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>
                        	 <a href='javascript:goback()'>Quay lại trang trước</a>
                        </div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
		}else if ($ac == 'add'){
			echo "
			<form method='post' action='model/m_admin.php' enctype='multipart/form-data' name='dangky'>
				
				<table width='380px' border='0'>
				<caption><p>THÊM MỚI ADMIN</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>Tên Admin: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' placeholder='&nbsp;&nbsp;Họ tên Admin !' /></td>
					</tr>
					<tr>
						<td><label for='taikhoan'>Tài khoản: </label></td>
						<td><input class = 'text' id='taikhoan' type='text' name = 'taikhoan' placeholder='&nbsp;&nbsp;Tài khoản !'/></td>
					</tr>
					<tr>
						<td><label for='pass'>Mật Khẩu: </label></td>
						<td><input class = 'text' id='pass' type='password' name = 'pass' placeholder=''/></td>
					</tr>
					<tr>
						<td><label for='repass'>Nhập lại mật Khẩu: </label></td>
						<td><input class = 'text' id='repass' type='password' name = 'repass' placeholder=''/></td>
					</tr>
					<tr>
						<td>Chức vụ: </td>
						<td>
							Toàn quyền <input type='radio' name = 'cv' value='0' checked ='checked '/>
							&nbsp;Kế toán <input type='radio' name = 'cv' value='1'/>
							&nbsp;Biên tập <input type='radio' name = 'cv' value='2'/>
						</td>
					</tr>
					<tr>
						<td>Ảnh đại diện: </td>
						<td><input type='file' name = 'img' /></td>
					</tr>
					<tr>
						<td><label id='bottom'></label>
</td>
						<td><input id='submit' type='submit' name = 'add' value='Thêm'/></td>
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
					   span.innerHTML ='Bạn chưa nhập thông tin!';
					  }else{
					  // Kiểm tra các trường hợp khác
					   if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='Email không hợp lệ (ví dụ: abc@gmail.com)';}
						var email =value;
					   }
					   if(id == 'confirm_email' && value != email){span.innerHTML ='Email nhập lại chưa đúng';}
					   // Kiểm tra password
					   if(id == 'pass'){
						if(value.length <7){span.innerHTML ='Password phải từ 8 ký tự';}
						var pass =value;
					   }
					   // Kiểm tra password nhập lại
					   if(id == 'repass' && value != pass){span.innerHTML ='Password nhập lại chưa đúng';}
					   // Kiểm tra số điện thoại
					   if(id == 'sdt' && isNaN(value) == true){span.innerHTML ='Số điện thoại phải là kiểu số';}
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
				";
		}else if ($ac == 'sua'){
			
			?>
			<form method='post' action='model/m_admin.php?id=<?php echo $id; ?>' enctype='multipart/form-data' name="update">
				<table  width='380px'>
					<tr>
						<td width='140px'>Tên Admin: </td>
						<td><input class = 'text' id='' type='text' name = 'ten' value = '<?php echo $rows['tenad']; ?>' /></td>
					</tr>
					<tr>
						<td>Tài khoản: </td>
						<td><input class = 'text' id='' type='text' name = 'taikhoan' value = '<?php echo $rows['usad']; ?>' readonly = 'readonly' style="background:#F0F0F0"/></td>
					</tr>
					
					<tr>
						<td><label for='pass'>Mật khẩu cũ:</label></td>
						<td><input class = 'text' id='pass' type='password' name = 'pass'/></td>
					</tr>
                    <tr>
						<td><label for='newpass'>Mật khẩu mới:</label></td>
						<td><input class = 'text' id='newpass' type='password' name = 'newpass' placeholder=''/></td>
					</tr>
                    <tr>
						<td><label for='repass'>Nhập lại mật khẩu mới:</label></td>
						<td><input class = 'text' id='repass' type='password' name = 'repass' placeholder=''/></td>
					</tr>
					<tr>
						<td>Chức vụ: </td>
						<td>
							Toàn quyền <input type='radio' name = 'cv' value='0' <?php if($rows['quyen'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;Kế toán <input type='radio' name = 'cv' value='1'  <?php if($rows['quyen'] == '1'){echo "checked ='checked' ";}?>/>
							&nbsp;Biên tập <input type='radio' name = 'cv' value='2'  <?php if($rows['quyen'] == '2'){echo "checked ='checked' ";}?>/>
						</td>
					</tr>
					<tr>
						<td>Ảnh đại diện: <img src="public/img/anh/<?php echo $rows['img'] ?>" width="40px" /></td>
						<td><input type='file' name = 'img' src="public/img/anh/<?php echo $rows['img'] ?>"/></td>
					</tr>
                    <tr>
						<td><label id='botton'></label></td>
						<td>
                        	
                            <input  id='submit' type='submit' name = 'sua' value='Sửa'/>
                            <a onClick='javascript: return CheckSure();' href='index.php?ql=ad&ac=v' title='Hủy thao tác'>
                            	<div class = 'admin-button'> <p>Hủy</p></div>
								<script language='javascript'> 
									function CheckSure(){ 
									if( window.confirm('Bạn có chắc chắn hủy không?')){ 
									return true; 
									}else{ 
									return false 
									} 
									} 
									</script>
                        	</a> 
                        </td>
					</tr>
				</table>
			</form>
            <script>
				  var inputs = document.forms['update'].getElementsByTagName('input');
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
					   if(id == 'email'){
						if(reg_mail.test(value) == false){ span.innerHTML ='Email không hợp lệ (ví dụ: abc@gmail.com)';}
						var email =value;
					   }
					   if(id == 'confirm_email' && value != email){span.innerHTML ='Email nhập lại chưa đúng';}
					   // Kiểm tra password
					   if(id == 'pass'){
						   var aaaa= md5(value) ; // kiem tra md5 của value
						   var bbbb = '<?php echo $rows['passad']?>'; // kiem tra gia tri bbbb
						if(aaaa != '<?php echo $rows['passad']?>' && value != ''){span.innerHTML ='Sai mật khẩu cũ ';}
						var pass = value;
					   }

					   if(id == 'newpass'){
						if(value.length < 8 && value != ''){span.innerHTML ='Mật khẩu phải trên 8 kí tự';}
						var pass =value;
					   }
					   // Kiểm tra password nhập lại
					   if(id == 'repass' && value != pass){span.innerHTML ='Password nhập lại chưa đúng';}
					   // Kiểm tra số điện thoại
					   if(id == 'sdt' && isNaN(value) == true){span.innerHTML ='Số điện thoại phải là kiểu số';}
					  
					 
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
	}

?>
<script>
                  		function goback() {
    					history.back(-1)
}
                  </script>

</div>
