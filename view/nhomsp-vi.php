<!-- line -->
<!-- <div class="title-h2" style="margin:auto;">
    <a href="index.php?manage=Product&amp;v=vpr&amp;l=en" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h2><?php echo ucfirst(mb_strtoupper($rows2['tendm'],'UTF-8'));?></h2>
    </a>
</div>
<div class="content-line">
    <div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
</div> -->
<!-- list sp -->
<!-- <?php
    if (isset($_REQUEST['id'])){
        $iddm = $_REQUEST['id'];
        if($iddm ==100){ // trường hợp danh mục là sp khác ?>
            <div class="list-nhom">
                    <?php while($rows=mysqli_fetch_array($sanpham)){ ?>
                    <div class="sanpham">
                        <div class="sanpham-title">
                            <h5>
                            <?php echo $rows['tensp']?>   
                            </h5>
                        </div>
                        <div class="content-sanpham-info2">
                            <h5><?php echo $rows['masp'];?></h5>
                            <h5>Made in: <?php echo $rows['hangsp'];?></h5>
                        </div>
                        
                        <div class="sanpham-img" style="background-image:url(admin-vm2017/public/img/anh/<?php echo $rows['img']?>)">
                        </div>
                        <div class="sanpham-thongtin">
                            <img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
                        </div>
                       
                    </div>
                    
                    <?php } ?>
                </div>
    <?php
        }else {
    ?>


<div class="list-nhom">
    <div class="content-sanpham">
    <?php
        while($rows = mysqli_fetch_array($sanpham)){
    ?>
        <div class="content-sanpham-noibat">

            <div class="content-sanpham-img">
                <img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
            </div>
            <div class="content-sanpham-title"><h4><?php echo ucfirst(mb_strtoupper($rows['tensp'],'UTF-8')); ?></h4></div>
            <div class="content-sanpham-info">
                <h4><?php echo $rows['masp'];?></h4>
                <h5 style="padding-bottom: 5px;">Xuất xứ: <?php echo $rows['hangsp'];?></h5>
                <p style="font-size: 14px;line-height:1.5;"><?php echo $rows['baiviet']; //strip_tags(strstr ?>
                </p>
                <p style="font-size: 14px !important;line-height:1.5;"><?php echo $rows['thongtin']; ?></p>
            </div>
            
             
        </div>
    
    
    <?php }
    }
}
    ?>
    
        <div class="clear-fix"></div> <!-- CHO CONTENT-SANPHAM KHÔNG TRÔI RA KHỎI CLASS CONTENT -->
    </div>
</div> -->