<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/footer-en.php');
		}
	}else{
		include('view/modules/footer-vi.php');	
	}
?>