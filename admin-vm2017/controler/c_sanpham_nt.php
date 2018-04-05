<?php
	// phân trang
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		
		// hiển thị sản phẩm
		if ($ac == 'v'){	
			$sql2 = "SELECT idsp FROM sanpham_nt";
			$sanpham_nt2 = mysqli_query($con,$sql2);	
			$num = mysqli_num_rows($sanpham_nt2);	
			
			$sql = "SELECT * FROM sanpham_nt order by idsp desc limit $start,10";
			$sanpham_nt = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_sanpham_nt.php');
		
		
		// thêm sản phẩm
		}else if($ac == 'add'){

			include('view/v_sanpham_nt.php');
		}else if($ac == 'sua' || $ac == 'ct' ){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM sanpham_nt WHERE idsp='{$id}'";
			$sanpham_nt = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($sanpham_nt);
			include('view/v_sanpham_nt.php');
			
		}else if($ac == 'xoa'){
			include('model/m_sanpham_nt.php');
		}
	}else if($_REQUEST['search']){
		$text = $_REQUEST['text_s'];
		// đếm số dữ liệu tìm được
		$sql2 = "SELECT tensp,masp,noithat.idnt,tennt,sanpham_nt.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham_nt.img,noibat FROM noithat,sanpham_nt WHERE (noithat.idnt=sanpham_nt.idnt AND tensp LIKE '%{$text}%')  OR (noithat.idnt=sanpham_nt.idnt AND masp LIKE '%{$text}%')";
			$sanpham_nt2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($sanpham_nt2);
			
		$sql = "SELECT tensp,masp,noithat.idnt,tennt,sanpham_nt.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham_nt.img,noibat FROM noithat,sanpham_nt WHERE (noithat.idnt=sanpham_nt.idnt AND tensp LIKE '%{$text}%')  OR (noithat.idnt=sanpham_nt.idnt AND masp LIKE '%{$text}%') order by idsp desc limit $start,10";
			$sanpham_nt = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_sanpham_nt.php');
	}
?>