<?php
	include("config.php");
	if(isset($_REQUEST['check'])){
		$imei = $_REQUEST['imei'];
		$sbh = $_REQUEST['sobaohanh'];

		// kiểm tra có dư liệu sản phẩm
			$sql = "SELECT * FROM donhang WHERE madon = '{$sbh}' OR sdt = '{$sbh}'";
			$donhang = mysqli_query($con,$sql);
			$num = mysqli_num_rows($donhang);
			$rows = mysqli_fetch_array($donhang);
			if($num == '0'){
				echo "<script>";
				echo "alert('Không tồn tại dữ liệu về số bảo hành/số điện thoại của quý khách trên hệ thông');";
				echo "window.location.href='../index.php?manage=Support';";
				echo "exit();";
				echo "</script>";
			}else{
				echo "<script>";
				echo "window.location.href='../index.php?manage=Support&v=bh&id={$rows['iddon']}&sr={$imei}';";
				echo "exit();";
				echo "</script>";
			}
	
	}
?>