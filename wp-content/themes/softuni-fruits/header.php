<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title><?php wp_title(); ?></title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/responsive.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="<?php echo get_home_url('/'); ?>">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/fruits-logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<?php
							// Wordpress Menu
							$nav_menu_args = array(
								'menu'				=> 'Primary menu', // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
								'menu_class'		=> 'ul', // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
								'container'			=> '', // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
								'container_class'	=> 'container-class', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
								'theme_location'	=> 'primary', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
							);
							wp_nav_menu($nav_menu_args);
							?>

							<div class="header-icons">
								<a class="shopping-cart" href="#"><i class="fas fa-shopping-cart"></i></a>
								<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
							</div>
						</nav>

						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

	<?php if (is_front_page()) : ?>
		<!-- home page slider -->
		<div class="homepage-slider">
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-1">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Fresh & Organic</p>
									<h1>Delicious Seasonal Fruits</h1>
									<div class="hero-btns">
										<a href="shop.html" class="boxed-btn">Fruit Collection</a>
										<a href="contact.html" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-center">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Fresh Everyday</p>
									<h1>100% Organic Collection</h1>
									<div class="hero-btns">
										<a href="shop.html" class="boxed-btn">Visit Shop</a>
										<a href="contact.html" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- single home slider -->
			<div class="single-homepage-slider homepage-bg-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-right">
							<div class="hero-text">
								<div class="hero-text-tablecell">
									<p class="subtitle">Mega Sale Going On!</p>
									<h1>Get December Discount</h1>
									<div class="hero-btns">
										<a href="shop.html" class="boxed-btn">Visit Shop</a>
										<a href="contact.html" class="bordered-btn">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end home page slider -->
	<?php endif; ?>

	<?php if (! is_front_page()) : ?>
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<?php if ( is_archive() ) : ?>
								<p><?php echo category_description(); ?></p>
							    <h1><?php echo get_the_archive_title(); ?></h1>
							<?php else : ?>
								<p><?php echo category_description(); ?></p>
								<h1><?php echo get_the_title(); ?></h1>
							<?php endif ; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	<?php endif; ?>