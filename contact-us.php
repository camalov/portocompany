<?php include 'header.php'; ?>

			<div role="main" class="main">
				<div class="container">
					<div class="row pt-xl">
						<div class="col-md-7">
							<h1 class="mt-xl mb-none">Bizimlə əlaqə saxlayın</h1>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>
							<p class="lead mb-xl mt-lg">Bizimlə əlaqə saxlamaq üçün aşağıdakı formu doldurub göndərə bilərsiniz</p>

							<div class="alert alert-success hidden mt-lg" id="contactSuccess">
								<strong>Success!</strong> Your message has been sent to us.
							</div>

							<div class="alert alert-danger hidden mt-lg" id="contactError">
								<strong>Error!</strong> There was an error sending your message.
								<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
							</div>

							<form id="contactForm" action="http://c-datasoftware.tk/phpmail/index.php" method="POST">
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="text" placeholder="Adınız" value="" data-msg-required="Adınızı daxil edin." maxlength="100" class="form-control input-lg" name="name" id="name" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="email" placeholder="E-Poçt" value="" data-msg-required="E-poçt ünvanınızı daxil edin." data-msg-email="Xahiş edirik keçərli e-poçt ünvanı daxil edin." maxlength="100" class="form-control input-lg" name="email" id="email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<input type="text" placeholder="Mövzu" value="" data-msg-required="Mövzu daxil edin." maxlength="100" class="form-control input-lg" name="subject" id="subject" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<textarea maxlength="5000" placeholder="Mesaj" data-msg-required="Xahiş edirik mesajınızı daxil edin." rows="5" class="form-control input-lg" name="message" id="message" required></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" name="contact_us" value="Göndər" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
									</div>
								</div>
							</form>

						</div>
						<div class="col-md-4 col-md-offset-1">

							<h4 class="mt-xl mb-none">Əlaqə</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
								<li><i class="fa fa-map-marker"></i> <strong>Ünvan: </strong><?php echo $setting_result['setting_city'].", ".$setting_result['setting_adress']; ?></li>
								<li><i class="fa fa-phone"></i> <strong>Telefon:</strong> <?php echo $setting_result['setting_mob'] ?></li>
								<li><i class="fa fa-envelope"></i> <strong>E-Poçt:</strong> <a href="mailto:<?php echo $setting_result['setting_mail']; ?>"><?php echo $setting_result['setting_mail']; ?></a></li>
							</ul>

							<h4 class="pt-xl mb-none">İş Saatları</h4>
							<div class="divider divider-primary divider-small mb-xl">
								<hr>
							</div>

							<ul class="list list-icons list-dark mt-xlg">
								<li><i class="fa fa-clock-o"></i> <?php echo $setting_result['setting_operating_time']; ?></li>
							</ul>

						</div>
					</div>
				</div>

				<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
				<div id="googlemaps" class="google-map google-map-footer"></div>
			</div>

<?php include 'footer.php'; ?>