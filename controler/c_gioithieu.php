<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/gioithieu-en.php');
		}
	}else{
		include('view/modules/gioithieu-vi.php');	
	}
?>