<div class="menu">
	
    <div class="menu-left">
    <div class="menu-admin">
    	<div class="menu-admin-img" style="background-image:url(public/img/anh/<?php echo $_SESSION['img'];?>)"></div>
        <div class="menu-admin-ten">
        	<p>Hi! <?php echo $_SESSION['namead'];?>,</p>
            <a onClick='javascript: return CheckSure();' href="view/modules/v_logout.php">
            Đăng xuất?
            <script language='javascript'> 
									function CheckSure(){ 
									if( window.confirm('Bạn có chắc chắn đăng xuất không?')){ 
									return true; 
									}else{ 
									return false 
									} 
									} 
									</script>
            </a>
        </div>
    </div>

        <div class="container">
                <ul class="accordion">
                    <li> 	
                        <a class="panel-heading" href="#">
                        	<div class="menu-icon" style="background-image:url(public/img/icon/icon-giaodien.png)"></div>
                            <p>Quản lý giao diện &rsaquo;&rsaquo; </p></a>
                            
                        <ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'nsp' || $ql == 'lsp' || $ql == 'gd'||$ql == 'ft'){echo "style='display: block'";}}?> >
                        
                          	<li><a href="index.php?ql=gd">&rsaquo; Chọn giao diện</a></li>
                          	<li><a href="index.php?ql=ft" >&rsaquo; Bật/tắt bộ lọc</a></li>
                            <li><a href="index.php?ql=nsp&ac=v" >&rsaquo; Menu SP</a></li>
                            <!-- <li><a href="#" class="panel-heading">&nbsp;&nbsp;&nbsp;Menu &rsaquo;&rsaquo;</a>
                            
			       				<ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'nsp' || $ql == 'lsp'){echo "style='display: block'";}}?> >
                                
					  				<li><a href="index.php?ql=nsp&ac=v">&#8226;	Nhóm SP</a></li>		      
									
                                </ul>
                    		<li>   -->
                            <li><a href="index.php?ql=nnt&ac=v" >&rsaquo; Menu NT</a></li>  
                        </ul>
                     </li>
                     <li>
                     	
                        <a href="#" class="panel-heading">
                        	<div class="menu-icon" style="background-image:url(public/img/icon/icon-sanpham.png)"></div>
                            <p>Sản phẩm</p></a>
                            <ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'sp' || $ql == 'nt'){echo "style='display: block'";}}?>>
                                <li><a href="index.php?ql=sp&ac=v">&rsaquo; Sản Phẩm</a></li>
                                <li><a href="index.php?ql=nt&ac=v">&rsaquo; Nội thất y tế</a></li>
                            </ul>
                    </li>
                     <li>
                     	
                        <a href="index.php?ql=tt&ac=v">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-tintuc.png)"></div>
                        <p>Dịch vụ</p></a></li>
                    <li>
                        
                        <a class="" href="index.php?ql=item&ac=v">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-download.png)"></div>
                        <!--<p>Download</p></a>
                        <ul class="shutter-panel-collapse" <?php //if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'cer' || $ql == 'cat'){echo "style='display: block'";}}?> >
                        
                            <li><a href="index.php?ql=dl">&rsaquo; Download</a></li>
                            <li><a href="index.php?ql=item" >&rsaquo; Item</a></li>
                            
                        </ul> -->
                    </li>
                     <li>
                     	
                        <a href="index.php?ql=sl&ac=v">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-slide.png)"></div>
                        <p>Slide</p></a>
                     </li>
					<!-- <li>
                     	
                        <a href="index.php?ql=img">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-anh.png)"></div>
                        <p>Ảnh</p></a></li>
                     <li>
                     	
                        <a href="index.php?ql=kw">
                        <div class="menu-icon" style="background-image:url(public/img/icon/key.png)"></div>
                        <p>Keyword</p></a></li>-->
                     
                     <li>
                        <a class="panel-heading" href="#">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-khac.png)"></div>
                        <p>Other ... &rsaquo;&rsaquo;</p></a>
                        	<ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'ad' || $ql == 'img' || $ql == 'key'){echo "style='display: block'";}}?>>
                            <li><a href="index.php?ql=ad&ac=v">&rsaquo; Admin</a></li>
                            
                          	<li><a href="index.php?ql=img&ac=v">&rsaquo; Ảnh</a></li>
                          	<li><a href="index.php?ql=key&ac=v" >&rsaquo; Keyword</a></li>     
                        </ul>
                     </li>
                     <li>
                        <a class="panel-heading" href="#">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-lienhe.png)"></div>
                        <p>Liên hệ &rsaquo;&rsaquo;</p></a>
                        	<ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'lh' || $ql == 'bl' ){echo "style='display: block'";}}?> >
                          	<li><a href="index.php?ql=lh&ac=v">&rsaquo; Liên hệ</a></li>  
                        </ul>
                     </li>
                     <!-- <li>
                        <a class="panel-heading" href="#">
                        <div class="menu-icon" style="background-image:url(public/img/icon/icon-thongke.png)"></div>
                        <p>Thống kê &rsaquo;&rsaquo;</p></a>
                     	<ul class="shutter-panel-collapse" <?php if(isset($_REQUEST['ql'])){$ql = $_REQUEST['ql'];if ($ql == 'tkd' || $ql == 'tksp' ){echo "style='display: block'";}}?> >
                          	<li><a href="index.php?ql=tk&ac=dh">&rsaquo; Đơn hàng</a></li>
                          	<li><a href="index.php?ql=tk&ac=sp" >&rsaquo; Sản phẩm</a></li>     
                        </ul> -->

                </ul>
         </div>
                <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
                <script src="public/js/jpix.min.js"></script>
                <script type="text/javascript">
                $(function () {
                  $('ul.tabs').pixiefyTabs();
                  $('ul.accordion').pixiefyAccordion();
                })
                </script>
        </div>
    </div>
