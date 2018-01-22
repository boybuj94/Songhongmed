<?php
	include('models/config.php');
	if (isset($_REQUEST['l'])){
		$lang = $_REQUEST['l'];
		if($lang=='en'){
			$sql = "SELECT * FROM danhmuc WHERE ngonngu='1'";
			$menu = mysqli_query($con,$sql);
			
			if(isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
				$sql4 = "SELECT img,tendm FROM danhmuc WHERE ngonngu='1' AND iddm = '{$id}'";
				$slide = mysqli_query($con,$sql4);
				$rows4 = mysqli_fetch_array($slide);

			}else{
			$sql4 = "SELECT img,tendm FROM danhmuc WHERE ngonngu='1' limit 1";
				$slide = mysqli_query($con,$sql4);
				$rows4 = mysqli_fetch_array($slide);
					
				$sql5 = "SELECT img,tendm FROM danhmuc WHERE ngonngu='1' limit 1,20";
				$slide5 = mysqli_query($con,$sql5);

			}
				include ('view/modules/menu-left-en.php');
		}
	}else{
		$sql = "SELECT * FROM danhmuc WHERE ngonngu='0'";
		$menu = mysqli_query($con,$sql);
		
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
			$sql4 = "SELECT img,tendm FROM danhmuc WHERE iddm = '{$id}'";
			$slide = mysqli_query($con,$sql4);
			$rows4 = mysqli_fetch_array($slide);

		}else{
		$sql4 = "SELECT img,tendm FROM danhmuc limit 1";
			$slide = mysqli_query($con,$sql4);
			$rows4 = mysqli_fetch_array($slide);
				
			$sql5 = "SELECT img,tendm FROM danhmuc limit 1,20";
			$slide5 = mysqli_query($con,$sql5);

		}
		include('view/modules/menu-left-vi.php');	
	}
?>