<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/giohang-en.php');
		}
	}else{
		include('view/modules/giohang-vi.php');	
		
	}
?>