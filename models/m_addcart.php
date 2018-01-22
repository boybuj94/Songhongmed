<?php 

if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$cart=$_SESSION['cart'];
	$sql2 = "SELECT * FROM sanpham WHERE idsp = '{$id}'";
	$sanpham2 = mysqli_query($con,$sql2);
	$rows2 = mysqli_fetch_array($sanpham2); 
	if(isset($cart)){
		// kiểm tra sản phẩm có trong giỏ hàng chưa
		
		if(array_key_exists($id, $cart)){
		//kiểm tra nếu mua sp lần 2
			$cart[$id] = array(
				'sl' =>(int)$cart[$id]['sl']+1 ,
				'tensp' =>$rows2['tensp'] ,
				'masp' =>$rows2['masp'] ,
				'gia' =>$rows2['gia'] ,
				'idsp' =>$rows2['idsp'] ,
				'img' =>$rows2['img']);
			$j=0;
            foreach ($cart as $key => $value) {
                $j++;
            }
            $_SESSION['j'] = $j;
			echo "<script>";
			echo "alert('Thêm thành công sản phẩm vào giỏ hàng! 1');";
			echo "window.location.href='index.php?manage=Product&v=vde&id={$id}';";
			echo "exit();";
			echo "</script>";	
		}else {
			// nếu mua thêm sản phẩm khác	
			$cart[$id] = array(
				'sl' =>1 ,
				'idsp' =>$rows2['idsp'] ,
				'tensp' =>$rows2['tensp'] ,
				'masp' =>$rows2['masp'] ,
				'gia' =>$rows2['gia'] ,
				'img' =>$rows2['img']);
			$j=0;
            foreach ($cart as $key => $value) {
                $j++;
            }
            $_SESSION['j'] = $j;
			echo "<script>";
			echo "alert('Thêm thành công sản phẩm vào giỏ hàng! 2');";
			echo "window.location.href='index.php?manage=Product&v=vde&id={$id}';";
			echo "exit();";
			echo "</script>";
		}
	}else{
		// nếu lần đầu mua hàng
		$cart[$id] = array(
			'sl' =>1 ,
			'idsp' =>$rows2['idsp'] ,
			'tensp' =>$rows2['tensp'] ,
			'masp' =>$rows2['masp'] ,
			'gia' =>$rows2['gia'] ,
			'img' =>$rows2['img']);
		$j=0;
            foreach ($cart as $key => $value) {
                $j++;
            }
            $_SESSION['j'] = $j;
		echo "<script>";
			echo "alert('Thêm thành công sản phẩm vào giỏ hàng! 3');";
			echo "window.location.href='index.php?manage=Product&v=vde&id={$id}';";
			echo "exit();";
			echo "</script>";
	}
	$_SESSION['cart']=$cart;
}else if(isset($_REQUEST['delete'])){

	unset($_SESSION['cart'][$_REQUEST['delete']]);
	$j=0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $j++;
            }
            $_SESSION['j'] = $j;
	echo "<script>";
	echo "window.location.href='index.php?manage=cart';";
	echo "</script>";
}else if(isset($_REQUEST['thanhtoan'])){
	ob_start();
	session_start();
//
	//print_r($_POST['soluong']);
	//echo "<br>";
	//echo $_POST['soluong'][4];
	//echo "<br>";	
	//echo array_search ('3',$_POST['soluong']);
	//$idc = array_search ('3',$_POST['soluong']);

	//$i = count($_POST['soluong']); //
	// lặp theo mảng 1 chiểu soluong đến hết giá trị
	// trong khi lặp sẽ update mảng cart theo id gửi từ form sang
	 foreach ($_POST['soluong'] as $key1 => $value1) {
		$i = $_POST['soluong'][$key1]; // giá trị số lượng sau khi sửa gửi sang
		$j = array_search($_POST['soluong'][$key1],$_POST['soluong']); // idsp
		// sửa các mảng theo $j (idsp)
			include("config.php");
			$sql2 = "SELECT * FROM sanpham WHERE idsp = '{$j}'";
			$sanpham2 = mysqli_query($con,$sql2);
			$rows2 = mysqli_fetch_array($sanpham2);
			// update số lượng
			$_SESSION['cart'][$j] = array('sl' =>$i,
				'idsp' =>$rows2['idsp'] ,
				'tensp' =>$rows2['tensp'] ,
				'masp' =>$rows2['masp'] ,
				'gia' =>$rows2['gia'] ,
				'img' =>$rows2['img']
				);
			echo "<script>window.location.href='../index.php?manage=Pay';</script>";
	}

}
//echo "<pre>";
//print_r($cart);
//die;
?>