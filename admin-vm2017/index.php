<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Trang quản trị nội dung Website ytevietmy.com </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content=""/>
    <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/responsive.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    

</head>

<body>
<?php
ob_start();
session_start();
if (isset($_SESSION['usad']) && isset($_SESSION['passad'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("view/modules/v_top.php");
    include("controler/c_content.php");
    include("view/modules/v_footer.php");
} else {
    include("view/modules/v_login.php");
}
?>

</body>
</html>