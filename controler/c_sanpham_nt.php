<?php
	// phân trang
	if(!isset($_GET['page'])){
		$_GET['page'] = 1 ;	
	}
	$start = ($_GET['page']-1)*5;
	//
	if(isset($_REQUEST['l'])){
		if(isset($_REQUEST['v'])){
			
			$v = $_REQUEST['v'];
			if($v == "vpr"){
				$sql2 = "SELECT * FROM sanpham_nt WHERE ngonngu='1'";
				$sanpham_nt2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham_nt2);
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='1' AND idnt != 2 AND idnt != 1 order by idsp desc limit $start,5 ";
				$sanpham_nt = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				include("view/sanpham-nt-en.php");
			}else if($v == "vgr"){ // nhomsp-en.php
				$id = $_REQUEST['id']; // idnt
				$sql2 = "SELECT * FROM sanpham_nt WHERE idnt = '{$id}'";

				$sql = "SELECT * FROM noithat WHERE idnt = '{$id}' AND idnt != 1";
				$sanpham_nt = mysqli_query($con,$sql2);
				$noithat = mysqli_query($con,$sql);
				$rows2 = mysqli_fetch_array($noithat);
				include("view/nhomsp-nt-en.php");
			}else if($v == "vsp"){ // vsp == view species == xem loại ----- loaisp-en
				$sql2 = "SELECT * FROM sanpham_nt WHERE ngonngu='1' AND idnt ='1'";
				$sanpham_nt2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham_nt2);
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='1' AND idnt != 2 AND idnt = '1' order by idsp desc limit $start,5 ";
				$sanpham_nt = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				include("view/loaisp-en.php");	
			}else if($v == "vde"){ // chitietsp
				$id = $_REQUEST['id']; // idsp
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='1' AND idsp = '{$id}' AND idnt != 1";
				$sp = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($sp);
				$sql2 = "SELECT * FROM noithat WHERE idnt = (SELECT idnt FROM sanpham_nt WHERE sanpham_nt.ngonngu='1' AND idsp = '{$id}')";
				$noithat2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($noithat2);
				$sql3 = "SELECT * FROM sanpham_nt WHERE ngonngu='1' AND idnt = '{$rows2['idnt']}' AND idsp != {$id}";
				$loai = mysqli_query($con,$sql3);		
				
				
				include("view/chitietsp-en.php");
			}
		}else if(isset($_REQUEST['seach'])){
				$noidung = $_REQUEST['text_seach'];
				$sql = "SELECT * FROM sanpham_nt WHERE tensp Like'%$noidung%' OR masp Like'%$noidung%' AND ngonngu = '1'"; // chọn tất cả thông tin từ
				$ketqua = mysqli_query($con,$sql);									  //các bảng, với khóa gần đúng bằng sd like
				$nrows = mysqli_num_rows($ketqua);
				include ('view/v_timkiem.php');
			}
	}else{   // ngôn ngữ tiếng việt

		if(isset($_REQUEST['v'])){
				$v = $_REQUEST['v'];
			if($v == "vpr"){
				$sql2 = "SELECT * FROM sanpham_nt WHERE ngonngu='0'";
				$sanpham_nt2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham_nt2);
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='0' order by idsp desc limit $start,5";
				$sanpham_nt = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				include("view/sanpham-nt-vi.php");
			}else if($v == "vgr"){ // nhomsp-vi.php
				$id = $_REQUEST['id']; // idnt
				$sql2 = "SELECT * FROM sanpham_nt WHERE idnt = '{$id}'";
				$sanpham_nt = mysqli_query($con,$sql2);
				
				$sql = "SELECT * FROM noithat WHERE idnt = '{$id}'";	
				$noithat = mysqli_query($con,$sql);
				$rows2 = mysqli_fetch_array($noithat);
				include("view/nhomsp-nt-vi.php");
			}else if($v == "vsp"){ // vsp == view species == xem loại ----- loaisp-vi
				$sql2 = "SELECT * FROM sanpham_nt WHERE ngonngu='0' AND idnt ='1'";
				$sanpham_nt2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($sanpham_nt2);
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='0' AND idnt != 2 AND idnt = '1' order by idsp desc limit $start,5 ";
				$sanpham_nt = mysqli_query($con,$sql);
				$sotrang = floor($num/5)+1;
				include("view/loaisp-vi.php");		
			}else if($v == "vde"){ // chitietsp
				$id = $_REQUEST['id']; // idsp
				$sql = "SELECT * FROM sanpham_nt WHERE ngonngu='0' AND idsp = '{$id}'";
				$sp = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($sp);
				$sql2 = "SELECT * FROM noithat WHERE idnt = (SELECT idnt FROM sanpham_nt WHERE sanpham_nt.ngonngu='0' AND idsp = '{$id}')";
				$noithat2 = mysqli_query($con,$sql2);		
				$rows2 = mysqli_fetch_array($noithat2);
				$sql3 = "SELECT * FROM sanpham_nt WHERE ngonngu='0' AND idnt = '{$rows2['idnt']}' AND idsp != {$id}";
				$loai = mysqli_query($con,$sql3);		
				
				
				include("view/chitietsp-vi.php");
			}
		}if(isset($_REQUEST['seach'])){
				$noidung = $_REQUEST['text_seach'];
				$sql = "SELECT * FROM sanpham_nt WHERE tensp Like'%$noidung%' OR masp Like'%$noidung%' AND ngonngu = '0'"; // chọn tất cả thông tin từ
				$ketqua = mysqli_query($con,$sql);									  //các bảng, với khóa gần đúng bằng sd like
				$nrows = mysqli_num_rows($ketqua);
				include ('view/v_timkiem-en.php');
			}
	}
?>
