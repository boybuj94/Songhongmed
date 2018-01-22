<?php
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*28;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){	

			$sql2 = "SELECT * FROM img";
			$img2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($img2);
			$sotrang = floor($num/28)+1;

			$sql = "SELECT * FROM img ORDER BY idimg DESC limit $start,28";
			$img = mysqli_query($con,$sql);
			include('view/v_img.php');
		}else if($ac == 'add'){
			include('view/v_img.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM img WHERE idimg='{$id}'";
			$img = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($img);
			include('view/v_img.php');
			
		}else if($ac == 'xoa'){
			include('model/m_img.php');
		}
	}
?>