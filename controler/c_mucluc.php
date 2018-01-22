<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/mucluc-en.php');
		}
	}else{
		include('view/modules/mucluc-vi.php');	
	}
?>