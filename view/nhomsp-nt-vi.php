<!-- line -->
<div class="title-h2" style="margin:auto;">
    <a href="index.php?manage=Product2&v=vpr" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h2><?php echo ucfirst(mb_strtoupper($rows2['tennt'],'UTF-8'));?></h2>
    </a>
</div>
<div class="content-line">
    <div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
</div>
<!-- list sp -->
<?php
    if (isset($_REQUEST['id'])){
        $idnt = $_REQUEST['id'];?>
           <div class="list-nhom">
    <div class="content-sanpham">
    <?php
        while($rows = mysqli_fetch_array($sanpham_nt)){
    ?>
        <div class="content-sanpham-noibat">

            <div class="content-sanpham-img">
                <img src ="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" width="100%"/>
            </div>
            <div class="content-sanpham-title"><a href="index.php?manage=Product2&v=vde&id=<?php echo $rows['idsp']?>"><h4><?php echo ucfirst(mb_strtoupper($rows['tensp'],'UTF-8')); ?></h4></a></div>
            <div class="content-sanpham-info">
                <h4><?php echo $rows['masp'];?></h4>
                <h5 style="padding-bottom: 5px;">Xuất xứ: <?php echo $rows['hangsp'];?></h5>
                <p style="font-size: 14px;line-height:1.5;"><?php echo $rows['baiviet']; //strip_tags(strstr ?>
                </p>
                <p style="font-size: 14px !important;line-height:1.5;"><?php echo $rows['thongtin']; ?></p>
            </div> 
        </div>
    <?php 
    }
}
    ?>
    </div>
    
        <div class="clear-fix"></div> <!-- CHO CONTENT-SANPHAM KHÔNG TRÔI RA KHỎI CLASS CONTENT -->
    </div>
</div>