<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/clipboard.js"></script>
<script>
	// Tạo nút copy
$(function(){
  new Clipboard('.copy-text');
});
</script>
<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=tt&ac=v'>&nbsp;&nbsp;DỊCH VỤ</a></p>
</div>
<div class='admin'>
<?php
if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){

	if(isset($_REQUEST['ac']) || isset($_REQUEST['search_t'])){
		@$ac = $_REQUEST['ac'];
		error_reporting(0);
		if($ac == 'v' || isset($_REQUEST['search_t'])){
			echo "
    	<table width='100%'  cellpadding='0' cellttacing='0' border='1' >
    		<caption><p>DANH SÁCH DỊCH VỤ</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='50px'>STT</td>
				<td>Tiêu đề</td>
				<td>Danh mục</td>
				<td>Ảnh</td>
                <td>Ngôn ngữ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$i =1;
			$num = mysqli_num_rows($tintuc);
			while($rows = mysqli_fetch_array($tintuc)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td>{$rows['tieude']}<a href = 'index.php?ql=tt&ac=ct&id={$rows['idtin']}'> ...xem chi tiết</a></td>
                        
                <td>{$rows['tags']}</td>
				<td><a href = 'index.php?ql=tt&ac=tt&id={$rows['idtin']}'>Xem ảnh</a></td>
				<td>";
				
					
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				echo "</td>
                <td width='40px'>
					<a href='index.php?ql=tt&ac=sua&id={$rows['idtin']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=tt&ac=xoa&id={$rows['idtin']}' title='Xóa admin'>
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
                    	<div class='admin-add'><a href='index.php?ql=tt&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới </a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=tt&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=tt&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=tt&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
						<div class='admin-search'>
							<form style='padding:0px;background:none;width:100%;'>
                				<input type='text' name='text_s' placeholder='&nbsp;Tìm kiếm câu hỏi'/>
                    			<input type='submit' name='search_t' value='Tìm' />
               				 </form>
						</div>
                    </div>
                </td>
                
            </tr>
			
			
    	</table>";
			
							// -----------THÊM Tin---------------------
			
		}else if ($ac == 'add'){
			$date = date('Y/m/d');
			echo "
					  <form method='post' action='model/m_tintuc.php' enctype='multipart/form-data'>
				  <table>
			   <CAPTION><p>THÊM DỊCH VỤ</p></CAPTION>
				  <tr>
					  <td width = '120px' >Tiêu Đề:</td>
					  <td colspan = '2'><input type = 'text' name ='tieude'/></td>
				  </tr>
				  <tr>
					  <td>Tóm Tắt:</td>
					  <td colspan = '2'><textarea name='tomtat' cols = '35' rows = '3' ></textarea></td>
				  </tr>
					  <tr>
					  <td>Nội Dung:</td>
					  <td colspan = '2'><textarea name='noidung' cols = '35' rows = '14' ></textarea></td>
				  </tr>";
				  ?>
				  <script type="text/javascript">

						CKEDITOR.replace( 'tomtat' );

					</script>
				  	<script type="text/javascript">
						CKEDITOR.replace( 'noidung' );

					</script>

				  <?php echo "<tr>
					  <td>Ảnh:</td>	  
					  <td>
					  	<input type = 'file' name = 'img' onchange='return fileValidation()'>
					  </td>

					  <td width='500px'>
					  	<select name='ajax' class='item'>
							<option value=''>Chọn mục để xem</option>
							<option value='1'>Certificate</option>
							<option value='2'>Catalog</option>
							<option value='3'>Hoạt động</option>
							<option value='4'>Training</option>
							<option value='5'>HDSD</option>
						</select>
					  </td> 
				  </tr>
				  <tr>
					  <td>Đề Mục:</td>
					  <td>Hoạt động <input type = 'radio' value='0' name ='tag' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; Training <input type = 'radio' value='1' name ='tag' />
					  &nbsp;&nbsp;&nbsp; HDSD <input type = 'radio' value='2' name ='tag'/>
					  &nbsp;&nbsp;&nbsp; Giới thiệu <input type = 'radio' value='3' name ='tag'/>
					  &nbsp;&nbsp;&nbsp; Question <input type = 'radio' value='4' name ='tag'/></td>

					  <td rowspan = '3' width='500px'>
					  	<style>
					  		.admin-listimg {
					  			height: 80px;
					  			background-color: white;
					  		}
					  		.admin-list-img {
					  			height:75px;
					  		}
					  		.admin-title-img{
					  			display: none;
					  		}
					  	</style>
					  	<div id='view' style='background: #fff0b5;width: 100%;float: left;'>
						</div>
					  </td>

				  </tr>
				  <tr>
					  <td>Ngôn ngữ:</td>
					  <td>VN_vi <input type = 'radio' value='0' name ='nn' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; EN_en <input type = 'radio' value='1' name ='nn'/></td>
				  </tr>
				  <tr>
					  <td>Thời gian: </td>
					  <td><input type = 'text' name ='thoigian' value = '{$date}'/>	</td>
				  </tr>
				  <tr>
					  <td></td>
					  <td> <input type ='submit' name = 'add' value = 'Thêm'/></td>
				  </tr>
			  </table>
			 
			</form>";
				
				// ----------------- SỬA DỊCH VỤ --------------
				
		}else if ($ac == 'sua'){
			?>
			<form method='post' action='model/m_tintuc.php?id=<?php echo $rows['idtin'] ?>' enctype='multipart/form-data' name="update">			
                  <table>
               <CAPTION><p>SỬA THÊM DỊCH VỤ<p></CAPTION>
                  <tr>
                      <td width = '120px'>Tiêu Đề:</td>
                      <td colspan = '2'><input type = 'text' name ='tieude' value='<?php echo $rows['tieude'] ?>'/></td>
                  </tr>
                  <tr>
                      <td>Tóm Tắt:</td>
                      <td colspan = '2'><textarea name='tomtat' cols = '35' rows = '3' ><?php echo $rows['tomtat']; ?></textarea></td>

                     <script type="text/javascript">

						CKEDITOR.replace( 'tomtat' );

					</script>

                  </tr>
                      <tr>
                      <td>Nội Dung:</td>
                      <td colspan = '2'>
                      	<select onchange="createEditor( this.value );" id="languages">
				            <option value="en-gb">English (United Kingdom)</option>
				            <option value="vi" selected="selected">Vietnamese </option>
				         </select>
                      	<textarea name='noidung' cols = '35' rows = '14' ><?php echo $rows['noidung']; ?></textarea></td>
                  </tr>
                  <script>
			            var editor;
			             
			            function createEditor( languageCode ) {
			                if ( editor )
			                    editor.destroy();          
			       
			                // Thay thế <textarea id="editor1" với một CKEditor, sử dụng cấu hình mặc định
			                editor = CKEDITOR.replace( 'noidung', {
			                    language: languageCode,
			             
			                    on: {
			                        instanceReady: function() {
			                     
			                            // Chờ cho tới khi editor sẵn sàng để sét language.
			                            var languages = document.getElementById( 'languages' );
			                            languages.value = this.langCode;
			                            languages.disabled = false;
			                        }
			                    }
			                });
			            }          
			           
			            // Tại thời điểm bắt đầu, tải ngôn ngữ mặc định.
			            createEditor( '' );
			             
         			</script>
                  <tr>
                      <td>Ảnh:</td>     
                      <td><img src="<?php echo $rows['img']; ?>" width="100px"/>
                      	<input type = 'file' name = 'img'  onchange='return fileValidation()'></td> 
                      <td width='500px'>
					  	<select name='ajax' class='item'>
							<option value=''>Chọn mục để xem</option>
							<option value='1'>Certificate</option>
							<option value='2'>Catalog</option>
							<option value='3'>Hoạt động</option>
							<option value='4'>Training</option>
							<option value='5'>HDSD</option>
						</select>
					  </td> 
                      
                  </tr>
                  <tr>
					  <td>Đề Mục:</td>
					  <td>Hoạt động <input type = 'radio' value='0' name ='tag' <?php if($rows['tags'] == '0'){echo "checked ='checked' ";}?>/>
					 &nbsp;&nbsp;&nbsp; Training <input type = 'radio' value='1' name ='tag' <?php if($rows['tags'] == '1'){echo "checked ='checked' ";}?>/> 
					 &nbsp;&nbsp;&nbsp; HDSD <input type = 'radio' value='2' name ='tag' <?php if($rows['tags'] == '2'){echo "checked ='checked' ";}?>/>
					 &nbsp;&nbsp;&nbsp; Giới thiệu <input type = 'radio' value='3' name ='tag' <?php if($rows['tags'] == '3'){echo "checked ='checked' ";}?>/>
					 &nbsp;&nbsp;&nbsp; Question <input type = 'radio' value='4' name ='tag' <?php if($rows['tags'] == '4'){echo "checked ='checked' ";}?>/>
					</td>
					<td rowspan = '3' width='500px'>
					  	<style>
					  		.admin-listimg {
					  			height: 80px;
					  			background-color: white;
					  		}
					  		.admin-list-img {
					  			height:75px;
					  		}
					  		.admin-title-img{
					  			display: none;
					  		}
					  	</style>
					  	<div id='view' style='background: #fff0b5;width: 100%;float: left;'>
						</div>
					  </td>
				  </tr>
                  <tr>
                      <td>
							VI_vn <input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;EN_en <input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
                  </tr>
                  <tr>
                      <td>Thời gian: </td>
                      <td><input type = 'text' name ='thoigian' value = '<?php echo $rows['thoigian']; ?>'/>	</td>
                  </tr>
                  <tr>
                      <td></td>
                      <td> <input type ='submit' name = 'sua' value = 'Sửa'/>
                      <a onClick='javascript: return CheckSure();' href='index.php?ql=tt&ac=v' title='Hủy thao tác'>
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
		}else if ($ac == 'ct'){
			?>
				<div class="admin-ct">	
                  <table width="90%">
               <CAPTION><p>CHI TIẾT DỊCH VỤ</p></CAPTION>
                  <tr>
                      
                      <td style="font-size:18px;text-align:center;font-weight:bold"><?php echo $rows['tieude'] ?></td>
                  </tr>
                  <tr>             
                      <td style="font-size:14px;font-weight:bold"><?php echo strip_tags($rows['tomtat']); ?></td>
                  </tr>
                  <tr>                     
                      <td style="font-size:14px; line-height:1.3; padding-top:10px;color:#000"><?php echo $rows['noidung']; ?></td>
                  </tr>   
                  <tr>    
                      <td style="text-align:center;"><img src="<?php echo $rows['img']; ?>" width="400px"/></td>
                      
                  </tr>
                  <tr>
					 
					  <td><?php echo $rows['tags']; ?></td>
				  </tr>
                  
                  <tr>
                      
                      <td><?php echo $rows['thoigian']; ?></td>
                  </tr>
                      
                      	
                      </td>
                  </tr>
                   
                  <tr height='50px;'>
            	<td>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=tt&ac=sua&id=<?php echo $rows['idtin']?>' title=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sửa&nbsp;&nbsp;&nbsp;&nbsp; </a></div>
                                                	
                        </div>
                    </div>
                </td>
                </tr>
              </table>
            </div>
     <?php
		}
	}
}else{
	echo "<h4>Bạn không có quyền truy cập chức năng này! </h4>";	
}
?>


</div>
<script src="public/js/load.js" type="text/javascript"></script>