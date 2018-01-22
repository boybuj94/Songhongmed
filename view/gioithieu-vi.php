
<div class="tintuc">
	<?PHP
		$sql = "SELECT * FROM tintuc WHERE ngonngu = '0' AND tags = '3' order by idtin DESC LIMIT 1";
		$gioithieu = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($gioithieu);

	?>

		<h4><?php echo $row['tieude'];?></h4>
		<h5><?php echo $row['tomtat'];?></h5>
		<div class="tintuc-noidung"><?php echo html_entity_decode($row['noidung']);?></div>
		<img style = "margin-left: 10%;" src="admin-vm2017/<?php echo $row['img'];?>" width="70%"  title="<?php echo $row['img'];?>"/>
		
</div>