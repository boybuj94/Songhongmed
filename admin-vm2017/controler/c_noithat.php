<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql = "SELECT * FROM noithat";
			$noithat = mysqli_query($con,$sql);
			include('view/v_noithat.php');
		}else if($ac == 'add'){

			include('view/v_noithat.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM noithat WHERE idnt='{$id}'";
			$noithat = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($noithat);
			include('view/v_noithat.php');
			
		}else if($ac == 'xoa'){
			include('model/m_noithat.php');
		}
	}
?>