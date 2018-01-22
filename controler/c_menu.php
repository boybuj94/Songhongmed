<dir class="clear-fix"></dir>
<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			include ('view/modules/menu-en.php');
		}
	}else{
		include('view/modules/menu-vi.php');	
	}
?>
<dir class="clear-fix"></dir>