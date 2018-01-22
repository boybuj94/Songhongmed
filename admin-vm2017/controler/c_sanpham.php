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
			$sql2 = "SELECT idsp FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm";
			$sanpham2 = mysqli_query($con,$sql2);	
			$num = mysqli_num_rows($sanpham2);	
			
			$sql = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm order by idsp desc limit $start,10";
			$sanpham = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_sanpham.php');
		
		
		// thêm sản phẩm
		}else if($ac == 'add'){

			include('view/v_sanpham.php');
		}else if($ac == 'sua' || $ac == 'ct' ){
			$id = $_REQUEST['id'];
			$sql = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE danhmuc.iddm=sanpham.iddm AND idsp='{$id}'";
			$sanpham = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($sanpham);
			include('view/v_sanpham.php');
			
		}else if($ac == 'xoa'){
			include('model/m_sanpham.php');
		}
	}else if($_REQUEST['search']){
		$text = $_REQUEST['text_s'];
		// đếm số dữ liệu tìm được
		$sql2 = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE (danhmuc.iddm=sanpham.iddm AND tensp LIKE '%{$text}%')  OR (danhmuc.iddm=sanpham.iddm AND masp LIKE '%{$text}%')";
			$sanpham2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($sanpham2);
			
		$sql = "SELECT tensp,masp,danhmuc.iddm,tendm,sanpham.ngonngu,idsp,hangsp,thongtin,baiviet,sanpham.img,noibat FROM danhmuc,sanpham WHERE (danhmuc.iddm=sanpham.iddm AND tensp LIKE '%{$text}%')  OR (danhmuc.iddm=sanpham.iddm AND masp LIKE '%{$text}%') order by idsp desc limit $start,10";
			$sanpham = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_sanpham.php');
	}
?>