<?php
session_start();
ob_start();
?>
<?php
	unset($_SESSION['usad']);
	unset($_SESSION['passad']);
	unset($_SESSION['idad']);
	unset($_SESSION['namead']);
	unset($_SESSION['quyen']);
	unset($_SESSION['img']);
	header("location:../../index.php");
?>