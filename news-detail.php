<?php include 'header.php'; 

$news_query = $db->prepare("SELECT * FROM news WHERE news_id = :id");
$news_query->execute(array( 'id' => $_GET['news_id'] ));
$news_result = $news_query->fetch(PDO::FETCH_ASSOC);


?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">Blog</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<!-- <Blog> --> 

					<div class="row">

						<div class="col-md-12">

							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								<span class="thumb-info-side-image-wrapper p-none ">
									<?php if(!isset($news_result['news_img_url'])){ ?>
											<!-- <a title="" href="demo-law-firm-news-detail.html">
												<img src="img/demos/law-firm/blog/blog-law-firm-1.jpg" class="img-responsive" alt="" style="width: 195px;"> </a> -->
											<? }else{ ?>

												<img src="<?php echo $news_result['news_img_url']; ?>" class="img-responsive" alt="<?php echo $news_result['news_name']; ?>" style="width: 250px; height:150px;">

											<? } ?>
										</span>
										<span class="thumb-info-caption" style="font-size:18px;">
											<span class="thumb-info-caption-text">
												<h2 class="mb-md mt-xs"><?php echo $news_result['news_name']; ?></h2>
												<span class="post-meta">
													<span>Müəllif | <?php echo $news_result['news_author']; ?></span>
												</span>
												<p class="font-size-md"><?php echo $news_result['news_content']; ?></p>
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