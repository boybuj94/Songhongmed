
<?php
include('../model/config.php');

if(isset($_REQUEST['id']) || isset($_REQUEST['id2'])){
			@$id = $_REQUEST['id'];
			echo $id;
			@$id2 = $_REQUEST['id2'];
			if(($id != '') && ($id2 != '')){
				$sql4 = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm AND danhmuc.iddm = '{$id}' AND sanpham.ngonngu = {$id2} ";
			}else if(($id == '') && ($id2 != '')){
				$sql4 = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm AND sanpham.ngonngu = {$id2} ";

			}else if(($id != '') && ($id2 == '')){
				$sql4 = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm AND danhmuc.iddm = '{$id}' ";
				
			}else{
				$sql4 = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm";
			}

			@$question2 = mysqli_query($con,$sql4);
			$i=1;
			
			while($rows4 = mysqli_fetch_array($question2)){
            ?>

            <tr>
				<td  style='text-align:center;'><?php echo $i; ?></td>
            	<td style='font-size:11px'><a href = 'index.php?ql=sp&ac=ct&id=<?php echo $rows4['idsp'];?>'><?php echo $rows4['tensp'];?></a></td>
                <td style='font-size:11px'><?php echo $rows4['masp'];?></td>
                <td style='font-size:11px'><?php echo $rows4['hangsp'];?></td>                
				<td style='font-size:11px'><?php echo $rows4['tendm'];?></td>
				<td style='font-size:11px'><?php echo $rows4['noibat'];?></td>
				<td>
				<?php
					
					if($rows4['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows4['ngonngu'] == '1'){
						echo "English - en";
					} ?>
					
				</td>
                <td width='40px'>
					<a href='index.php?ql=sp&ac=sua&id=<?php echo $rows4['idsp'];?>' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=sp&ac=xoa&id=<?php echo $rows4['idsp'];?>' title='Xóa admin'>
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
            <?php
			$i++;
			}
			
}else if(isset($_REQUEST['dm']) || isset($_REQUEST['lang_l'])){
	@$dm = $_REQUEST['dm'];
	@$lang_l = $_REQUEST['lang_l'];
	if($dm != '' && $lang_l != ''){
		$sql3 = "SELECT tendm,tendm,danhmuc.ngonngu,iddm FROM danhmuc,danhmuc WHERE danhmuc.iddm=danhmuc.iddm AND danhmuc.iddm = '{$dm}' AND danhmuc.ngonngu = '{$lang_l}'";
	}else if($dm == '' && $lang_l != ''){
		$sql3 = "SELECT tendm,tendm,danhmuc.ngonngu,iddm FROM danhmuc,danhmuc WHERE danhmuc.iddm=danhmuc.iddm AND danhmuc.ngonngu = '{$lang_l}'";
	}else if($dm != '' && $lang_l == ''){
		$sql3 = "SELECT tendm,tendm,danhmuc.ngonngu,iddm FROM danhmuc,danhmuc WHERE danhmuc.iddm=danhmuc.iddm AND danhmuc.iddm = '{$dm}'";
	}else{
		$sql3 = "SELECT tendm,tendm,danhmuc.ngonngu,iddm FROM danhmuc,danhmuc WHERE danhmuc.iddm=danhmuc.iddm";
	}

	$danhmuc3 = mysqli_query($con,$sql3); 

	$i=1;
	while ($rows3 = mysqli_fetch_array($danhmuc3)) {
	?>
		<tr>
				<td style='text-align:center;'><?php echo $i;?></td>
                <td><?php echo $rows3['tendm']; ?></td>
                <td><?php echo $rows3['tendm']; ?></td>
                <td>
                <?php
					if($rows3['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows3['ngonngu'] == '1'){
						echo "English - en";
					}
				?>
				</td>
                <td width='40px'>
					<a href='index.php?ql=lsp&ac=sua&id=<?php echo $rows3['iddm']; ?>' title='Sửa thông tin'>
						<div class='admin-icon' style='background-image:url(public/img/icon/icon-sua.png);'> </div>
					</a>
				</td>
                <td width='40px'>
					<a onClick='javascript: return CheckSure();' href='index.php?ql=lsp&ac=xoa&id=<?php echo $rows3['iddm']; ?>' title='Xóa admin'>
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
            <?php
            $i++;
         }
	}else if(isset($_REQUEST['item'])){
		$i = 1;
			$item = $_REQUEST['item'];
			$sql0 = "SELECT * FROM img WHERE tags = '{$item}' order by idimg desc limit 20 ";
			$img0 = mysqli_query($con,$sql0);
			// Hiển thị danh sách ảnh
			while($rows0 = mysqli_fetch_array($img0)){
				$url = "<img src =admin-vm2017/{$rows0['img']}>";
			echo "

			<div class = 'admin-listimg'>
	    		<div class = 'admin-list-img' style = 'background-image:url({$rows0['img']})'>

	    		</div>
	    		<div class = 'admin-title-img'>
	    			<p>{$rows0['tieude']}</p>
	    			<p style = 'font-weight:bold;color:#005e99;'>";
					if($rows0['tags'] == '0'){
						echo "Certificate";
					}else if($rows0['tags'] == '1'){
						echo "Catalog";
					}else if($rows0['tags'] == '2'){
						echo "Hoạt đông";
					}
					else if($rows0['tags'] == '3'){
						echo "Training";
					}
					else if($rows0['tags'] == '4'){
						echo "HDSD";
					}
					
				echo "</p>
	    			<p>";
					if($rows0['ngonngu'] == '0'){
						echo "Tiếng việt - vi";
					}else if($rows0['ngonngu'] == '1'){
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
	}
  ?>
