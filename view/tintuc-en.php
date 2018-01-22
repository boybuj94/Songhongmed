<title>Tin Tức</title>
<div class="hotro">
	
	
	<div class="tintuc">
		<div class="duongdan">
			<span><a href="/?l-en">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="l/en">Sevice</a></span>
		</div>
		<?php
			if(isset($_REQUEST['v'])){
				$v = $_REQUEST['v'];



				if($v == 'vac'){ // hoat dong ?>
					<div class="title-h3" style="margin:auto;">
						<a href="index.php?manage=News&l=en&v=vac" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>WORK</h3>
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
							<a href="en/service/service-details/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html"><?php echo $rows1['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="en/service/service-details/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html">
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
						<a href="index.php?manage=News&l=en&v=vac" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
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
							<a href="index.php?manage=News&l=en&v=vde&id=<?php echo $rows2['idtin'];?>"><?php echo $rows2['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="index.php?manage=News&l=en&v=vde&id=<?php echo $rows2['idtin'];?>">
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
						<a href="index.php?manage=News&l=en&v=vac" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
							<h3>MANUAL INSTRUCTION</h3>
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
							<a href="index.php?manage=News&l=en&v=vde&id=<?php echo $rows1['idtin'];?>"><?php echo $rows1['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="index.php?manage=News&l=en&v=vde&id=<?php echo $rows1['idtin'];?>">
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
							<h3>FREQUENTLY ASKED QUESTION</h3>
						</a>
					</div>
					<div class="content-line">
						<div class="content-icon"><img src="public/img/icon-arrow1.png" /></div>
					</div>
					<?php
							while ($rows6 = mysqli_fetch_array($tin6)) { // hoat dong
						?>
						<div class="tintuc-title">
							<a href="index.php?manage=News&v=vde&id=<?php echo $rows6['idtin'];?>"><?php echo $rows6['tieude'];?></a>
						</div>


					<?php
					}



				}else if($v == 'vde'){ // chi tiet ?>
					<h4><?php echo $rows1['tieude'];?></h4>
					<h5><?php echo $rows1['tomtat'];?></h5>
					<h6 style="font-weight: normal;padding-bottom: 10px;">Date <?php echo $rows1['thoigian'];?></h6>
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
			<a href="en/service/activities.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;">
				<h3>WORK</h3>
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
				<a href="en/service/service-details/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html"><?php echo $rows1['tieude'];?></a>
			</div>
			<div class="tintuc-img">
				<a href="en/service/service-details/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html">
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
		<a href="en/service/activities.html">
				<div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;"></div></a>
		
		 					<!--  -----------------------Training -------------------- -->

		 <div class="clear-fix"></div>
		 <div class="title-h3" style="margin:auto;">
	<a href="en/service/training.html" title="Product company" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h3>TRAINING</h3> </a>
		</div>
		<div class="content-line">
		<div class="content-icon"><img src="public/img/icon-arrow1.png"></div>
		</div>

		<?php
				while ($rows2 = mysqli_fetch_array($tin2)) { // hoat dong
			?>
		<div class="tintuc-list">			
			<div class="tintuc-title">
				<a href="en/service/service-details/<?php echo $rows2['link_title'];?>-<?php echo $rows2['idtin'];?>.html"><?php echo $rows2['tieude'];?></a>
			</div>
			<div class="tintuc-img">
				<a href="en/service/service-details/<?php echo $rows2['link_title'];?>-<?php echo $rows2['idtin'];?>.html">
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
		<div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;"></div></a>
														
														<!-- Hướng dẫn sử dụng -->
		<div class="clear-fix"></div>
		<div class="title-h3" style="margin:auto;">
	<a href="en/service/use-guide.html" title="" style="color:#333; text-align:center; text-shadow: 0 0 2px #000;"><h3>MANUAL INSTRUCTION</h3> </a>
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
							<a href="en/service/service-details/<?php echo $rows1['link_title'];?>-<?php echo $rows1['idtin'];?>.html"><?php echo $rows3['tieude'];?></a>
						</div>
						<div class="tintuc-img">
							<a href="en/service/service-details/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html">
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
							<a href="en/service/service-details/<?php echo $rows3['link_title'];?>-<?php echo $rows3['idtin'];?>.html"><?php echo $rows3['tieude'];?></a>
						</div>
						<div class="tintuc-summary2" style="font-size: 16px !important;">
							<?php echo $rows3['tomtat'];?>
						</div>
						<?php
							echo str_replace(strstr($rows3['noidung'],"</iframe>"),"",strstr($rows3['noidung'],"<iframe"))."</iframe>";
						?>
					</div>
				<?php
					}
				}
				?>
		<div class="clear-fix"></div>
		<a href="en/service/use-guide.html"><div class="chitiet" style="background-image: url(public/img/logo/seemore.gif);margin-bottom: 30px;"></div></a>


	<div class="sub-dv">
			
			<div class="qa">
				<h3><a href="en/service/frequently-asked-questions.html">Frequently Asked Questions:</a></h3>
				<?php
					while ($rows6 = mysqli_fetch_array($tin6)) {
						echo "
						<p><a href='index.php?manage=News&v=vde&id={$rows6['idtin']}'</a>{$rows6['tieude']}</p>
						";
				}?>
				<h5><a href="en/service/frequently-asked-questions.html"> See more ...</a></h5>
			</div>
		</div>
	</div>
		<?php
			}
		?>
		

	</div>
</div>
