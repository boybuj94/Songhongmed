<?php
	if (isset($_REQUEST['l'])){
		$l = $_REQUEST['l'];
		if($l=='en'){
			//$sql1 = "SELECT * FROM tintuc WHERE ngonngu = '0' ORDER BY idtin DESC LIMIT 1";
			//$tin1= mysqli_query($con,$sql1);
			//$rows = mysqli_fetch_array ($tin1);
			$sql0 = "SELECT * FROM tintuc WHERE ngonngu = '1' AND  tags != '3' AND  tags != '4'  ORDER BY idtin DESC LIMIT 1"; // lấy trường 1
			$tin0 = mysqli_query($con,$sql0);
			$sql = "SELECT * FROM tintuc WHERE ngonngu = '1' AND  tags != '3' AND  tags != '4' ORDER BY idtin DESC LIMIT 1,5"; // lấy 5 trường bỏ trường 1
			$tin= mysqli_query($con,$sql);
			$tin5= mysqli_query($con,$sql);
			
			$sql1 = "SELECT * FROM tintuc WHERE ngonngu = '1' AND tags = '0'";
			$tin1 = mysqli_query($con,$sql1);
			$num1 = mysqli_num_rows($tin1);

			$sql2 = "SELECT * FROM tintuc WHERE ngonngu = '1' AND tags = '1'";
			$tin2 = mysqli_query($con,$sql2);
			$num2 = mysqli_num_rows($tin2);

			$sql3 = "SELECT * FROM tintuc WHERE ngonngu = '1' AND tags = '2'";
			$tin3 = mysqli_query($con,$sql3);
			$num3 = mysqli_num_rows($tin3);

			$sql6 = "SELECT * FROM tintuc WHERE ngonngu = '1' AND tags = '4'";
			$tin6 = mysqli_query($con,$sql6);
			
		if(isset($_REQUEST['v'])){
			$v = $_REQUEST['v'];

if($v == 'vde'){
					$id = $_REQUEST['id'];
					$sql = "SELECT * FROM tintuc WHERE ngonngu = '1' AND idtin = '{$id}'";
					$tin1 = mysqli_query($con,$sql);
					$rows1 = mysqli_fetch_array ($tin1);
				}
			}
			include ('view/tintuc-en.php');
		}
	}else{ // tiếng việt
			if(isset($_REQUEST['v'])){
				$v = $_REQUEST['v'];
				if($v == 'vde'){
					$id = $_REQUEST['id'];
					$sql = "SELECT * FROM tintuc WHERE ngonngu = '0' AND idtin = '{$id}'";
					$tin1 = mysqli_query($con,$sql);
					$rows1 = mysqli_fetch_array ($tin1);
				}else if($v == 'vac' || $v == 'vtr' || $v == 'vgu' || $v == 'qa' ){
			
					$sql1 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '0' LIMIT 5";
					$tin1 = mysqli_query($con,$sql1);
					$num1 = mysqli_num_rows($tin1);

					$sql2 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '1' LIMIT 5";
					$tin2 = mysqli_query($con,$sql2);
					$num2 = mysqli_num_rows($tin2);

					$sql3 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '2' LIMIT 5";
					$tin3 = mysqli_query($con,$sql3);
					$num3 = mysqli_num_rows($tin3);

					$sql6 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '4' LIMIT 5";
					$tin6 = mysqli_query($con,$sql6);
					
				}
			}else{
					//$sql1 = "SELECT * FROM tintuc WHERE ngonngu = '0' ORDER BY idtin DESC LIMIT 1";
					//$tin1= mysqli_query($con,$sql1);
					//$rows = mysqli_fetch_array ($tin1);
					$sql0 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND  tags != '3' AND  tags != '4' ORDER BY idtin DESC LIMIT 1"; // lấy trường 1
					$tin0 = mysqli_query($con,$sql0);
					$sql = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags != '3' AND  tags != '4'  ORDER BY idtin DESC LIMIT 1,5"; // lấy 5 trường bỏ trường 1
					$tin= mysqli_query($con,$sql);
					$tin5= mysqli_query($con,$sql);
					
					$sql1 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '0'";
					$tin1 = mysqli_query($con,$sql1);
					$num1 = mysqli_num_rows($tin1);

					$sql2 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '1'";
					$tin2 = mysqli_query($con,$sql2);
					$num2 = mysqli_num_rows($tin2);

					$sql3 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '2'";
					$tin3 = mysqli_query($con,$sql3);
					$num3 = mysqli_num_rows($tin3);

					$sql6 = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '4' ";
					$tin6 = mysqli_query($con,$sql6);
				}

	
			
		include('view/tintuc-vi.php');	
	}
?>