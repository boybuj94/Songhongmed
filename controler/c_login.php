<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			if(isset($_REQUEST['ac'])){
				include ('view/modules/login-en.php');
			}else{
				include ('view/modules/login-en.php');
			}
		}
	}else{
		if(isset($_REQUEST['ac'])){
			$ac = $_REQUEST['ac'];
			if($ac == 'register'){
				include('view/modules/login-vi.php');
			
			}else if($ac == 'Forgotpassword'){
				
				include('view/modules/login-vi.php');
			}else if($ac == md5($_REQUEST['id'])){
				$email = $_REQUEST['id'];
				include('view/modules/login-vi.php');
			}
		}else{
			include('view/modules/login-vi.php');
		}
			
	}
?>