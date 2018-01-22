<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/clipboard.js"></script>
<script>
	// Tạo nút copy
$(function(){
  new Clipboard('.copy-text');
});
</script>

<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=item&ac=v'>&nbsp;&nbsp;ITEM</a></p>
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
    		<caption><p>DANH SÁCH ITEM</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='50px'>STT</td>
				<td>Tiêu đề</td>

				<td>Danh mục</td>
				<td>Item</td>
                <td>Ngôn ngữ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$i =1;

			$num2 = mysqli_num_rows($item);
			while($rows = mysqli_fetch_array($item)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td>{$rows['tieude']}<a href = 'index.php?ql=item&ac=ct&id={$rows['iditem']}'> ...xem chi tiết</a></td>
                        
                <td>{$rows['tendm']}</td>
                <td>{$rows['item']}</td>

				<td>";
				
					
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				echo "</td>
                <td width='40px'>
					<a href='index.php?ql=item&ac=sua&id={$rows['iditem']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=item&ac=xoa&id={$rows['iditem']}' title='Xóa admin'>
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
                    	<div class='admin-add'><a href='index.php?ql=item&ac=add' title=''>&nbsp;&nbsp;+ Thêm mới </a></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=item&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=item&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=item&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
						<div class='admin-search'>
							<form style='padding:0px;background:none;width:100%;'>
                				<input type='text' name='text_s' placeholder='&nbsp;Tìm kiếm'/>
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
					  <form method='post' action='model/m_item.php' enctype='multipart/form-data'>
				  <table>
			   <CAPTION>THÊM ITEM</CAPTION>
				  <tr>
					  <td width = '120px'>Tiêu Đề:</td>
					  <td colspan = '2'><input type = 'text' name ='tieude'/></td>
				  </tr>
				  </tr>
				<tr>
					  <td>Info :</td>
					  <td colspan = '2'><textarea name='info' cols = '35' rows = '14' ></textarea></td>
				  </tr>";
				  ?>
				  <script type="text/javascript">

						CKEDITOR.replace( 'info' );

					</script>
				  <tr>
					  <td>Chọn hãng:</td>
					  <td>
					  	<select name = 'danhmuc'>
							<?php
								$danhmuc = 'SELECT iddm,tendm FROM danhmuc order by ngonngu asc';
								$ketqua = mysqli_query($con,$danhmuc);
								if(isset($_REQUEST['iddm'])){
									$iddm = $_REQUEST['iddm'];
								}
								while($dong = mysqli_fetch_array($ketqua)){
			 				?>
								<option value="<?php echo $dong['iddm']; ?>" >
            	
								<?php echo $dong['tendm']; ?>
            					</option>
							<?php } 
						echo "</select>
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
					  	<td>Ảnh:</td> 
					  	<td><input type = 'file' name = 'img'></td>
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
					  <td>Item:</td>
					  <td>Certificate <input type = 'radio' value='0' name ='item' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; Catalog <input type = 'radio' value='1' name ='item' /></td>
				  </tr>
				  <tr>
					  <td>Ngôn ngữ:</td>
					  <td>VN_vi <input type = 'radio' value='0' name ='nn' checked='checked'/>
					 &nbsp;&nbsp;&nbsp; EN_en <input type = 'radio' value='1' name ='nn'/></td>
				  </tr>
				  <tr>
					  <td></td>
					  <td> <input type ='submit' name = 'add' value = 'Thêm'/></td>
				  </tr>
			  </table>
			 
			</form>";
				
				// ----------------- SỬA ITEM --------------
				
		}else if ($ac == 'sua'){
			?>
			<form method='post' action='model/m_item.php?id=<?php echo $rows['iditem']; ?>' enctype='multipart/form-data' name="update">			
                  <table>
               <CAPTION><p>SỬA ITEM<p></CAPTION>
                  <tr>
                      <td width = '120px'>Item:</td>
                      <td colspan="2">
                      	<input type = 'text' name ='tieude' value='<?php echo $rows['tieude'] ?>'/></td>
                  </tr>
                  <tr>
					  <td>Info :</td>
					  <td colspan="2"><img src = 'admin-vm2017/public/img/anh/20170930092752-P60526-203552.jpg'/><textarea name='info' cols = '35' rows = '14' ><?php echo $rows['info']; ?></textarea></td>
				  </tr>
				  <script type="text/javascript">

						CKEDITOR.replace( 'info' );

					</script>
                 	<tr>
					  <td>Chọn hãng:</td>
					  <td><img src = 'admin-vm2017/public/img/anh/20170930092752-P60526-203552.jpg'/>
					  	<select name = 'danhmuc'>
					  		<option value="<?php echo $rows['iddm']; ?>" selected="selected">
            	
								<?php echo $rows['tendm']; ?>
            				</option>
							<?php
								$danhmuc = 'SELECT iddm,tendm FROM danhmuc order by ngonngu asc';
								$ketqua = mysqli_query($con,$danhmuc);
								while($dong = mysqli_fetch_array($ketqua)){
			 				?>

								<option value="<?php echo $dong['iddm']; ?>" >
            	
								<?php echo $dong['tendm']; ?>
            					</option>
							<?php } ?>
						</select>
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
					  	<td>Ảnh:</td> 
					  	<td><img src="<?php echo $rows['img']; ?>" width="100px"/><input type = 'file' name = 'img'></td>
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
					  <td>Item:</td>
					  <td>Certificate <input type = 'radio' value='0' name ='item' <?php if($rows['item'] == '0'){echo "checked ='checked' ";}?>/>
					 &nbsp;&nbsp;&nbsp; Catalog <input type = 'radio' value='1' name ='item' <?php if($rows['item'] == '1'){echo "checked ='checked' ";}?>/> 
					
					</td>
				  </tr>
                  <tr>
                      <td>
							VI_vn&nbsp;&nbsp; <input type='radio' name = 'nn' value='0' <?php if($rows['ngonngu'] == '0'){echo "checked ='checked' ";}?>/>
							&nbsp;&nbsp;&nbsp;EN_en&nbsp;&nbsp; <input type='radio' name = 'nn' value='1'  <?php if($rows['ngonngu'] == '1'){echo "checked ='checked' ";}?>/>
							
						</td>
                  </tr>
                  
                  <tr>
                      <td></td>
                      <td> <input type ='submit' name = 'sua' value = 'Sửa'/>
                      <a onClick='javascript: return CheckSure();' href='index.php?ql=item&ac=v' title='Hủy thao tác'>
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
               <CAPTION><p>CHI TIẾT ITEM</p></CAPTION>
                  <tr>
                      
                      <td style="font-size:18px;text-align:center;font-weight:bold"><?php echo $rows['tieude'] ?></td>
                  </tr>
                  <tr>             
                      <td style="font-size:14px;font-weight:bold"><?php echo $rows['info']; ?></td>
                  </tr>
   
                  <tr>    
                      <td style="text-align:center;"><img src="<?php echo $rows['img']; ?>" width="400px"/></td>
                      
                  </tr>
                  <tr>
					 
					  <td><?php echo $rows['tendm']; ?></td>
				  </tr>
                  
                  <tr>
                      
                      <td><?php echo $rows['item']; ?></td>
                  </tr>
                      
                      	
                      </td>
                  </tr>
                   
                  <tr height='50px;'>
            	<td>
                	<div class='admin-them'>
                    	<div class='admin-add'><a href='index.php?ql=item&ac=sua&id=<?php echo $rows['iditem']?>' title=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sửa&nbsp;&nbsp;&nbsp;&nbsp; </a></div>
                                                	
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