<div class='admin' style='width:100%;'>
<?php	// Hiển thị bảng các thành viên
			echo "
    	<table width='550px'  cellpadding='0' cellspacing='0' border='1' style='float:left; '>
    		<caption><p>DANH SÁCH THÀNH VIÊN MỚI</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold;font-size:10px; '>
            	<td width='40px'>STT</td>
                <td>Tên thành viên</td>
                <td>Email</td>
				<td>Số điện thoại</td>
				<td>Địa chỉ</td>
				<td>Ngày đăng ký</td>
                
                
            </tr>";
			$num = mysqli_num_rows($user);
			$i=1;
			while($rows = mysqli_fetch_array($user)){
            echo "<tr>
            	<td style='font-size:10px;'>{$i}</td>
                <td style='font-size:10px;'>{$rows['tenus']}</td>
                <td style='font-size:10px;'>{$rows['email']}</td>         
                <td style='font-size:10px;'>{$rows['sdt']}</td>
				<td style='font-size:10px;'>{$rows['diachi']}</td>
				<td style='font-size:10px;'>{$rows['ngaydk']}</td>
                
            </tr>";
			$i++;
			}

			
    	echo "</table>";
	// Hiển thị bảng các test
			echo "
    	<table width='500px'  cellpadding='0' cellspacing='0' border='1'>
    		<caption><p>DANH SÁCH ĐƠN HÀNG MỚI</p></caption>
            <tr style='text-align:center; background:#0099ff;height:45px;color:#fff; font-weight:bold;font-size:10px; '>
            	<td width='40px'>STT</td>
                <td>Tên khách hàng</td>
				<td>Sản phẩm</td>
                <td>Số điện thoại</td>
				<td>Ngày đặt hàng</td>
                
                
            </tr>";
			
			$i=1;
			while($rows2 = mysqli_fetch_array($donhang)){
            echo "<tr>
            	<td style='font-size:10px;'>{$i}</td>
                <td style='font-size:10px;'>{$rows2['tenkhach']}</td>
				<td style='font-size:10px;'>{$rows2['madon']}</td>
                <td style='font-size:10px;'>{$rows2['sdt']}</td>         
                <td style='font-size:10px;'>{$rows2['ngaydat']}
            </tr>";
			$i++;
			}

			
    	echo "</table>";
		
		?>
		</div>