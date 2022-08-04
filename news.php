<?php include 'header.php';

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


					<?php 

					$page_news_num = '4';

					$news_num_query = $db->prepare("SELECT * FROM news");
					$news_num_query->execute();
					$news_num = $news_num_query->rowCount();

					$page_num = ceil($news_num/$page_news_num);
					$page = isset($_GET['page']) ? (int) $_GET['page'] : '1'; 
					$limit = ($page - '1') * $page_news_num;

					if($page < '1'){
						$page = $_GET['page'] = '1';
						Header("Location:news.php?page=$page");
					}else if($page > $page_num){
						$page = $_GET['page'] = $page_num;
						Header("Location:news.php?page=$page");
					}


					$news_query = $db->prepare("SELECT * FROM news WHERE news_status = :status ORDER BY news_id DESC LIMIT $limit,$page_news_num");
					$news_query->execute(array( 'status' => '1' ));

					?>


					<?php while ($news_result = $news_query->fetch(PDO::FETCH_ASSOC)) { ?>

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
										<span class="thumb-info-caption" style="font-size:16px;">
											<span class="thumb-info-caption-text">
												<h2 class="mb-md mt-xs"><?php echo $news_result['news_name']; ?></h2>
												<span class="post-meta">
													<span>Müəllif | <?php echo $news_result['news_author']; ?></span>
												</span>
												<p class="font-size-md"><?php $content_num = strlen($news_result['news_content']); if($content_num >= '250'){ $end = '250'; }else{  $end = $content_num - '10'; } echo substr($news_result['news_content'], '0', $end ).'...'; ?></p>
												<a class="mt-md" href="<?="news".'-'.seo($news_result['news_name']).'-'.$news_result['news_id']; ?>">Ətraflı oxu <i class="fa fa-long-arrow-right"></i></a>
											</span>
										</span>
									</span>
								</div>
							</div>

						<? } ?>

						<div align="right" class="col-md-12">

							<ul class="pagination">

								<?php  

								$i = '0';

								while($i < $page_num){ 

									$i++;

									if($i == $page){	?>

										<li class="active">

											<a href="news-<?=$i ?>"><?php echo $i; ?></a>

										</li>

									<?php }else{ ?>

										<li class="">

											<a href="news-<?=$i ?>"><?php echo $i; ?></a>

										</li>

									<?php } } ?>

								</ul>

							</div>
							<!-- </Blog> --> 

						</div>


						<!-- Sidebar -->
						<?php include 'rightbar.php'; ?>


					</div>

				</div>
			</div>


			<?php include 'footer.php' ?>