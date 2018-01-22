
    	<table width='100%'  cellpadding='0' cellttacing='0' border='1' >

    		<caption><p>DANH SÁCH IMG</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='50px'>STT</td>
				<td>IMG</td>
				<td>Tiêu đề</td>
				<td>url</td>
				<td>Item</td>
                <td>Ngôn ngữ</td>
                <td colspan='2'>Tùy chọn</td>
                
            </tr>";
			$i =1;
			$num = mysqli_num_rows($img);
			while($rows = mysqli_fetch_array($img)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
            	<td><img src = '{$rows['img']}' width = '100px'/></td>
				<td>{$rows['tieude']}</td>
				<td>				
					<textarea rows='2' cols = '80'>admin-vm2017/{$rows['img']}</textarea></td>
				<td>{$rows['tags']}</td>

				<td>";
				
					
					if($rows['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows['ngonngu'] == '1'){
						echo "English - en";
					}
					
				echo "</td>
                <td width='40px'>
					<a href='index.php?ql=img&ac=sua&id={$rows['idimg']}' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=img&ac=xoa&id={$rows['idimg']}' title='Xóa IMG'>
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
			