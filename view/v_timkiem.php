<?php
	

		if($nrows == '0'){
			echo "<div class='duongdan'><span>Không tìm thấy kết quả với từ khóa: ".$noidung."<span></div>";
		}else {
			echo "<div class='duongdan'><span>Tìm được : ".$nrows." Kết quả!"."</span></div>";?>
				
					<div class="list-nhom">
	<div class="content-sanpham">
    <?php
    	while($rows = mysqli_fetch_array($ketqua)){
	?>
		<div class="content-sanpham-noibat"> 	
			<div class="content-sanpham-img">
            	<img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
            </div>
            <div class="content-sanpham-title">
            	<h4><?php echo ucfirst(mb_strtoupper($rows['tensp'],'UTF-8')).'&nbsp;'.$rows['masp']?></h4>
            </div>
            <div class="content-sanpham-info">
            	<h4><?php echo $rows['masp'];?></h4>
                <h5 style="padding-bottom: 5px;">Xuất xứ: <?php echo $rows['hangsp'];?></h5>
            	<p style="font-size: 14px;line-height:1.5;">
            		<?php // echo strip_tags(str_replace(strstr($rows['thongtin'],'readmore'),' ',$rows['thongtin'])).'...'; //strip_tags(strstr 
            			echo $rows['baiviet'].'</br>';
            			echo $rows['thongtin'];
            		?>
                </p></div>
            
		</div>   
	<?php }
	
	?>
    
		<div class="clear-fix"></div> <!-- CHO CONTENT-SANPHAM KHÔNG TRÔI RA KHỎI CLASS CONTENT -->
    </div>
</div>
						
			<?php	}
			
	
?>
