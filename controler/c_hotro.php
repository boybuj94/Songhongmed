<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			if(isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
				$sql = "SELECT * FROM item WHERE iditem = '{$id}'";
				$danhmuc = mysqli_query($con,$sql);
				$rows = mysqli_fetch_array($danhmuc);
			}else{
				$sql = "SELECT DISTINCT item.iddm, danhmuc.img, danhmuc.ngonngu FROM danhmuc,item WHERE item.ngonngu = '1' AND danhmuc.iddm = item.iddm"; // DISTINCT để loại bỏ bản ghi đã trùng trong 1 columns
				$danhmuc = mysqli_query($con,$sql); 
				$num = mysqli_num_rows($danhmuc);
		}
		include('view/hotro-en.php');
		}
	}else{
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM item WHERE iditem = '{$id}'";
			$danhmuc = mysqli_query($con,$sql);
			$rows = mysqli_fetch_array($danhmuc);
		}else{
			$sql = "SELECT DISTINCT item.iddm, danhmuc.img, danhmuc.ngonngu FROM danhmuc,item WHERE item.ngonngu = '0' AND danhmuc.iddm = item.iddm"; // DISTINCT để loại bỏ bản ghi đã trùng trong 1 columns
			$danhmuc = mysqli_query($con,$sql); 
			$num = mysqli_num_rows($danhmuc);
		}
		include('view/hotro-vi.php');	
	}
?>