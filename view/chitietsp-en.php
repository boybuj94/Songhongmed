<title>Products</title>
<div class="duongdan">
	<span><a href="/">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vpr&l=en">Products</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vgr&l=en&id=<?php echo $rows2['iddm']?>"><?php echo $rows2['tendm']?></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="index.php?manage=Product&v=vsp&l=en&id=<?php echo $rows2['idloai']?>"><?php echo $rows2['tenloai']?></a>
    </span>
</div>
<div class="nhom-sp" style="border:none;">
	<div class = "chitietsp-title">
   		<h4>&rsaquo; &nbsp;<?php echo ucfirst(mb_strtolower($rows['tensp'],'UTF-8'));?></h4>
    </div>
    <div class="chitietsp-ma">
    	<h3> MODELS:  <?php echo $rows['masp'];?></h3>
        <h5>Made in:  <?php echo $rows['hangsp'];?></h5>
        <h4>Price: <?php echo $rows['gia'];?></h4>
        <a href="index.php" title="Thêm vào giỏ hàng"><h6>&nbsp;&nbsp;&nbsp;.....  Add to Cart</h6></a>
    </div>
    <div class="chitietsp-img">
    	<!-- SLIDE ẢNH -->

    <script src="zoom/js/vendor/modernizr.js"></script>
    <script src="zoom/js/vendor/jquery.js"></script>
  <!-- xzoom plugin here -->
  <script type="text/javascript" src="public/js/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="zoom/css/xzoom.css" media="all" /> 
  <!-- hammer plugin here -->
  <script type="text/javascript" src="zoom/hammer.js/1.0.5/jquery.hammer.min.js"></script>  

  <link type="text/css" rel="stylesheet" media="all" href="zoom/fancybox/source/jquery.fancybox.css" />
  <link type="text/css" rel="stylesheet" media="all" href="zoom/magnific-popup/css/magnific-popup.css" />
  <script type="text/javascript" src="zoom/fancybox/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="zoom/magnific-popup/js/magnific-popup.js"></script>       
    <!-- lens options start -->
    <section id="lens">
    <div class="row">
      <div class="large-5 column">
        <div class="xzoom-container">
          <img class="xzoom3" src="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" xoriginal="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>"/>
          <div class="xzoom-thumbs">
            <a href="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" ><img class="xzoom-gallery3" width="80" height="80" src="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>"  xpreview="admin-vm2017/public/img/anh/<?php echo $rows['img'];?>" title="Xem ảnh">
            </a>
          </div>
		<h6 style="color:#999; font-weight:normal">Note: Scroll Mouse to zoom lens!</h6>
        </div>        
      </div>
      <div class="large-7 column"></div>
    </div>
    </section>   
    <!-- lens options end -->

    <script src="public/js/foundation.min.js"></script>
    <script src="public/js/setup.js"></script>
 
        <!--- AND ---->
    </div>
    
    	<!-- Thông tin sp -->
    <div class="chitietsp-thongtin">
    	
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

	<link rel="stylesheet" type="text/css" href="public/style/style_info.css" />
	<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="public/js/jquery.multipurpose_tabcontent.js"></script>

<script type="text/javascript">
		$(document).ready(function(){

			$(".first_tab").champ();

			$(".accordion_example").champ({
                plugin_type :  "accordion",
                side : "left",
                active_tab : "3",
                controllers : "true"
			});

			$(".second_tab").champ({
                plugin_type :  "tab",
                side : "right",
                active_tab : "1",
                controllers : "false"
			});

			$(".third_tab").champ({
                plugin_type :  "tab",
                side : "",
                active_tab : "4",
                controllers : "true",
                ajax : "true",
                show_ajax_content_in_tab : "4",
                content_path : "html.txt"
			});
				
		});
	</script>
	<div class="wrapper">
		<div class="tab_wrapper first_tab">
			<ul class="tab_list">
				<li class="active">Product information</li>
				<li>Digital</li>		
			</ul>
			<div class="content_wrapper">
				<div class="tab_content active" style="margin-left:20px">
					
					<p><?php echo $rows['baiviet'];?></p>
				</div>

				<div class="tab_content" style="margin-left:20px">
					
					<p><?php echo $rows['thongtin'];?></p>
				</div>
			</div>
		</div>
	</div>
    </div>
		<!-- AND thông tin -->
    <div class="sp-lienquan">
    	<h4>RELATED PRODUCTS</h4>
	<div class="sp-loai">
    	<div class="loai-title">
        	<h3 style="width:100%;"><a href="index.php?manage=Product&v=vsp&id=<?php echo $rows['idloai'];?>" title="">&nbsp;&Xi;&nbsp;<?php echo mb_strtoupper($rows2['tenloai'],'UTF-8')?></a></h3>
        </div>
        <?php while ($rows3 = mysqli_fetch_array($loai)){?>
     
      <div class="sanpham">	
            <div class="sanpham-img" style="background-image:url(admin-vm2017/public/img/anh/<?php echo $rows3['img'];?>)"> 
            </div>
            <div class="sanpham-title"><h5><a href="index.php?manage=Product&v=vde&id=<?php echo $rows3['idsp'];?>" title=""><?php echo ucfirst(mb_strtolower($rows3['tensp'],'UTF-8')).'&nbsp;'.$rows3['masp']?></a></h5>	
            	<div class="sanpham-gia">
            		<h5 style="color:red;"><?php echo $rows3['gia'];?></h5>
            	</div>
            </div>
            
            	<div class="sanpham-thongtin">
            	<div class="sanpham-thongtin_a"><a href="index.php?manage=Product&v=vde&l=en&id=<?php echo $rows3['idsp'];?>">- CPU:	Core i3 5005U <br />

                  - RAM/ HDD:	4Gb/ 500Gb <br />
  
                  - Màn hình:	14.0Inch <br />
  
                  - VGA:	VGA onboard, Intel HD Graphics <br />
  
                  - HĐH:	Dos <br />
  
                  - Màu sắc/ Chất liệu:	Black
                </a>
                </div>
            </div> 
        </div>
        <?php } ?>
       
    </div>
</div>  
</div>