<?php
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql2 = "SELECT * FROM user";
			$user2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($user2);

			$sql = "SELECT * FROM user Order by idus desc limit $start,10";
			$user = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;

			include('view/v_us.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM user WHERE idus='{$id}'";
			$user = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($user);
			include('view/v_user.php');
		}else if($ac == 'xoa'){
			include('model/m_us.php');
		}
	}
?>