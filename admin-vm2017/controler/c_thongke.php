<?php
	// phân trang
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	if(isset($_REQUEST['ac'])){
		$ac = $_REQUEST['ac'];
		if ($ac == 'dh'){		
		// đếm số dữ liệu đơn	
			$sql2 = "SELECT * FROM donhang";
			$donhang2 = mysqli_query($con,$sql2);
			$num = mysqli_num_rows($donhang2);	
		// truy vấn
			$sql = "SELECT * FROM donhang order by iddon desc limit $start,10";
			$donhang = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_thongke.php');
		}else if($ac == 'sp'){
			$sql2 = "SELECT tensp,masp,loai.idloai,tenloai,sanpham.ngonngu,idsp,hangsp,tinhtrang,thongtin,baiviet,tag,khuyenmai,gia,soluong,img FROM loai,sanpham WHERE loai.idloai=sanpham.idloai";
			$sanpham2 = mysqli_query($con,$sql2);	
			$num = mysqli_num_rows($sanpham2);	
			
			$sql = "SELECT tensp,masp,loai.idloai,tenloai,sanpham.ngonngu,idsp,hangsp,tinhtrang,thongtin,baiviet,tag,khuyenmai,gia,soluong,img FROM loai,sanpham WHERE loai.idloai=sanpham.idloai order by idsp desc limit $start,10";
			$sanpham = mysqli_query($con,$sql);
			$sotrang = floor($num/10)+1;
			include('view/v_thongke.php');

	}
}
?>