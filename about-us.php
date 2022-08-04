<?php include 'header.php'; 

$aboutus_requery = $db->prepare("SELECT * FROM aboutus WHERE aboutus_id=?");
$aboutus_requery->execute(array('0'));
$aboutus_result = $aboutus_requery->fetch(PDO::FETCH_ASSOC);
?>

<!-- About US -->
<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-7">
				<h1 class="mt-xl mb-none"><?php echo $aboutus_result['aboutus_header']; ?></h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<!-- <p class="lead mb-xl mt-lg">Founded in 2001 by John Doe, gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat.</p> -->

				<!--<img width="205" class="img-responsive pull-left mr-xl mb-xl mt-xs" alt="" src="img/office/our-office-8.jpg"> -->

				<p><?php echo $aboutus_result['aboutus_content']; ?></p>

				<!-- <h2 class="mt-xlg mb-md">Expertise</h2> -->


			</div>
			<div class="col-md-4 col-md-offset-1">

				<h4 class="mt-xl mb-none">Video təqdimat</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="embed-responsive embed-responsive-16by9 mb-xl">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $aboutus_result['aboutus_video'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<h4 class="mt-xlg">Missiyamız</h4>

				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<blockquote class="blockquote-secondary">
					<p class="font-size-lg">"<?php echo $aboutus_result['aboutus_mission']; ?>"</p>
				</blockquote>


				<!--
				<h4 class="mt-xlg">Our History</h4>

				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<ul class="list list-unstyled list-primary list-borders">
					<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2016 - </strong> Moves its headquarters to a new building</li>
					<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2014 - </strong> Porto creates its new brand</li>
					<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2006 - </strong> Porto Office opens it doors in London</li>
					<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2003 - </strong> Inauguration of the new office</li>
					<li class="pt-sm pb-sm"><strong class="text-color-primary font-size-xl">2001 - </strong> Porto goes into business</li>
				</ul>
			-->
		</div>
	</div>
</div>
</div>

<?php include 'footer.php'; ?>