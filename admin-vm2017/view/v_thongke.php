<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a><a href=''>&rsaquo;&nbsp;&nbsp;Thống kê</a></p>
</div>
<div class='admin' id="docx">
<?php
if($_SESSION['quyen'] == '1' || $_SESSION['quyen'] == '0' ){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'dh'){
	
			?>
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1' id="tableID">
    		<caption><p>THỐNG KÊ ĐƠN HÀNG</p></caption>
            <thead>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='40px'>STT</td>
            	<td>Mã đơn</td>
 				<td>Tên khách hàng</td>
                <td>Email</td>
                <td>Số điện thoại</td>
                <td>Địa chỉ</td>
                <td>Ngày đặt</td>
                <td>Tình trạng</td>

            </tr>
            </thead>
            <tbody id="view" style="background: #fff0b5">
            </tbody>
            <tbody>
            <?php
			$num = mysqli_num_rows($donhang);
			$i =1;
			while($rows = mysqli_fetch_array($donhang)){
            echo "<tr>
				<td  style='text-align:center;'>{$i}</td>
                <td style='font-size:11px'>{$rows['madon']}</td>
                <td>{$rows['tenkhach']}</td>
                <td>{$rows['email']}</td>
                <td>{$rows['sdt']}</td>
                <td>{$rows['ngaydat']}</td>
                <td>{$rows['diachi']}</td>
                <td>";
                if($rows['tinhtrang'] == '0'){
                	echo "Chưa duyệt";
                }else{
                	echo  "Đã duyệt";
                }
                
                echo "</td>
                
            </tr>";
			$i++;
			}?>
			</tbody>
            <?php
            echo "<tr height='50px;'>
            	<td colspan='9'>
                	<div class='admin-them'>
                    	<div class='admin-add'><button style='width:100%;height:100%;' id='export' type='submit'>In đơn hàng</button></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=tk&ac=dh&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=tk&ac=dh&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=tk&ac=dh&page={$page}'> Next</a>";;
									  }
                        echo "</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";;?>
<script>
				 window.export.onclick = function() {
				 
				   if (!window.Blob) {
				      alert('Your legacy browser does not support this action.');
				      return;
				   }

				   var html, link, blob, url, css;
				   
				   // EU A4 use: size: 841.95pt 595.35pt;
				   // US Letter use: size:11.0in 8.5in;
				   
				   css = (
				     '<style>' +
				     '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
				     'div.WordSection1 {page: WordSection1;}' +
				     'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
				     '</style>'
				   );
				   
				   html = window.docx.innerHTML;
				   blob = new Blob(['\ufeff', css + html], {
				     type: 'application/msword'
				   });
				   url = URL.createObjectURL(blob);
				   link = document.createElement('A');
				   link.href = url;
				   // Set default file name. 
				   // Word will append file extension - do not add an extension here.
				   link.download = 'Document';   
				   document.body.appendChild(link);
				   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'Document.doc'); // IE10-11
				   		else link.click();  // other browsers
				   document.body.removeChild(link);
				 };
				</script>  

		<?php 
			
							// ----------HIỂN THỊ THỐNG KÊ SẢN PHẨM ------------	
			
		}else if($ac == 'sp'){ ?>
			<table width='100%'  cellpadding='0' cellspacing='0' border='1' id="tableID">
    	<thead>
    		<caption><p>THỐNG KÊ SẢN PHẨM</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold; '>
            	<td width='30px'>STT</td>
				<td width='210px'>Tên sản phẩm</td>
                <td>Mã SP</td>
				<td width='70px'>Hãng SX</td>
				<td>Giá</td>
				<td>Loại sản phẩm
				</td>
				<td>Số lượng</td>
				<td>Tình Trạng</td>

                <td>Ngôn Ngữ</td>
                
                
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
            	<td style='font-size:11px'><?php echo $rows['tensp']?></td>
                <td style='font-size:11px'><?php echo $rows['masp']?></td>
                <td style='font-size:11px'><?php echo $rows['hangsp']?></td>
                <td style='font-size:11px'><?php echo $rows['gia']?></td>
                
				<td style='font-size:11px'><?php echo $rows['tenloai']?></td>
				<td style='font-size:11px'><?php echo $rows['soluong']?></td>
                <td style='font-size:11px'>
                	<?php	
					if($rows['tinhtrang'] == '1'){
						echo "Hết hàng";
					}else if($rows['tinhtrang'] == '0'){
						echo "Còn lại: ".$rows['tinhtrang'];
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

            </tbody>
            
            <?php
			$i++;
			} 

            echo "<tr height='50px;'>
            	<td colspan='12'>
                	<div class='admin-them'>
                    	<div class='admin-add'><button style='width:100%;height:100%;' id='export' type='submit'>In đơn hàng</button></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=tk&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=tk&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=tk&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
						
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";?>
<script>
				 window.export.onclick = function() {
				 
				   if (!window.Blob) {
				      alert('Your legacy browser does not support this action.');
				      return;
				   }

				   var html, link, blob, url, css;
				   
				   // EU A4 use: size: 841.95pt 595.35pt;
				   // US Letter use: size:11.0in 8.5in;
				   
				   css = (
				     '<style>' +
				     '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
				     'div.WordSection1 {page: WordSection1;}' +
				     'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
				     '</style>'
				   );
				   
				   html = window.docx.innerHTML;
				   blob = new Blob(['\ufeff', css + html], {
				     type: 'application/msword'
				   });
				   url = URL.createObjectURL(blob);
				   link = document.createElement('A');
				   link.href = url;
				   // Set default file name. 
				   // Word will append file extension - do not add an extension here.
				   link.download = 'Document';   
				   document.body.appendChild(link);
				   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'Document.doc'); // IE10-11
				   		else link.click();  // other browsers
				   document.body.removeChild(link);
				 };
				</script>  

		<?php }
	}

}
?>
