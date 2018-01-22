<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if($ac == 'add'){

			include('view/v_tintuc.php');
		}
	}
?>