<?php include 'header.php'; 

$menu_query = $db->prepare("SELECT * FROM menu WHERE menu_id = :id");
$menu_query->execute(array( 'id' => $_GET['menu_id'] ));
$menu_result = $menu_query->fetch(PDO::FETCH_ASSOC);


?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none"><?php echo $menu_result['menu_name']; ?></h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<!-- <Blog> --> 

					<div class="row">

						<div class="col-md-12">

							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								<span class="thumb-info-side-image-wrapper p-none ">
									<?php if(!isset($menu_result['menu_img_url'])){ ?>
											<!-- <a title="" href="demo-law-firm-menu-detail.html">
												<img src="img/demos/law-firm/blog/blog-law-firm-1.jpg" class="img-responsive" alt="" style="width: 195px;"> </a> -->
											<? }else{ ?>

												<img src="<?php echo $menu_result['menu_img_url']; ?>" class="img-responsive" alt="<?php echo $menu_result['menu_name']; ?>" style="width: 250px; height:150px;">

											<? } ?>
										</span>
										<span class="thumb-info-caption" style="font-size:18px;">
											<span class="thumb-info-caption-text">
												<p class="font-size-md"><?php echo $menu_result['menu_detail']; ?></p>
											</span>
										</span>
									</span>

								</div>

							</div>


							<!-- </Blog> --> 

						</div>


						<!-- Sidebar -->

						<?php include 'rightbar.php'; ?>
						
					</div>

				</div>
			</div>


			<?php include 'footer.php' ?>