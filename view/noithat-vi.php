
<!-- line -->
<style type="text/css">
	.content-left {
		display: none;
	}
</style>
<div class="title-h3" style="margin:auto;">
	<a href="" title="Product2 company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h3>NỘI THẤT Y TẾ</h3>
    </a>
</div>
<div class="content-line">
	<div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
</div>

<div class="list-nhom">
	<div class="content-sanpham">
    <?php
    	while($rows = mysqli_fetch_array($sanpham)){
	?>
		<div class="content-sanpham-noibat"> 	
			<div class="content-sanpham-img">
            	<img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
            </div>
            <div class="content-sanpham-title">
            	<h4><a href="index.php?manage=Product2&v=vde&id=<?php echo $rows['idsp']?>"><?php echo ucfirst(mb_strtoupper($rows['tensp'],'UTF-8')).'&nbsp;'.$rows['masp']?></a></h4>
            </div>
            <div class="content-sanpham-info">
            	<h4><?php echo $rows['masp'];?></h4>
                <h5 style="padding-bottom: 5px;">Xuất xứ: <?php echo $rows['hangsp'];?></h5>
            	<p style="font-size: 14px;line-height:1.5;">
            		<?php 
            			echo $rows['baiviet'].'</br>';
            			echo $rows['thongtin'];
            		?>
                </p>
            </div>
            
		</div>   
	<?php }
	echo "<div class='phantrang'>";
                        	if($_GET['page']>1){
								$page =$_GET['page']-1;
								  
								echo "<a href='Product2s/san-pham/{$page}'>Back </a>";
						  
							  }
							  for ( $j = 1; $j <= $sotrang; $j ++ ){
								  if($j == $_GET['page']){
									  echo $j;
									  }else{
										  echo "<a href='Product2s/san-pham/{$j}'> {$j} </a>";	
									  }
									  }
									  if($_GET['page']<$sotrang){
										$page =$_GET['page']+1;	
									  echo "<a href='Product2s/san-pham/{$page}'> Next</a>";;
									  }
                        echo "</div>";
	?>
    
		<div class="clear-fix"></div> <!-- CHO CONTENT-SANPHAM KHÔNG TRÔI RA KHỎI CLASS CONTENT -->
    </div>
</div>