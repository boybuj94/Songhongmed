<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/clipboard.js"></script>
<script>
	// Tạo nút copy
$(function(){
  new Clipboard('.copy-text');
});
</script>


<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=img&ac=v'>&nbsp;&nbsp;Img</a></p>
</div>
<div class='admin'>
	
<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			$num = mysqli_num_rows($img);
			$i = 1; ?>
			<table width="100%" border="0">
			   <CAPTION><p>DANH SÁCH IMG</p></CAPTION>
				<tr>
					<td>
			<select name='ajax' class="item">
				<option value="">Chọn mục để xem</option>
				<option value="1">Certificate</option>
				<option value="2">Catalog</option>
				<option value="3">Hoạt động</option>
				<option value="4">Training</option>
				<option value="5">HDSD</option>
			</select>
					</td>
				</tr>
			</table>
			<div id='view' style="background: #fff0b5;width: 100%;float: left;">
			</div>
			
			<?php // Hiển thị danh sách ảnh
			while($rows = mysqli_fetch_array($img)){
				$url = "<img src =admin-vm2017/{$rows['img']}>";
			echo "

			<div class = 'admin-listimg'>
	    		<div class = 'admin-list-img' style = 'background-image:url({$rows['img']})'>

	    		</div>
	    		<div class = 'admin-title-img'>
	    			<p>{$rows['tieude']}</p>
	    			<p style = 'font-weight:bold;color:#005e99;'>";
					if($rows['tags'] == '0'){
						echo "Certificate";
					}else if($rows['tags'] == '1'){
						echo "Catalog";
					}else if($rows['tags'] == '2'){
						echo "Hoạt đông";
					}
					else if($rows['tags'] == '3'){
						echo "Training";
					}
					else if($rows['tags'] == '4'){
						echo "HDSD";
					}
					
				echo "</p>
	    			<p>";
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				echo "</p>
	    		</div>
	    		<a class='copy-text' data-clipboard-target='#p{$i}' href='javascript:void(0);'><i class='fa fa-files-o'></i>
	    			<div class = 'admin-list-icon' style='background-image: url(public/img/icon/icon-copy2.png);'>
	    			</div>
	    		</a>
	    		<textarea class='code' id='p{$i}' rows='4' cols = '30'>{$url}</textarea>
	    	</div>
	    		";
	    		$i++;
			}
			echo "
			<table width = '100%'>
			<tr height='50px;'>
            	<td colspan='8'>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=img&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới </a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=img&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=img&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=img&ac=v&page={$page}'> Next</a>";
									  }
                        echo "</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";

							// -----------THÊM IMG---------------------
			
		}else if ($ac == 'add'){
			$date = date('Y/m/d');
		?>
					  <form method='post' action='model/m_img.php' enctype='multipart/form-data'>
				  <table>
			   <CAPTION><p>THÊM IMG</p></CAPTION>
				  <tr>
					  <td>Chọn IMG: </td>
						  
					  <td><input id='file' type='file' name = 'img'  onchange='return fileValidation()'/>
							<div id='imagePreview'></div>
					</td>
					  
				  </tr>
				  <tr>
					  <td>Tiêu Đề:</td>
					  <td><input type = 'text' name ='tieude'/></td>
				  </tr>
				  <tr>
					  <td>Item:</td>
					  <td>Hoạt động&nbsp;&nbsp;<input type = 'radio' value='0' name ='tags' checked='checked'/>
					  	&nbsp;&nbsp;&nbsp; Training&nbsp;&nbsp;<input type = 'radio' value='1' name ='tags'/>
					  	&nbsp;&nbsp;&nbsp; HDSD&nbsp;&nbsp;<input type = 'radio' value='2' name ='tags'/>
					  	&nbsp;&nbsp;&nbsp; Certificate&nbsp;&nbsp;<input type = 'radio' value='3' name ='tags'/>
					 &nbsp;&nbsp;&nbsp; Catalog&nbsp;&nbsp;<input type = 'radio' value='4' name ='tags'/></td>
				  </tr>

				  <tr>
					  <td>Ngôn ngữ:</td>
					  <td>VN_vi&nbsp;&nbsp;<input type = 'radio' value='0' name ='nn' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; EN_en&nbsp;&nbsp;<input type = 'radio' value='1' name ='nn'/></td>
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
				
				// ----------------- SỬA IMG --------------
				
		}else if ($ac == 'sua'){
			?>
			<form method='post' action='model/m_img.php?id=<?php echo $rows['idimg'] ?>' enctype='multipart/form-data' name="update">			
                  <table>
               <CAPTION><p>THÊM TIN TỨC</p></CAPTION>
                  <tr>
                      <td>Ảnh:</td>
                          
                      <td><img src="<?php echo $rows['img']; ?>" width="100px"/><input type = 'file' name = 'img'></td>
                      
                  </tr> 
                  <tr>
                      <td>Tiêu Đề:</td>
                      <td><input type = 'text' name ='tieude' value='<?php echo $rows['tieude'] ?>'/></td>
                  </tr>
                  <tr>
					  <td>Item:</td>
					  <td>Hoạt động&nbsp;&nbsp;<input type = 'radio' value='0' name ='tags' <?php if($rows['tags'] == '0'){echo "checked ='checked' ";}?>/>
					  	&nbsp;&nbsp;&nbsp; Training&nbsp;&nbsp;<input type = 'radio' value='1' name ='tags' <?php if($rows['tags'] == '1'){echo "checked ='checked' ";}?> />
					  	&nbsp;&nbsp;&nbsp; HDSD&nbsp;&nbsp;<input type = 'radio' value='2' name ='tags' <?php if($rows['tags'] == '2'){echo "checked ='checked' ";}?> />
					  	&nbsp;&nbsp;&nbsp; Certificate&nbsp;&nbsp;<input type = 'radio' value='3' name ='tags' <?php if($rows['tags'] == '3'){echo "checked ='checked' ";}?> />
					 &nbsp;&nbsp;&nbsp; Catalog&nbsp;&nbsp;<input type = 'radio' value='4' name ='tags' <?php if($rows['tags'] == '4'){echo "checked ='checked' ";}?> /></td>
				  </tr
                  <tr>
                      <td>
							VI_vn &nbsp;&nbsp;<input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;EN_en &nbsp;&nbsp;<input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
                  </tr>
                  <tr>
                      <td></td>
                      <td> <input type ='submit' name = 'sua' value = 'Sửa'/>
                      <a onClick='javascript: return CheckSure();' href='index.php?ql=img&ac=v' title='Hủy thao tác'>
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
<script src="public/js/load.js" type="text/javascript"></script>