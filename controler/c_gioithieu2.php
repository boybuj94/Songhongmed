<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/gioithieu-en.php');
		}
	}else{
		include('view/gioithieu-vi.php');	
	}
?>