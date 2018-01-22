
<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=sp&ac=v'>&nbsp;&nbsp;Sản phẩm</a></p>
</div>
<div class='admin'>

<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
	if(isset($_REQUEST['ac']) || isset($_REQUEST['search'])){
		@$ac = $_REQUEST['ac'];
		error_reporting(0);
		if($ac == 'v' || isset($_REQUEST['search'])){ ?>
			
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1' >
    	<thead>
    		<caption><p>DANH SÁCH SẢN PHẨM</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='30px'>STT</td>
				<td width='210px'>Tên sản phẩm</td>
                <td>Mã SP</td>
				<td width='70px'>Hãng SX</td>
				
				<td>

				<select name='ajax' class="loaisp">
					<option value="">Menu Sản Phẩm</option>
					<?php 
					$sql3 = "SELECT tendm,iddm FROM danhmuc WHERE iddm in (SELECT sanpham.iddm FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm)";
					$sanpham3 = mysqli_query($con,$sql3);
					while($rows3 = mysqli_fetch_array($sanpham3)){
						echo "<option value='{$rows3[iddm]}'>{$rows3[tendm]}</option>";	
					} ?>
				</select>
				</td>
				<td>Độc Quyền</td>				
                <td width = '100px'>
                <select name='ajax' class="lang">
					<option value="">Ngôn ngữ</option>
					<option value="0">Tiếng Việt</option>
					<option value="1">English</option>
				</select></td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>
		</thead>
	<?php if (isset($_REQUEST['id']) && isset($_REQUEST['ac'])) {// nếu không có biến id từ ajax thì hiển thị danh sách bt

		echo "<style> .list {display:none;} .list_ajax {display:block;}</style>";
	}
	?> 
		<tbody class='list_ajax' id='view' style="background: #fff0b5">
		</tbody>

		<tbody class='list'>
            <?php
			
			$i =1;
			while($rows = mysqli_fetch_array($sanpham)){
				$str = substr($rows['thongtin'], 0, 100);
				$string = strip_tags( $str);
				$str2 = substr($rows['baiviet'], 0, 100);
				$string2 = strip_tags( $str2 );
				$string3 = substr($rows['tag'], 0, 50);
            ?><tr>
				<td  style='text-align:center;'><?php echo $i; ?></td>
            	<td style='font-size:11px'><a href = 'index.php?ql=sp&ac=ct&id=<?php echo $rows['idsp']?>'><?php echo $rows['tensp']?></a></td>
                <td style='font-size:11px'><?php echo $rows['masp']?></td>
                <td style='font-size:11px'><?php echo $rows['hangsp']?></td>   
				<td style='font-size:11px'><?php echo $rows['tendm']?></td>          
				<td>
							<?php if($rows['noibat'] == '0'){
								echo "Mặc định";
								}else {
									echo "Độc Quyền";
								}
							?>
							
							
						</td>
				<td>
				
				<?php	
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				?>
				</td>
                <td width='40px'>
					<a href='index.php?ql=sp&ac=sua&id=<?php echo $rows['idsp']?>' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=sp&ac=xoa&id=<?php echo $rows['idsp']?>' title='Xóa admin'>
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
            </tr>
            </tbody>
            
            <?php
			$i++;
			} 

            echo "<tr height='50px;'>
            	<td colspan='12'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=sp&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới&nbsp;&nbsp;</a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=sp&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=sp&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=sp&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
						<div class='admin-search'>
							<form style='padding:0px;background:none;width:100%'>
                				<input type='text' name='text_s' placeholder='&nbsp;Tìm sản phẩm'/>
                    			<input type='submit' name='search' value='Tìm' />
               				 </form>
						</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
		error_reporting(0);	
							// -----------THÊM sản phẩm---------------------
			
		}else if ($ac == 'add'){
			?>
			<form method='post' action='model/m_sanpham.php' enctype='multipart/form-data' name='dangky'>
				
				<table border='0'>
				<caption><p>THÊM MỚI SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>Tên sản phẩm: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Mã sản phẩm: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ma' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Hãng sản xuất: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'hang' /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Menu sản phẩm: </label></td>
						<td>
                        <select name = 'dm'>
							<?php
								$loai2 = 'SELECT iddm,tendm FROM danhmuc order by ngonngu asc';
								$ketqua = mysqli_query($con,$loai2);
								while($dong = mysqli_fetch_array($ketqua)){
			 				?>
								<option value="<?php echo $dong['iddm']; ?>" >
            	
								<?php echo $dong['tendm']; ?>
            					</option>
							<?php } ?>
						</select>
						</td>
					</tr>
					<tr>
						<td  width = '120px'>Bài viết: </td>
						<td><textarea name='bv' cols = '45' rows = '10' ></textarea></td>
					</tr>
					<tr>
						<td  width = '120px'>Thông số: </td>
						<td style='margin-top:50px;'><textarea name='thongtin' cols = '45' rows = '10' ></textarea></td>
					</tr>
				  <script type="text/javascript">

						CKEDITOR.replace( 'thongtin' );

					</script>
				  	<script type="text/javascript">
						CKEDITOR.replace( 'bv' );

					</script>
					<tr>
						<td>Độc Quyền: </td>
						<td>
							Mặc định <input type='radio' name = 'nb' value='0' checked ='checked '/>
							&nbsp;&nbsp;&nbsp;Độc Quyền <input type='radio' name = 'nb' value='1'/>
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
						<td>Ảnh sản phẩm: </td>
						<td><input id='file' type='file' name = 'img'  onchange='return fileValidation()'/>
							<div id='imagePreview'></div>
						</td>
					</tr>
					<tr>
						<td><label id='botton'></label>
</td>
						<td><input id='submit' type='submit' name = 'add' value='Thêm' onclick="gettext()"/></td>
					</tr>
				</table>
				<script>
			 function fileValidation(){
					var fileInput = document.getElementById('file');
					var filePath = fileInput.value;//lấy giá trị input theo id
					var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
					//Kiểm tra định dạng
					if(!allowedExtensions.exec(filePath)){
					document.getElementById('imagePreview').innerHTML = '<p style = "color:red;">Vui lòng chọn file có định dạng .jpg|\.jpeg|\.png|\.gif<p>';
					fileInput.value = '';
					return false;
				
					}else{
					//Image preview
					if (fileInput.files && fileInput.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
					document.getElementById('imagePreview').innerHTML = '<img style="width:100px;padding-top:10px;" src="'+e.target.result+'"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
					}
					}
					}
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

					   if(id == 'ten'){
						if(value == ''){span.innerHTML ='Bạn phải nhập thông tin vào đây!';}
						var pass =value;
					   }
					   if(id == 'file'){
						if(value == ''){span.innerHTML ='Vui lòng chọn ảnh!';}
						var pass =value;
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
					 
				  </script>
			</form>
			
				<?php
				
				// ----------------- SỬA sản phẩm --------------
				
		}else if ($ac == 'sua'){
			?>
			<form method='post' action='model/m_sanpham.php?id=<?php echo $id; ?>' enctype='multipart/form-data' name="update">			
				<table border='0'>
				<caption><p>SỬA SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'><label for='ten'>Tên sản phẩm: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ten' value="<?php echo $rows['tensp'] ?>" /></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Mã sản phẩm: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'ma' value="<?php echo $rows['masp'] ?>"/></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Hãng sản xuất: </label></td>
						<td><input class = 'text' id='ten' type='text' name = 'hang' value="<?php echo $rows['hangsp'] ?>"/></td>
					</tr>
					
                    <tr>
                    	<td>Menu sản phẩm: </td>
                        <td>
                        	<select name = 'dm'>
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
						<td  width = '120px'><label for='ten'>Thông tin: </label></td>
						<td><textarea name='thongtin' cols = '25' rows = '10' ><?php echo $rows['thongtin'] ?></textarea></td>
					</tr>
					<tr>
						<td  width = '120px'><label for='ten'>Bài viết: </label></td>
						<td><textarea name='bv' cols = '25' rows = '10' ><?php echo $rows['baiviet'] ?></textarea></td>
					</tr>
					<script type="text/javascript">

						CKEDITOR.replace( 'thongtin' );

					</script>
				  	<script type="text/javascript">
						CKEDITOR.replace( 'bv' );

					</script>
					<tr>
						<td>Độc Quyền: </td>
						<td>
							Mặc định <input type='radio' name = 'nb' value='0' <?php if($rows['noibat'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;Độc Quyền <input type='radio' name = 'nb' value='1'  <?php if($rows['noibat'] == '1'){echo "checked ='checked' ";}?>/>
							
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
						<td>Ảnh sản phẩm: </td>
						<td><img  src="public/img/anh/<?php echo $rows['img'] ?> " width="80px"/><input type='file' name = 'img' /></td>
					</tr>
						<td><label id='botton'></label></td>
						<td>
                        	
                            <input  id='submit' type='submit' name = 'sua' value='Sửa'/>
                            <a onClick='javascript: return CheckSure();' href='index.php?ql=sp&ac=v' title='Hủy thao tác'>
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
           
<?php
		}else if($ac == 'ct'){ // xem chi tiết sản phẩm ?>
			<table border='0' style="padding:10px">
				<caption><p>CHI TIẾT SẢN PHẨM</p></caption>
					<tr>
						<td  width = '120px'>Tên sản phẩm: </td>
						<td><?php echo $rows['tensp'] ?></td>
					</tr>
					<tr>
						<td  width = '120px'>Mã sản phẩm:</td>
						<td><?php echo $rows['masp'] ?></td>
					</tr>
					<tr>
						<td  width = '120px'>Hãng sản xuất:</td>
						<td><?php echo $rows['hangsp'] ?></td>
					</tr>
					
                    <tr>
                    	<td>Menu sản phẩm: </td>
                        <td>
                        	
                            <?php
                              $rows['tendm'];
				 			 ?>
							
                        </td>
                    </tr>
					<tr>
						<td  width = '120px'>Thông tin:</td>
						<td><?php echo $rows['thongtin'] ?></td>
					</tr>
					<tr>
						<td  width = '120px'>Bài viết: </td>
						<td style="border-top:1px solid #999;padding-top:20px"><?php echo $rows['baiviet'] ?></td>
					</tr>
					
					<tr>
						<td>Sản phẩm: </td>
						<td>
							<?php if($rows['noibat'] == '0'){
								echo "Mặc định";
								}else {
									echo "Độc Quyền";
								}
							?>
							
							
						</td>
					</tr>
					
					<tr>
						<td>Ngôn ngữ: </td>
						<td>
							<?php if($rows['ngonngu'] == '0'){
								echo "Tiếng Việt - Vi";
								}else {
									echo "English - En";
								}
							?>
							
							
						</td>
					</tr>
					<tr>
						<td>Ảnh sản phẩm: </td>
						<td><img  src="public/img/anh/<?php echo $rows['img'] ?> " width="200px"/></td>
					</tr>
						<td></td>
						<td>
                        	
                            <a onClick='javascript: return CheckSure();' href='index.php?ql=sp&ac=sua&id=<?php echo $id; ?>' title='Sửa sản phẩm'>
                            	<div class = 'admin-button'> <p>Sửa</p></div>
								<script language='javascript'> 
									function CheckSure(){ 
									if( window.confirm('Bạn có chắc chắn sửa sản phẩm này không?')){ 
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
		<?php }
	}
}else {
	echo $thongbao;	
}
?>


</div>
<script src="public/js/load.js" type="text/javascript"></script>