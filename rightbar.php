<?php 

$aboutus_requery = $db->prepare("SELECT * FROM aboutus WHERE aboutus_id=?");
$aboutus_requery->execute(array('0'));
$aboutus_result = $aboutus_requery->fetch(PDO::FETCH_ASSOC);

?>
<div class="col-md-3">
	<aside class="sidebar">
		<div id="combinationFilters" class="filters">

			<h4 class="mt-xl mb-md">Video təqdimat</h4>
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

		</div>

		

	</aside>
</div>