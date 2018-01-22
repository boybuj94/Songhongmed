<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/top-en.php');
		}
	}else{
		include('view/modules/top-vi.php');	
	}
?>