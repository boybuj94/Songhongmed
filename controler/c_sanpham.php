<?php
	// phân trang
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*10;
	//
	if(isset($_REQUEST['l'])){
		if(isset($_REQUEST['v'])){
			
			$v = $_REQUEST['v'];
			if($v == "vpr"){
				$sql2 = "SELECT * FROM sanpham WHERE ngonngu='1'";
				$sanpham2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham2);
				$sql = "SELECT * FROM sanpham WHERE ngonngu='1' AND iddm != 100 order by idsp desc limit $start,5 ";
				$sanpham = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				include("view/sanpham-en.php");
			}else if($v == "vgr"){ // nhomsp-en.php
				$id = $_REQUEST['id']; // iddm
				$sql2 = "SELECT * FROM sanpham WHERE iddm = '{$id}'";

				$sql = "SELECT * FROM danhmuc WHERE iddm = '{$id}'";
				$sanpham = mysqli_query($con,$sql2);
				$danhmuc = mysqli_query($con,$sql);
				$rows2 = mysqli_fetch_array($danhmuc);
				include("view/nhomsp-en.php");
			}else if($v == "vsp"){ // vsp == view species == xem loại ----- loaisp-en
				$id = $_REQUEST['id']; // idloai
				$sql = "SELECT * FROM loai WHERE ngonngu='1' AND idloai = '{$id}'";
				$loai = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($loai);
				
				$sql2 = "SELECT tendm FROM danhmuc,loai WHERE danhmuc.ngonngu='1' AND loai.iddm=danhmuc.iddm AND idloai = '{$id}'";
				$danhmuc2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($danhmuc2);
				
				include("view/loaisp-en.php");	
			}else if($v == "vde"){ // chitietsp
				$id = $_REQUEST['id']; // idsp
				$sql = "SELECT * FROM sanpham WHERE ngonngu='1' AND idsp = '{$id}'";
				$sp = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($sp);
				$sql2 = "SELECT * FROM danhmuc WHERE iddm = (SELECT iddm FROM sanpham WHERE sanpham.ngonngu='1' AND idsp = '{$id}')";
				$danhmuc2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($danhmuc2);
				$sql3 = "SELECT * FROM sanpham WHERE ngonngu='1' AND iddm = '{$rows2['iddm']}' AND idsp != {$id}";
				$loai = mysqli_query($con,$sql3);		
				
				
				include("view/chitietsp-en.php");
			}
		}else if(isset($_REQUEST['seach'])){
				$noidung = $_REQUEST['text_seach'];
				$sql = "SELECT * FROM sanpham WHERE tensp Like'%$noidung%' OR masp Like'%$noidung%' AND ngonngu = '1'"; // chọn tất cả thông tin từ
				$ketqua = mysqli_query($con,$sql);									  //các bảng, với khóa gần đúng bằng sd like
				$nrows = mysqli_num_rows($ketqua);
				include ('view/v_timkiem.php');
			}
	}else{   // ngôn ngữ tiếng việt

		if(isset($_REQUEST['v'])){
				$v = $_REQUEST['v'];
			if($v == "vpr"){
				$sql2 = "SELECT * FROM sanpham WHERE ngonngu='0'";
				$sanpham2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham2);
				$sql = "SELECT * FROM sanpham WHERE ngonngu='0' AND idloai != 100 order by idsp desc limit $start,5";
				$sanpham = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				// echo "lkashdkjasdjks".$sanpham.$sotrang;
				include("view/sanpham-vi.php");
			}else if($v == "vgr"){ // nhomsp-vi.php
				$id = $_REQUEST['id']; // iddm
				$sql2 = "SELECT * FROM sanpham WHERE idloai = '{$id}'";
				$sanpham = mysqli_query($con,$sql2);
				
				$sql = "SELECT * FROM danhmuc WHERE iddm = '{$id}'";	
				$danhmuc = mysqli_query($con,$sql);
				$rows2 = mysqli_fetch_array($danhmuc);
				include("view/nhomsp-vi.php");
			}else if($v == "vsp"){ // vsp == view species == xem loại ----- loaisp-vi
				$id = $_REQUEST['id']; // idloai
				$sql = "SELECT * FROM loai WHERE ngonngu='0' AND idloai = '{$id}'";
				$loai = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($loai);
				
				$sql2 = "SELECT tendm FROM danhmuc,loai WHERE danhmuc.ngonngu='0' AND loai.iddm=danhmuc.iddm AND idloai = '{$id}'";
				$danhmuc2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($danhmuc2);
				
				include("view/loaisp-vi.php");	
			}else if($v == "vde"){ // chitietsp
				$id = $_REQUEST['id']; // idsp
				$sql = "SELECT * FROM sanpham WHERE ngonngu='0' AND idsp = '{$id}'";
				$sp = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($sp);
				$sql2 = "SELECT * FROM danhmuc WHERE iddm = (SELECT iddm FROM sanpham WHERE sanpham.ngonngu='0' AND idsp = '{$id}')";
				$danhmuc2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($danhmuc2);
				$sql3 = "SELECT * FROM sanpham WHERE ngonngu='0' AND iddm = '{$rows2['iddm']}' AND idsp != {$id}";
				$loai = mysqli_query($con,$sql3);		
				
				
				include("view/chitietsp-vi.php");
			}
		}if(isset($_REQUEST['seach'])){
				$noidung = $_REQUEST['text_seach'];
				$sql = "SELECT * FROM sanpham WHERE tensp Like'%$noidung%' OR masp Like'%$noidung%' AND ngonngu = '0'"; // chọn tất cả thông tin từ
				$ketqua = mysqli_query($con,$sql);									  //các bảng, với khóa gần đúng bằng sd like
				$nrows = mysqli_num_rows($ketqua);
				include ('view/v_timkiem-en.php');
			}
	}
?>
