
<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;<a href='index.php?ql=lh&ac=v'>&nbsp;&nbsp;Liên hệ</a></p>
</div>
<div class='admin'>
<?php

	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			echo "
    	<table width='100%'  cellpadding='0' cellttacing='0' border='1' >
    		<caption><p>DANH SÁCH LIÊN HỆ</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='50px'>STT</td>
				<td>Khách hàng</td>
				<td>Email</td>
				<td>SĐT</td>
				<td width = '40%'>Nội dung</td>
				<td>Thời gian</td>
                <td>Tình trạng</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$i =1;
			$num = mysqli_num_rows($lienhe);
			while($rows = mysqli_fetch_array($lienhe)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td>{$rows['tenkh']}</td>
				<td>{$rows['email']}</td>
                <td>{$rows['sdt']}</td>      
                <td>{$rows['noidung']}<a href='index.php?ql=lh&ac=ct&id={$rows['idlh']}'> ... xem chi tiết</a></td>
				<td>{$rows['thoigian']}</td>
				 <td>";
					if($rows['tinhtrang'] == '0'){
						echo "Chưa rep!";
					}else if($rows['tinhtrang'] == '1'){
						echo "ok";
					}
					echo "
				</td>
                <td width='40px'>
					<a href='index.php?ql=lh&ac=rep&id={$rows['idlh']}' title='Trả lời'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-rep.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=lh&ac=xoa&id={$rows['idlh']}' title='Xóa lienhe'>
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
                    	<div class='admin-add'></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>
                        	
                        </div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
	
				
				// ----------------- rep tin --------------
				
		}else if ($ac == 'rep'){
			$date = date('Y/m/d');
			?>
			
			
					  <form method='post' action='model/m_lienhe.php?id=<?php echo $id;?>' enctype='multipart/form-data'>
				  <table>
			   <CAPTION><p>TRẢ LỜI THƯ</p></CAPTION>

				  <tr>
					  <td>Nhân viên: </td>
					  <td><input type = 'text' name ='nv'/></td>
				  </tr>		
				  <tr>
					  <td>Email: </td>
					  <td><input type = 'text' name ='email'/></td>
				  </tr>
				  	  
				  <tr>
					  <td>Tiêu đề:</td>
					  <td><input type = 'text' name ='tieude'/></td>
				  </tr>
				  <tr>
					  <td>Ngôn ngữ:</td>
					  <td><textarea name="noidung" cols="35" rows="15"></textarea></td>
				  </tr>
				  <tr>
					  <td></td>
					  <td> <input type ='submit' name = 'rep' value = 'Gửi'/>	
                      <a onClick='javascript: return CheckSure();' href='index.php?ql=lh&ac=v' title='Hủy thao tác'>
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
            	<div class="admin-ct-top">
                	<table table width='90%'  cellpadding='0' cellttacing='0' border='1'>
			   			<CAPTION><p>NỘI DUNG THƯ</p></CAPTION>

                            <tr>
                                <td width = '100px'>Tên khách hàng: </td>
                                <td style="color:#000; font-weight:600;"><?php echo $rows['sdt'] ?></td>
                            </tr>		
                            <tr>
                                <td>Email: </td>
                                <td style="color:#000; font-weight:600;"><?php echo $rows['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại: </td>
                                <td style="color:#000; font-weight:600;"><?php echo $rows['sdt'] ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ: </td>
                                <td style="color:#000; font-weight:600;"><?php echo $rows['diachi'] ?></td>
                            </tr>
                            <tr>
                                <td>Thời gian:</td>
                                <td style="color:#000; font-weight:600;"><?php echo $rows['thoigian'] ?></td>
                            </tr>
                            <tr>
                                
                                <td colspan="2" style="color:#000;"><?php echo $rows['noidung'] ?></td>
                            </tr>
                            <tr>
                            <td colspan="2">
					<a href='index.php?ql=lh&ac=rep&id={$rows['idlh']}' title='Trả lời'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-rep.png);'> </div>
					</a>
							</td>
                            </tr>
                      </table>
                </div>
                <div class="admin-ct-nd">
                </div>
            </div>
			
<?php			
		}
	}

?>


</div>
