<?php
	
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql = "SELECT * FROM lienhe ORDER BY idlh DESC";
			$lienhe = mysqli_query($con,$sql);
			include('view/v_lienhe.php');
		}else if($ac == 'add'){
			include('view/v_lienhe.php');
		}else if($ac == 'rep'){
			$id = $_REQUEST['id'];
			include('view/v_lienhe.php');
		}else if($ac == 'ct'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM lienhe WHERE idlh = '{$id}' ";
			$lienhe = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($lienhe);
			include('view/v_lienhe.php');
		}else if($ac == 'xoa'){
			include('model/m_lienhe.php');
		}
	}
?>