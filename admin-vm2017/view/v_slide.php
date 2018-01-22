
<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=sl&ac=v'>&nbsp;&nbsp;Slide</a></p>
</div>
<div class='admin'>
<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			echo "
    	<table width='100%'  cellpadding='0' cellttacing='0' border='1' >
    		<caption><p>DANH SÁCH SLIDE</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='50px'>STT</td>
				<td>Slide</td>
				<td>Tiêu đề</td>
				<td width = '30%'>Tags</td>
				<td>Link</td>
                <td>Ngôn ngữ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$i =1;
			$num = mysqli_num_rows($slide);
			while($rows = mysqli_fetch_array($slide)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td><img src = '{$rows['img']}' width = '100px'/></td>
				<td>{$rows['tieude']}</td>
                        
                <td>{$rows['tags']}</td>
				<td>{$rows['link']}</td>
				<td>";
				
					
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				echo "</td>
                <td width='40px'>
					<a href='index.php?ql=sl&ac=sua&id={$rows['idsl']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=sl&ac=xoa&id={$rows['idsl']}' title='Xóa slide'>
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
            	<td colspan='8'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=sl&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới </a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>
                        	
                        </div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
							// -----------THÊM SLIDE---------------------
			
		}else if ($ac == 'add'){
			$date = date('Y/m/d');
		?>
					  <form method='post' action='model/m_slide.php' enctype='multipart/form-data'>
				  <table>
			   <CAPTION>THÊM SLIDE</CAPTION>
				  <tr>
					  <td>Chọn slide: </td>
						  
					  <td><input id='file' type='file' name = 'img'  onchange='return fileValidation()'/>
							<div id='imagePreview'></div></td>
					  
				  </tr>
				  <tr>
					  <td>Tiêu Đề:</td>
					  <td><input type = 'text' name ='tieude'/></td>
				  </tr>		
				  <tr>
					  <td>Link: </td>
					  <td><input type = 'text' name ='link'/></td>
				  </tr>
				  	  
				  <tr>
					  <td>Tags:</td>
					  <td><input type = 'text' name ='tag'/></td>
				  </tr>
				  <tr>
					  <td>Ngôn ngữ:</td>
					  <td>VN_vi<input type = 'radio' value='0' name ='nn' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; EN_en<input type = 'radio' value='1' name ='nn'/></td>
				  </tr>
				  <tr>
					  <td></td>
					  <td> <input type ='submit' name = 'add' value = 'Thêm'/></td>
				  </tr>
			  </table>
			 
			</form>
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
					document.getElementById('imagePreview').innerHTML = '<img style="width:200px;padding-top:10px;" src="'+e.target.result+'"/>';
					};
					reader.readAsDataURL(fileInput.files[0]);
					}
					}
					}
					</script>
			<?php
				
				// ----------------- SỬA slide --------------
				
		}else if ($ac == 'sua'){
			?>
			<form method='post' action='model/m_slide.php?id=<?php echo $rows['idsl'] ?>' enctype='multipart/form-data' name="update">			
                  <table>
               <CAPTION>THÊM TIN TỨC</CAPTION>
                  <tr>
                      <td>Ảnh:</td>
                          
                      <td><img src="<?php echo $rows['img']; ?>" width="100px"/><input type = 'file' name = 'img'></td>
                      
                  </tr> 
                  <tr>
                      <td>Tiêu Đề:</td>
                      <td><input type = 'text' name ='tieude' value='<?php echo $rows['tieude'] ?>'/></td>
                  </tr>
                  <tr>
					  <td>Tags:</td>
					  <td><input type = 'text' name ='tag' value='<?php echo $rows['tags']; ?>'/></td>
				  </tr>
                  <tr>
					  <td>Link:</td>
					  <td><input type = 'text' name ='link' value='<?php echo $rows['link']; ?>'/></td>
				  </tr>
                  <tr>
                      <td>
							VI_vn <input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;EN_en <input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
                  </tr>
                  <tr>
                      <td></td>
                      <td> <input type ='submit' name = 'sua' value = 'Sửa'/>
                      <a onClick='javascript: return CheckSure();' href='index.php?ql=sl&ac=v' title='Hủy thao tác'>
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
		}
	}
}else{
	echo $thongbao;	
}
?>


</div>
