<?php
	include('models/config.php');
	if (isset($_REQUEST['l'])){
		$lang = $_REQUEST['l'];
		if($lang=='en'){
			$sql = "SELECT * FROM noithat WHERE ngonngu='1' AND idnt != '2' AND idnt != '1'";
			$menu = mysqli_query($con,$sql);
			
			if(isset($_REQUEST['id'])){
				$id = $_REQUEST['id'];
				$sql4 = "SELECT img,tennt FROM noithat WHERE ngonngu='1' AND idnt = '{$id}'  AND idnt != '2' AND idnt != '1'";
				$slide = mysqli_query($con,$sql4);
				$rows4 = mysqli_fetch_array($slide);

			}else{
			$sql4 = "SELECT img,tennt FROM noithat WHERE ngonngu='1' AND idnt != '2' AND idnt != '1' limit 1 ";
				$slide = mysqli_query($con,$sql4);
				$rows4 = mysqli_fetch_array($slide);
					
				$sql5 = "SELECT img,tennt FROM noithat WHERE ngonngu='1'  AND idnt != '2' AND idnt != '1' limit 1,20";
				$slide5 = mysqli_query($con,$sql5);

			}
				include ('view/modules/menu-left-nt-en.php');
		}
	}else{
		$sql = "SELECT * FROM noithat WHERE ngonngu='0' AND idnt != '2' AND idnt != '1'";
		$menu = mysqli_query($con,$sql);
		
		if(isset($_REQUEST['id'])){
			$id = $_REQUEST['id'];
			$sql4 = "SELECT img,tennt FROM noithat WHERE idnt = '{$id}' AND idnt != '2' AND idnt != '1'";
			$slide = mysqli_query($con,$sql4);
			$rows4 = mysqli_fetch_array($slide);

		}else{
		$sql4 = "SELECT img,tennt FROM noithat WHERE idnt != '2' AND idnt != '1' limit 1";
			$slide = mysqli_query($con,$sql4);
			$rows4 = mysqli_fetch_array($slide);
				
			$sql5 = "SELECT img,tennt FROM noithat WHERE idnt != '2' AND idnt != '1' limit 1,20";
			$slide5 = mysqli_query($con,$sql5);

		}
		include('view/modules/menu-left-nt-vi.php');	
	}
?>