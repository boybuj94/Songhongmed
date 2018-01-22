<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;&nbsp;&nbsp;Other&nbsp;&nbsp;&rsaquo;<a href='index.php?ql=lsp&ac=v'>&nbsp;&nbsp;Nhóm sản phẩm</a></p>
</div>
<div class='admin'>
<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			?>
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1'>
    		<caption><p>DANH SÁCH LOẠI SẢN PHẨM</p></caption>
            <thead>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='40px'>STT</td>
            	<td>Tên danh mục</td>
                <td>
				<select name='ajax' class="loai">
					<option value="">Danh mục sản phẩm</option>
					<?php 
					$sql4 = "SELECT tendm,iddm FROM danhmuc WHERE iddm in (SELECT loai.iddm FROM loai,danhmuc WHERE loai.iddm=danhmuc.iddm)";
					$sanpham4 = mysqli_query($con,$sql4);
					while($rows4 = mysqli_fetch_array($sanpham4)){
						echo "<option value='{$rows4['iddm']}'>{$rows4['tendm']}</option>";	
					} ?>
				</select>
				</td>
                <td>
                <select name='ajax' class="lang_l">
					<option value="">Ngôn ngữ</option>
					<option value="0">Tiếng Việt</option>
					<option value="1">English</option>
				</select></td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>
            </thead>
            <tbody id="view" style="background: #fff0b5">
            </tbody>
            <tbody>
            <?php
			$num = mysqli_num_rows($loai);
			$i =1;
			while($rows = mysqli_fetch_array($loai)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
                <td>{$rows['tenloai']}</td>
                <td>{$rows['tendm']}</td>
                <td>";
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					echo "
				</td>
                <td width='40px'>
					<a href='index.php?ql=lsp&ac=sua&id={$rows['idloai']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=lsp&ac=xoa&id={$rows['idloai']}' title='Xóa admin'>
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
			}?>
			</tbody>
            <?php
            echo "<tr height='50px;'>
            	<td colspan='7'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=lsp&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới&nbsp;&nbsp;</a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=lsp&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=lsp&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=lsp&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
							// -----------THÊM loại sản phẩm---------------------
			
		}else if ($ac == 'add'){
			echo "
			<form method='post' action='model/m_loaisp.php' enctype='multipart/form-data' name='dangky'>
				
				<table width='380px' border='0'>
				<caption><p>THÊM MỚI LOẠI SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>Tên loại sản phẩm: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' placeholder='&nbsp;&nbsp;Tên loại sản phẩm !' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Danh mục sản phẩm: </label></td>
						<td>";?><select name = 'danhmuc'>
							<?php
								$danhmuc = 'SELECT iddm,tendm FROM danhmuc order by ngonngu asc';
								$ketqua = mysqli_query($con,$danhmuc);
								while($dong = mysqli_fetch_array($ketqua)){
			 				?>
								<option value="<?php echo $dong['iddm']; ?>" >
            	
								<?php echo $dong['tendm']; ?>
            					</option>
							<?php } 
						echo "</select>
						</td>
					</tr>
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							Vi_vn <input type='radio' name = 'nn' value='0' checked ='checked '/>
							&nbsp;&nbsp;&nbsp;En_en <input type='radio' name = 'nn' value='1'/>
						</td>
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
		}else if ($ac == 'sua'){
			
			?>
			<form method='post' action='model/m_loaisp.php?id=<?php echo $id; ?>' enctype='multipart/form-data' name="update">
				<table  width='380px'>
					<tr>
						<td  width = '120px'><label for='ten'>Tên loại sản phẩm: </label></td>
						<td><input class = 'text' id='' type='text' name = 'ten' value = '<?php echo $rows['tenloai']; ?>' /></td>
					</tr>
                    <tr>
                    	<td>
                        	<select name = 'danhmuc'>
                            <?php
                              $danhmuc = 'SELECT * FROM danhmuc';
                              $ketqua = mysqli_query($con,$danhmuc);
                                  echo "<option value='{$rows['iddm']}' selected='selected'>{$rows['tendm']}</option>";
								while($dong2 = mysqli_fetch_array($ketqua)){
									echo "<option value='{$dong2['iddm']}'>{$dong2['tendm']}</option> ";
				 				} ?>
							</select>
                        </td>
                    </tr>
					
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							VI_vn <input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;EN_en <input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
					</tr>
                    <tr>
						<td><label id='botton'></label></td>
						<td>
                        	
                            <input  id='submit' type='submit' name = 'sua' value='Sửa'/>
                            <a onClick='javascript: return CheckSure();' href='index.php?ql=lsp&ac=v' title='Hủy thao tác'>
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
<script src="public/js/load.js" type="text/javascript"></script>