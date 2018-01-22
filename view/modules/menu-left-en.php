<div class="duongdan">
    <span><a href="/?l=en">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;Product</span>
</div>


<div class="menu-left2">
<div class="container">
    <!--<h3 style="padding-top:20px;margin:auto;width:auto;text-align:center;border-bottom:none;">SẢN PHẨM</h3>-->
        <ul class="accordion">
        
                <?php 
                    while($rows = mysqli_fetch_array($menu)){
                ?>
                  <li>
                    <a href="en/products/product-groups/<?php echo $rows['link_title']?>-<?php echo $rows['iddm']?>.html" class="a-menu"><?php echo $rows['tendm']?> &rsaquo;</a>
                  </li>
                  <?php
                    }
                  ?>
            </ul>
        </div>
       
</div>
 <!-- Banner san pham -->

<div class="banner-sanpham">
    <?php
        if(isset($_REQUEST['id'])){

            echo "<img src='admin-vm2017/public/img/anh/{$rows4['img']}' width = '320px'  alt='{$rows4['tendm']}' />";
        }else{
    ?>
        <link rel="stylesheet" href="public/css/free-simple-slider.css" type="text/css" media="all" />
    <link rel="stylesheet" href="public/css/style.css" type="text/css" media="all" />
    <ul id="slider-list2" class="slider-list">

        <?php
        
                echo "<li class='current'><img src='admin-vm2017/public/img/anh/{$rows4['img']}' width = '320px'  alt='{$rows4['tendm']}' /></li>";
            while($rows5 = mysqli_fetch_array($slide5)){
                echo "<li><img src='admin-vm2017/public/img/anh/{$rows5['img']}' width = '320px'  alt='{$rows5['tendm']}' /></li>";
            }
    ?>

    </ul>
    <!--end .slider-list-->

    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/hammer.min.js"></script>
    <script src="public/js/free-simple-slider.js"></script>
    <script src="public/js/scripts.js"></script>
    <?php
        }
    ?>
</div>
<div class="clear-fix"></div>

<!-- End banner -->