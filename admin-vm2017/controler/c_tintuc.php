<?php
	if(!isset($_GET['page'])){
			$_GET['page'] = 1 ;	
		}
		$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'v'){
			// phân trang
					
		
			// đếm số dữ liệu tin 
			$sql2 = "SELECT * FROM tintuc";
			$tintuc2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($tintuc2);
			$sotrang = floor($num/10)+1;
			
			$sql = "SELECT * FROM tintuc order by idtin desc limit $start,10";
			$tintuc = mysqli_query($con,$sql);
			include('view/v_tintuc.php');
		}else if($ac == 'add'){

			include('view/v_tintuc.php');
		}else if($ac == 'sua'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM tintuc WHERE idtin='{$id}'";
			$tintuc = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($tintuc);
			include('view/v_tintuc.php');
		}else if($ac == 'ct'){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM tintuc WHERE idtin='{$id}'";
			$tintuc = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($tintuc);
			include('view/v_tintuc.php');	
		}else if($ac == 'xoa'){
			include('model/m_tintuc.php');
		}
	}else if($_REQUEST['search_t']){
		$text = $_REQUEST['text_s'];
		
			// đếm số dữ liệu tin 
			$sql2 = "SELECT * FROM tintuc WHERE tieude LIKE '%{$text}%' ";
			$tintuc2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($tintuc2);
			$sotrang = floor($num/10)+1;
			
			$sql = "SELECT * FROM tintuc WHERE tieude LIKE '%{$text}%' order by idtin asc limit $start,10";
			$tintuc = mysqli_query($con,$sql);
			include('view/v_tintuc.php');
		}
?>