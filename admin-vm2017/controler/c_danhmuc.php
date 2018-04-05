<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql = "SELECT * FROM danhmuc";
			$danhmuc = mysqli_query($con,$sql);
			
			include('view/v_danhmuc.php');
		}else if($ac == 'add'){

			include('view/v_danhmuc.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM danhmuc WHERE iddm='{$id}'";
			$danhmuc = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($danhmuc);
			include('view/v_danhmuc.php');
			
		}else if($ac == 'xoa'){
			include('model/m_danhmuc.php');
		}
	}
?>