<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			$sql = "SELECT * FROM sanpham WHERE noibat='1' AND ngonngu = '1'";
			$sanpham = mysqli_query($con,$sql);
			include ('view/modules/slide_sp-en.php');
		}
	}else{
		$sql = "SELECT * FROM sanpham WHERE noibat='1' AND ngonngu = '0'";
		$sanpham = mysqli_query($con,$sql);
		include('view/modules/slide_sp-vi.php');	
	}
?>