<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/lienhe-en.php');
		}
	}else{
		include('view/lienhe-vi.php');	
	}
?>