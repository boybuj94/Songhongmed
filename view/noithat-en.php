<div class="duongdan">
	<span><a href="/">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vpr&l=en">Products</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vgr&l=en&id=<?php echo $rows['iddm']?>"><?php echo $rows2['tendm']?></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vsp&l=en&id=<?php echo $id ?>"><?php echo $rows['tenloai']?></a></span></span>
</div>
<div class="nhom-sp" style="border:none;">
	<div class="sp-loai">
    	<div class="loai-title">
        	<h3 style="width:100%;"><a href="index.php?manage=Product&v=vsp&l=en&id=<?php echo $id?>" title="">&nbsp;&Xi;&nbsp;<?php echo mb_strtoupper($rows['tenloai'],'UTF-8')?></a></h3>
        </div>
        <?php 
		$sql3 = "SELECT * FROM sanpham WHERE ngonngu='1' AND idloai = '{$id}'";
		$danhmuc3 = mysqli_query($con,$sql3);
		while($rows3=mysqli_fetch_array($danhmuc3)){ ?>
        <div class="sanpham">
            <div class="sanpham-img" style="background-image:url(admin-vm2017/public/img/anh/<?php echo $rows3['img']?>)">
            </div>
            <div class="sanpham-title"><h5><a href="index.php?manage=Product&v=vde&l=en&id=<?php echo $rows3['idsp']?>" title=""><?php echo ucfirst(mb_strtolower($rows3['tensp'],'UTF-8')).'&nbsp;'.$rows3['masp']?></a></h5>
            </div>
            	<div class="sanpham-gia">
            		<h5 style="color:red;"<?php echo $rows3['gia']?></h5>
            	</div>
            
            
            <a href="index.php?manage=Product&v=vde&l=en&id=<?php echo $rows3['idsp']?>">
            <div class="sanpham-thongtin">
            </div>
            </a>
        
       	</div> 
     <?php } ?>
    </div>
</div>  