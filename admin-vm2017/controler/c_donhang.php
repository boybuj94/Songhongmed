<?php
	// phân trang
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){		
		// đếm số dữ liệu đơn	
			$sql2 = "SELECT * FROM donhang";
			$donhang2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($donhang2);	
		// truy vấn
			$sql = "SELECT * FROM donhang order by iddon desc limit $start,10";
			$donhang = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_donhang.php');
		}else if($ac == 'add'){

			include('view/v_donhang.php');
		
		}else if($ac == 'ct'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM donhang WHERE iddon = '{$id}'";
			$donhang = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($donhang);

			$date = date('d/m/Y - H:i');
			include('view/v_donhang.php');
		}else if($ac == 'sr'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM donhang WHERE iddon = '{$id}'";
			$donhang = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($donhang);
			
			$date = date('d/m/Y - H:i');
			include('view/v_donhang.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM donhang WHERE iddon='{$id}'";
			$donhang = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($donhang);
			include('view/v_donhang.php');
			
		}else if($ac == 'xoa'){
			include('model/m_donhang.php');
		}else if($ac == 'duyet'){
			include('model/m_donhang.php');
		}
	}
?>