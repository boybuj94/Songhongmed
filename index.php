<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link REL="SHORTCUT ICON" HREF="public/img/logo/logo-title.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="" />
<base href="http://localhost/gitProject/Songhongmed/" />
<script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
<link href="public/style/reset.css" rel="stylesheet" type="text/css" />
<link href="public/style/style.css" rel="stylesheet" type="text/css" />
<link href="public/style/responsive.css" rel="stylesheet" type="text/css" />
<link href="public/css/demo.css" rel="stylesheet" type="text/css" />
<link href="public/css/stylesp.css" rel="stylesheet" type="text/css" />
<script src="public/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="public/js/jssor.slider-22.2.16.mini.js" type="text/javascript"></script>
 <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer>
     function initialize() {
        var mapProp = {
  center:new google.maps.LatLng(20.9745107,105.8484086),
  zoom: 15,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
    }
 </script>

<title>Kỹ Thuật Y Tế Việt - Mỹ</title>
</head>

<body>

	<div class="wapper">
    	<!----- TOP ----->
       		<?php include("controler/c_top.php"); ?>
        <!----- END TOP and Menu ----->
        <!----- Content ----->
        	<?php include("controler/c_content.php");?>
            
        <!----- End Content ----->
        <div class="clear-fix"></div>
        <!----- footer ----->
        	<?php include("controler/c_footer.php");?>   
        <!----- End footer ----->
	</div>
</body>
</html>
