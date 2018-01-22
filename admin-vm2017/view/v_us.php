<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a>&rsaquo;&nbsp;&nbsp;Other&nbsp;&nbsp;&rsaquo;<a href='index.php?ql=us&ac=v'>&nbsp;&nbsp;User</a></p>
</div>
<div class='admin'>
<?php
	if($_SESSION['quyen'] == '0' || $_SESSION['quyen'] == '2'){
		
			echo "
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1'>
    		<caption><p>DANH SÁCH THÀNH VIÊN</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='40px'>STT</td>
                <td>Tên thành viên</td>
                <td>Tài khoản</td>
                
                <td>Email</td>
				<td>Số điện thoại</td>
				<td>Địa chỉ</td>
				<td>Ngày đăng ký</td>
                <td>Tùy chọn</td>
                
            </tr>";
			$num = mysqli_num_rows($user);
			$i=1;
			while($rows = mysqli_fetch_array($user)){
            echo "<tr>
            	<td style='text-align:center;'>{$i}</td>
                <td>{$rows['tenus']}</td>
                <td>{$rows['unus']}</td>
                
                <td>
					{$rows['email']}
						
				</td>
				<td>{$rows['sdt']}</td>
				<td>{$rows['diachi']}</td>
				<td>{$rows['ngaydk']}</td>
                
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=us&ac=xoa&id={$rows['idus']}' title='Xóa admin'>
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
                    	<div class='admin-add'></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=us&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=us&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=us&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
		}else {
		echo "<h4>Bạn không có quyền truy cập vào chức năng này !</h4>";	
		}
		?>
		</div>