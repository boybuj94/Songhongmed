<!-- line -->
<div class="title-h2" style="margin:auto;">
	<a href="index.php?manage=Product&amp;v=vpr&amp;l=en" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h2>Thiết bị</h2>
    </a>
</div>
<div class="content-line">
	<div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
</div>

<div class="list-nhom">
	<div class="content-sanpham">
    <?php
    	while($rows = mysqli_fetch_array($danhmuc2)){
	?>
		<div class="content-sanpham-noibat">
        	<a href="index.php?manage=Product&v=vsp&id=<?php echo $id?>" title="Xem chi tiết sản phẩm">
			<div class="content-sanpham-img">
            	<img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
            </div>
            <div class="content-sanpham-title"><h4><?php echo ucfirst(mb_strtoupper($rows['tensp'],'UTF-8')).'&nbsp;'.$rows['masp']?></h4></div>
            <div class="content-sanpham-info"><p style="font-size: 14px;padding-left: 20px;line-height:1.5;"><?php echo strip_tags(str_replace(strstr($rows['thongtin'],'readmore'),' ',$rows['thongtin'])).'...'; //strip_tags(strstr ?>
                </p></div>
            
		</div>
    </a>
    
	<?php }
	echo "<div class='phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='/duan/vietmy/?manage=Product&v=vpr&page={$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='/duan/vietmy/?manage=Product&v=vpr&page={$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='/duan/vietmy/?manage=Product&v=vpr&page={$page}'> Next</a>";;
									  }
                        echo "</div>";
	?>
    
		<div class="clear-fix"></div> <!-- CHO CONTENT-SANPHAM KHÔNG TRÔI RA KHỎI CLASS CONTENT -->
    </div>
</div>