<title>Tin Tức</title>
<div class="hotro">
	
	
	<div class="tintuc">
		<div class="duongdan">
			<span><a href="/">Trang chủ</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="dich-vu.html">Công trình y tế</a></span>
			<span><a href="/">Trang chủ</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="dich-vu.html">Dịch vụ</a></span>
		</div>
		
		<?php
			if(isset($_REQUEST['v'])){
				$v = $_REQUEST['v'];



				if($v == 'vac'){ // hoat dong ?>
					<div class="title-h3" style="margin:auto;">
						<a href="dich-vu/hoat-dong.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>HOẠT ĐỘNG</h3>
						</a>
					</div>
					<div class="content-line">
						<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
					</div>
					<?php
							while ($rows1 = mysqli_fetch_array($tin1)) { // hoat dong

						?>
					<div class="tintuc-list">	
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html"><?php echo $rows1['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html">
								<img src="admin-vm2017/<?php echo $rows1['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows1['tomtat'];?>
						</div>
					</div>
			<?php
				}



				}else if($v == 'vtr'){ // training?>
					<div class="title-h3" style="margin:auto;">
						<a href="dich-vu/training.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>TRAINING</h3>
						</a>
					</div>
					<div class="content-line">
						<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
					</div>
					<?php
							while ($rows2 = mysqli_fetch_array($tin2)) { // hoat dong
						?>
					<div class="tintuc-list">				
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows2['link_title'];?>-<?php echo $rows2['idtin'];?>.html"><?php echo $rows2['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows2['link_title'];?>-<?php echo $rows2['idtin'];?>.html">
								<img src="admin-vm2017/<?php echo $rows2['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows2['tomtat'];?>
						</div>
					</div>
			<?php
				}




				}else if($v == 'vgu'){ // huong dan?>
					<div class="title-h3" style="margin:auto;">
						<a href="dich-vu/huong-dan-su-dung.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>HƯỚNG DẪN SỬ DỤNG</h3>
						</a>
					</div>
					<div class="content-line">
						<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
					</div>
					<?php
							while ($rows1 = mysqli_fetch_array($tin3)) { // hoat dong
						?>
					<div class="tintuc-list">
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html"><?php echo $rows1['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html">
								<img src="admin-vm2017/<?php echo $rows1['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows1['tomtat'];?>
						</div>
					</div>
			<?php
					}
				}else if($v == 'qa'){ // huong dan?>
					<div class="title-h3" style="margin:auto;">
						<a href="index.php?manage=News&v=vac" title="" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>CÂU HỎI THƯỜNG GẶP</h3>
						</a>
					</div>
					<div class="content-line">
						<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
					</div>
					<?php
							while ($rows6 = mysqli_fetch_array($tin6)) { // hoat dong
						?>
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows6['link_title'];?>-<?php echo $rows6['idtin'];?>.html"><?php echo $rows6['tieude'];?></a>
						</div>


					<?php
					}
				}else if($v == 'vde'){ // chi tiet ?>
					<h4><?php echo $rows1['tieude'];?></h4>
					<h5><?php echo $rows1['tomtat'];?></h5>
					<h6 style="font-weight: normal;padding-bottom: 10px;">Ngày <?php echo $rows1['thoigian'];?></h6>
					<img src="admin-vm2017/<?php echo $rows1['img'];?>" width="70%" title="<?php echo $rows1['img'];?>"/>
					<div class="tintuc-noidung"><?php echo html_entity_decode($rows1['noidung']);?></div>
					
				<?php
				}
			


			}else {

				// --------------PHẦN TRANG CHÍNH----------------------
		?>
		
		<?php		
			include("view/modules/tintuc.php"); //slide
		?>

		<!-- ------------------- hoat dong ------------------- -->
		<div class="title-h3" style="margin:auto;">
			<a href="dich-vu/hoat-dong.html" title="" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
				<h3>HOẠT ĐỘNG</h3>
			</a>
		</div>
		<div class="content-line">
			<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
		</div>
		<?php
				while ($rows1 = mysqli_fetch_array($tin1)) { // hoat dong
			?>
		
					<div class="tintuc-list">			
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html">
								<?php echo $rows1['tieude'];?>
									
							</a>
						</div>
						<div class="tintuc-img">
							<a href="<?php echo $rows1['$str'];?>-<?php echo $rows1['idtin'];?>">
								<img src="admin-vm2017/<?php echo $rows1['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows1['tomtat'];?>
						</div>
					</div>
				<?php
					}
				?>
		<div class="clear-fix"></div>
		<a href="dich-vu/hoat-dong.html">
				<div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;"></div></a>
		
		 					<!--  -----------------------Training -------------------- -->

		 <div class="clear-fix"></div>
		 <div class="title-h3" style="margin:auto;">
	<a href="dich-vu/training.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h3>TRAINING</h3> </a>
		</div>
		<div class="content-line">
		<div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
		</div>

		<?php
				while ($rows2 = mysqli_fetch_array($tin2)) { // hoat dong
			?>
					<div class="tintuc-list">			
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows2['link_title'];?>-<?php echo $rows2['idtin'];?>.html">
								<?php echo $rows2['tieude'];?>
									
							</a>
						</div>
						<div class="tintuc-img">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html">
								<img src="admin-vm2017/<?php echo $rows2['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows1['tomtat'];?>
						</div>
					</div>
				<?php
					}
				?>

		<div class="clear-fix"></div>
		<a href="dich-vu/training.html">
			<div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;">
			</div>
		</a>
														

														<!-- Hướng dẫn sử dụng -->

		<div class="clear-fix"></div>
		<div class="title-h3" style="margin:auto;">
	<a href="dich-vu/huong-dan-su-dung.html" title="" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h3>HƯỚNG DẪN SỬ DỤNG</h3> </a>
		</div>
		<div class="content-line">
		<div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
		</div>

		<?php
			while ($rows3 = mysqli_fetch_array($tin3)) { // gướng dẫn sử dụng
				$iframe = "iframe";
				if(strpos($rows3['noidung'],$iframe)== false){ // nếu không tồn tại thẻ <iframe>
			?>
					<div class="tintuc-list">			
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html">
								<?php echo $rows3['tieude'];?>
							</a>
						</div>
						<div class="tintuc-img">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html">
								<img src="admin-vm2017/<?php echo $rows3['img'];?>" width="100%" title="P70421-151145.jpg" />
							</a>
						</div>
						<div class="tintuc-summary" style="font-size: 16px !important;">
							<?php echo $rows3['tomtat'];?>
						</div>
					</div>
				<?php
					}else{ // nếu có tồn tại
				?>
					<div class="tintuc-list">			
						<div class="tintuc-title">
							<a href="dich-vu/chi-tiet-dich-vu/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html">
								<?php echo $rows3['tieude'];?>
							</a>
						</div>
						<div class="tintuc-summary2" style="font-size: 16px !important;">
							<?php echo $rows3['tomtat'];?>
						</div>
						<?php
							echo str_replace(strstr($rows3['noidung'],"</iframe>"),"",strstr($rows3['noidung'],"<iframe"))."</iframe>";
						?>
						có video
					</div>
				<?php
					}
				}
				?>
	<div class="clear-fix"></div>
		<a href="dich-vu/huong-dan-su-dung.html">
			<div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;">
			</div>
		</a>
										

		<div class="sub-dv">
						<div class="qa">
				<h3><a href="dich-vu/cau-hoi-thuong-gap.html"> Câu hỏi thường gặp:</a></h3>
				<?php
					while ($rows6 = mysqli_fetch_array($tin6)) {
						echo "
						<p><a href='dich-vu/chi-tiet-dich-vu/{$rows6['link_title']}-{$rows6['idtin']}.html'>{$rows6['tieude']}</a></p>
						";
				}?>
				<h5><a href="dich-vu/cau-hoi-thuong-gap.html"> Xem thêm ...</a></h5>
			</div>
		</div>

	</div>
		<?php
			}
		?>
		

	</div>
</div>
