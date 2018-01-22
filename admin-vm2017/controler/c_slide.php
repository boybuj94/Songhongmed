<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql = "SELECT * FROM slide ORDER BY idsl DESC";
			$slide = mysqli_query($con,$sql);
			include('view/v_slide.php');
		}else if($ac == 'add'){
			include('view/v_slide.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM slide WHERE idsl='{$id}'";
			$slide = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($slide);
			include('view/v_slide.php');
			
		}else if($ac == 'xoa'){
			include('model/m_slide.php');
		}
	}
?>