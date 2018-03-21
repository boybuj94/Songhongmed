<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;&nbsp;&nbsp;Other&nbsp;&nbsp;&rsaquo;<a href='index.php?ql=nsp&ac=v'>&nbsp;&nbsp;Menu sản phẩm</a></p>
</div>
<div class='admin'>
<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			echo "
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1'>
    		<caption><p>MENU SẢN PHẨM</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='40px'>STT</td>
				<td width='100px'></td>
                <td>Tên menu</td>
                <td>Info</td>
                <td width='150px'>Ngôn ngữ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$num = mysqli_num_rows($danhmuc);
			$i =1;
			while($rows = mysqli_fetch_array($danhmuc)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td><div class='admin-img' style='background-image:url(public/img/anh/{$rows['img']}); border-radius:1px; width:80px'></div>
					<div class='img-hover'><img src = 'public/img/anh/{$rows['img']}' width = '300px' /> adsadas</div>
				</td>
                <td>{$rows['tendm']}</td>
                 <td>{$rows['link_title']}</td>
                <td>";
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					echo "
				</td>
                <td width='40px'>
					<a href='index.php?ql=nsp&ac=sua&id={$rows['iddm']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=nsp&ac=xoa&id={$rows['iddm']}' title='Xóa admin'>
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
			$i++;
			}
			
            echo "<tr height='50px;'>
            	<td colspan='7'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=nsp&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới&nbsp;&nbsp;</a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>
                        	
                        </div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
							// -----------THÊM menu---------------------
			
		}else if ($ac == 'add'){
			echo "
			<form method='post' action='model/m_danhmuc.php' enctype='multipart/form-data' name='dangky'>
				
				<table width='380px' border='0'>
				<caption><p>THÊM MỚI MENU SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>Tên menu: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' placeholder='&nbsp;&nbsp;Tên menu !' /></td>
					</tr>
					<!--<tr>
						<td  width = '120px'>Info: </td>
						<td><input type='text' name = 'info' placeholder='&nbsp;&nbsp;Info !' /></td>
					</tr>-->
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							Vi_vn <input type='radio' name = 'nn' value='0' checked ='checked '/>
							&nbsp;&nbsp;&nbsp;En_en <input type='radio' name = 'nn' value='1'/>
						</td>
					</tr>
					<tr>
						<td>Ảnh menu: </td>
						<td><input type='file' name = 'img' /></td>
					</tr>
					<tr>
						<td><label id='botton'></label>
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
				
				// ----------------- SỬA menu --------------
				
		}else if ($ac == 'sua'){
			
			?>
			<form method='post' action='model/m_danhmuc.php?id=<?php echo $id; ?>' enctype='multipart/form-data' name="update">
				<table  width='380px'>
					<tr>
						<td  width = '120px'><label for='ten'>Tên menu: </label></td>
						<td><input class = 'text' id='' type='text' name = 'ten' value = '<?php echo $rows['tendm']; ?>' /></td>
					</tr>

					<!-- <tr>
						<td  width = '120px'>Info: </td>
						<td><input name = 'info' type='text' value = '<?php echo $rows['info']; ?>' /></td>
					</tr> -->
					
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							vi <input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;en <input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
					</tr>
					<tr>
						<td>Ảnh menu: <img src="public/img/anh/<?php echo $rows['img'] ?>" width="40px" /></td>
						<td><input type='file' name = 'img' src="public/img/anh/<?php echo $rows['img'] ?>"/></td>
					</tr>
                    <tr>
						<td><label id='botton'></label></td>
						<td>
                        	
                            <input  id='submit' type='submit' name = 'sua' value='Sửa'/>
                            <a onClick='javascript: return CheckSure();' href='index.php?ql=nsp&ac=v' title='Hủy thao tác'>
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
					 
					 for(var i=0; i<inputs.length; i++){
					  var value = inputs[i].value;
					  var id = inputs[i].getAttribute('id');
					 
					  // Tạo phần tử span lưu thông tin lỗi
					  var span = document.createElement('span');
					  // Nếu span đã tồn tại thì remove
					  var p = inputs[i].parentNode;
					  if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}
					  // Kiểm tra các trường hợp khác
					   if(id == 'ten'){
						if(value == ''){ span.innerHTML ='Bạn cần nhập lại thông tin';}
						var email =value;
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
	}
}else {
	echo $thongbao;	
}
?>


</div>
