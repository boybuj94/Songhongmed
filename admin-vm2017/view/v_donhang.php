<div class='duongdan'>
	<p><a href='index.php'>Trang chủ &nbsp;&nbsp;</a><a href='index.php?ql=dh&ac=v'>&rsaquo;&nbsp;&nbsp;Đơn hàng</a></p>
</div>
<div class='admin'>
<?php
if($_SESSION['quyen'] == '1' || $_SESSION['quyen'] == '0' ){
	if(isset($_REQUEST['ac'])){
		$ac =$_REQUEST['ac'];
		if($ac == 'v'){
			?>
    	<table width='100%'  cellpadding='0' cellspacing='0' border='1' >
    		<caption><p>DANH SÁCH ĐƠN HÀNG</p></caption>
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
                <td colspan="2">Tùy chọn</td>

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
                <td style='font-size:11px'><a href = 'index.php?ql=dh&ac=sr&id={$rows['iddon']}'>{$rows['madon']}</a></td>
                <td>{$rows['tenkhach']}</td>
                <td>{$rows['email']}</td>
                <td>{$rows['sdt']}</td>
                <td>{$rows['diachi']}</td>
                <td>{$rows['ngaydat']}</td>
                
                <td>";
                if($rows['tinhtrang'] == '0'){
                	echo "Chưa duyệt";
                }else{
                	echo  "Đã duyệt";
                }
                
                echo "</td>
                <td width='40px'>
					<a href='index.php?ql=dh&ac=ct&id={$rows['iddon']}' title='duyệt đơn'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-check.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=dh&ac=xoa&id={$rows['iddon']}' title='Hủy đơn hàng này'>
					<script language='javascript'> 
						function CheckSure(){ 
						if( window.confirm('Bạn có chắc chắn hủy đơn hàng này không?')){ 
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
            	<td colspan='10'>
                	<div class='admin-them'>
                    	<div class='admin-add'></div>
                        <div class='admin-tt'><p>Hiển thị từ 1 đến {$num} / Tổng {$num}</p></div>
                        <div class='admin-phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='index.php?ql=dh&ac=v&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='index.php?ql=dh&ac=v&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='index.php?ql=dh&ac=v&page={$page}'> Next</a>";;
									  }
                        echo "</div>
                    <div class='admin-search'>
							<form style='padding:0px;background:none;width:100%'>
                				<input type='text' name='text_s' placeholder='&nbsp;Tìm kiếm đơn/thời gian'/>
                    			<input type='submit' name='search_dh' value='Tìm' />
               				 </form>
						</div>
                    </div>
                </td>
                
            </tr>";
			
			
    	echo "</table>";
			
							// -----------chi tiết đơn---------------------
			
		}else if ($ac == 'ct'){
	?>
	<style type="text/css">
		.admin table td{
			height: 35px;
		}
		button {
			width: 100px;
    		height: 30px;
		}
	</style>
	<a href="index.php?ql=dh&ac=duyet&id=<?php echo $id;?>"><button id="export" type="submit">In đơn hàng</button></a>
	
<p></br></p>
	
<div style="width: 100%;background: #fff;padding: 20px;" id="docx">
	<table width="80%" border="0" id="tableID">
		<tr>
			<td colspan="4" style="font-weight: bold;"><h2>Ytevietmy.com</h2></td>
		</tr>
		<tr>
			<td colspan="4">Số 5TT6.2, Khu Đô Thị Ao Sào,Phường Thịnh Liệt, Quận Hoàng Mai, Hà Nội</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: center;"><h2>PHIẾU XUẤT HÀNG</h2></td>
		</tr>
		<tr>
			<td style="font-weight: bold;width: 140px">Ngày lập chứng từ: </td>
			<td width="400px"><?php echo $date; ?></td>
			<td style="font-weight: bold;width: 100px">Kho xuất: </td>
			<td>Số 5TT6.2, Khu Đô Thị Ao Sào,Phường Thịnh Liệt, Quận Hoàng Mai, Hà Nội</td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Khách hàng: </td>
			<td><?php echo $rows['tenkhach'];?></td>
			<td style="font-weight: bold;">Điện thoại: </td>
			<td>0977222844</td>
		</tr>
		<tr>
			<td style="font-weight: bold;">Địa chỉ: </td>
			<td colspan="3"><?php echo $rows['diachi'];?></td>
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Điện thoại: </td>
			<td colspan="3"><?php echo $rows['sdt'];?></td>
			
		</tr>
		<tr>
			<td style="font-weight: bold;">Email: </td>
			<td><?php echo $rows['email'];?></td>
			<td style="font-weight: bold;">Mã đơn hàng: </td>
			<td><?php echo $rows['madon'];?></td>
		</tr>

	</table>
	<table width="80%" cellpadding='0' cellspacing='0' border='1' id="tableID">
	<caption style="padding: 10px">DANH SÁCH SẢN PHẨM ĐƠN HÀNG</caption>
		<tr>
			<td style = 'text-align: center;width: 40px;'>STT</td>
			<td style = 'text-align: center'>Sản phẩm</td>
			<td style = 'text-align: center;width: 200px;'>Serialnumber</td>
			<td style = 'text-align: center;width: 70px;'>Số lượng</td>
			<td style = 'text-align: center'>Giá tiền</td>
		</tr>
		<?php
		$j=1;
			$idsp = explode(' ',ltrim($rows['idsp']));
			$sl = explode(' ',ltrim($rows['soluong']));
			// xóa khoảng trắng bên trái chuỗi/ sau đó chuyển chuỗi thành mảng tách nhau bởi khoảng trắng
			//echo "<pre>";
			//print_r($idsp);
			//echo "<pre>";
			//print_r($sl);
			$i=0;
			
			// $arraysp = array_combine($idsp,$sl); gộp 2 mảng 1 chiều thành mảng 2 chiều
			//print_r($arraysp);
			foreach ($idsp as $key => $value) {
				$sql2 = "SELECT * FROM sanpham WHERE idsp = '{$idsp[$i]}'";
				$sanpham = mysqli_query($con,$sql2);
				$rows2 = mysqli_fetch_array($sanpham);
				echo "<tr>
					<td style = 'text-align: center'><h4>{$j}</h4></td>
					<td><h4>{$rows2['tensp']} {$rows2['masp']}</h4></td>
					<td></td>
					<td style = 'text-align: center'><h4>{$sl[$i]}</h4></td>
					<td style = 'text-align: right'><h4>{$rows2['gia']}&nbsp;</h4></td>
					</tr>";
					$i++;	
					$j++;
			}

					echo "<tr><td colspan='5'>Nội dung: {$rows['noidung']}</td></tr>";
		?>
		
	</table>
	<table width="80%" border="0">
		<tr>
			<td style="font-weight: bold;height: 100px;text-align: center">Khách hàng:</td>
			<td style="font-weight: bold;height: 100px;text-align: center">Nhân viên bán hàng:</td>
			<td style="font-weight: bold;height: 100px;text-align: center">Thu ngân:</td>
		</tr>
		<tr>
			<td style="height: 100px;text-align: center"><?php echo $rows['tenkhach'];?></td>
			<td style="height: 100px;text-align: center"><?php echo $_SESSION['namead'];?></td>
			<td style="height: 100px;text-align: center"><?php echo $_SESSION['namead'];?></td>
		</tr>
	</table>

			<!-- XỬ LÝ IN HÓA ĐƠN -->
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
</div>	
	<?php 
		}else if ($ac == 'sr'){
			
			?>
	<style type="text/css">
		.admin table td{
			height: 35px;
		}
		button {
			width: 100px;
    		height: 30px;
		}
	</style>
	
	
<p></br></p>
	
<div style="width: 100%;background: #fff;padding: 20px;" id="docx">
	<form method="POST" action="model/m_donhang.php">

	<table width="80%" cellpadding='0' cellspacing='0' border='1' id="tableID">
	<input style="display: none" type='text' name='id' value='<?php echo $id;?>' />
	<caption style="padding: 10px">NHẬP SERIALNUMBER CHO SẢN PHẨM</caption>
		<tr>
			<td style = 'text-align: center;width: 40px;'>STT</td>
			<td style = 'text-align: center'>Sản phẩm</td>
			<td style = 'text-align: center;width: 200px;'>Serialnumber</td>
			<td style = 'text-align: center;width: 70px;'>Số lượng</td>
			<td style = 'text-align: center'>Giá tiền</td>
		</tr>
		<?php
		$j=1;
			$idsp = explode(' ',ltrim($rows['idsp']));
			$sl = explode(' ',ltrim($rows['soluong']));
			// xóa khoảng trắng bên trái chuỗi/ sau đó chuyển chuỗi thành mảng tách nhau bởi khoảng trắng
			//echo "<pre>";
			//print_r($idsp);
			//echo "<pre>";
			//print_r($sl);
			$i=0;
			
			// $arraysp = array_combine($idsp,$sl); gộp 2 mảng 1 chiều thành mảng 2 chiều
			//print_r($arraysp);

			if($rows['serialnumber'] == ''){
			foreach ($idsp as $key => $value) {
				$sql2 = "SELECT * FROM sanpham WHERE idsp = '{$idsp[$i]}'";
				$sanpham = mysqli_query($con,$sql2);
				$rows2 = mysqli_fetch_array($sanpham);
				echo "<tr>
					<td style = 'text-align: center'><h4>{$j}</h4></td>
					<td><h4>{$rows2['tensp']} {$rows2['masp']}</h4></td>
					<td><input type='text' name='sr[{$rows2['idsp']}]' value='0' /></td>
					<td style = 'text-align: center'><h4>{$sl[$i]}</h4></td>
					<td style = 'text-align: right'><h4>{$rows2['gia']}&nbsp;</h4></td>
					</tr>";
					$i++;	
					$j++;
			}
			}else{
			$i=0;
			$j=1;
			$a_sr = explode(' ', $rows['serialnumber']); // chuyển chuỗi serialnumber sang mảng
			echo "<pre>";
			
			foreach ($idsp as $key => $value) {
				$sql2 = "SELECT * FROM sanpham WHERE idsp = '{$idsp[$i]}'";
				$sanpham = mysqli_query($con,$sql2);
				$rows2 = mysqli_fetch_array($sanpham);
				echo "<tr>
					<td style = 'text-align: center'><h4>{$j}</h4></td>
					<td><h4>{$rows2['tensp']} {$rows2['masp']}</h4></td>
					<td><input type='text' name='sr[{$rows2['idsp']}]' value='{$a_sr[$i]}' /></td>
					<td style = 'text-align: center'><h4>{$sl[$i]}</h4></td>
					<td style = 'text-align: right'><h4>{$rows2['gia']}&nbsp;</h4></td>
					</tr>";
					$i++;	
					$j++;
			}
		}

					
		?>
		<tr>
			<td colspan="5"><input type="submit" name="luu" value="Lưu kho"></td>
		</tr>
	</table>

	</form>

			
</div>	
	<?php 
}
}
}else {
	echo $thongbao;	
}
?>


</div>
<script src="public/js/load.js" type="text/javascript"></script>