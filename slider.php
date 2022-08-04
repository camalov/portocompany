			<div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider manual">
						<ul>
							
							<?php  include '/siteadmin/production/dbnet/connection.php';



							$slider_query = $db->prepare("SELECT * FROM slider WHERE slider_status = :active ORDER BY slider_number ASC");
							$slider_query->execute(array(

								'active' => '1'

							));

							while($slider_result = $slider_query->fetch(PDO::FETCH_ASSOC)){

								?>

								<li data-transition="fade" data-title="<?php echo $slider_result['slider_name']; ?>" data-thumb="<?php echo $slider_result['slider_photo_url']; ?>">

									<img src="<?php echo $slider_result['slider_photo_url']; ?>"  
									alt="<?php $slider_result['slider_name']; ?>"
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">


									<a class="tp-caption btn btn-primary btn-lg"
									data-hash
									data-hash-offset="85"
									href="#practice-areas"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="150"
									data-start="3500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;"><i class="fa fa-long-arrow-down"></i></a>

								</li>
							<?php } ?>
						</ul>
					</div>
				</div>