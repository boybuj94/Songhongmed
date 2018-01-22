<?php
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){			
			$sql2 = "SELECT * FROM item order by ngonngu asc";
			$item2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($item2);
			// phân trang
			$sql = "SELECT tendm,tenitem,item.ngonngu,iditem FROM item,download WHERE item.iddm=download.iddm order by iditem desc limit $start,10";
			$item = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;

			include('view/v_item.php');
		}else if($ac == 'add'){

			include('view/v_item.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = " SELECT tendm,tenitem,item.ngonngu,iditem,download.iddm FROM item,download WHERE iditem='{$id}' AND item.iddm=download.iddm "; // ---------- CHÚ Ý CHỐ NÀY
			$item = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($item);
			include('view/v_item.php');
			
		}else if($ac == 'xoa'){
			include('model/m_item.php');
		}
	}
?>