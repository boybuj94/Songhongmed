<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql = "SELECT * FROM admin";
			$admin = mysqli_query($con,$sql);
			include('view/v_admin.php');
		}else if($ac == 'add'){

			include('view/v_admin.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM admin WHERE idad='{$id}'";
			$admin = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($admin);
			include('view/v_admin.php');
			
		}else if($ac == 'xoa'){
			include('model/m_admin.php');
		}
	}
?>