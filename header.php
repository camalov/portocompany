<?php include 'siteadmin/production/dbnet/connection.php';

include 'function/seo.php';

$setting_query = $db->prepare("SELECT * FROM settings WHERE setting_id=?");
$setting_query->execute(array('0'));
$setting_result = $setting_query->fetch(PDO::FETCH_ASSOC);


$menu_query = $db->prepare("SELECT * FROM menu WHERE menu_status = :status and menu_up = :up  ORDER BY menu_row ASC ");
$menu_query->execute(array( 'status' => '1', 'up' => '0' ));
$menu_num = $menu_query->rowCount();


?>

<!DOCTYPE html>
<html>
<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	

	<title><?php echo $setting_result['setting_title']; ?></title>	

	<meta name="keywords" content="<?php echo $setting_result['setting_keywords']; ?>" />
	<meta name="description" content="<?php echo $setting_result['setting_description']; ?>">
	<meta name="author" content="<?php echo $setting_result['setting_author']; ?>">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css">
	<link rel="stylesheet" href="css/theme-elements.css">
	<link rel="stylesheet" href="css/theme-blog.css">
	<link rel="stylesheet" href="css/theme-shop.css">
	<link rel="stylesheet" href="css/theme-animate.css">

	<!-- Current Page CSS -->
	<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/skin-law-firm.css"> 

	<!-- Demo CSS -->
	<link rel="stylesheet" href="css/demos/demo-law-firm.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.min.js"></script>

</head>


<body>
	<div class="body">
		<header id="header" class="header-no-border-bottom" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 115, "stickySetTop": "-115px", "stickyChangeLogo": false}'>
			<div class="header-body">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-logo">
								<a href="index.php">
									<img alt="<?php  echo $setting_result['setting_title']; ?>" width="164" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="<?php echo $setting_result['setting_logo_header']; ?>">
								</a>
							</div>
						</div>
						<div class="header-column">
							<ul class="header-extra-info">
								<li>
									<div class="feature-box feature-box-call feature-box-style-2">
										<div class="feature-box-icon">
											<i class="icon-call-end icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-none"><?php echo $setting_result['setting_mob']; ?></h4>
										</div>
									</div>
								</li>
								<li class="hidden-xs">
									<div class="feature-box feature-box-mail feature-box-style-2">
										<div class="feature-box-icon">
											<i class="icon-envelope icons"></i>
										</div>
										<div class="feature-box-info">
											<h4 class="mb-none"><a href="mailto:<?php echo $setting_result['setting_mail'];  ?>"><?php echo $setting_result['setting_mail']; ?></a></h4>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="header-container header-nav header-nav-bar header-nav-bar-primary">
					<div class="container">
						<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
							Menyu <i class="fa fa-bars"></i>
						</button>
						<div class="header-search visible-lg">
							<form id="searchForm" action="page-search-results.html" method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="q" id="q" placeholder="Axtar..." required>
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="icon-magnifier icons"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
							<nav>
								<ul class="nav nav-pills" id="mainNav">
									
									<?php 

									while($menu_result = $menu_query->fetch(PDO::FETCH_ASSOC)){

										$menu_id = $menu_result['menu_id'];

										$submenu_query = $db->prepare("SELECT * FROM menu WHERE menu_up = :id AND menu_status = :status ORDER BY menu_row ASC");
										$submenu_query->execute(array( 'id' => $menu_id, 'status' => '1' ));
										$submenu_result = $submenu_query->fetch(PDO::FETCH_ASSOC);
										$submenu_num = $submenu_query->rowCount();
										
										?>

										<li class="<?php if($menu_id == $submenu_result['menu_up']) echo "dropdown" ?>"><a href="<?php if(strlen($menu_result['menu_url']) > '0'){

											echo $menu_result['menu_url'];
										}
										else if(strlen($menu_result['menu_url']) == '0'){
											
											echo "menu".'-'.seo($menu_result['menu_name']).'-'.$submenu_result['menu_id'];
										}
										?>"><?php echo $menu_result['menu_name']; ?></a>


										<ul class="dropdown-menu"><li><a href="<?php if(strlen($submenu_result['menu_url']) > '0'){

											echo $submenu_result['menu_url'];
										}
										else if(strlen($submenu_result['menu_url']) == '0'){
											echo "menu".'-'.seo($submenu_result['menu_name']).'-'.$submenu_result['menu_id'];
										}
										?>"><?php echo $submenu_result['menu_name']; ?></a></ul>

									</li>

								<?php } ?>
							</ul>
						</li>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Header Son -->
