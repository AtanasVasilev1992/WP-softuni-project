<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title><?php wp_title(); ?></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->


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
							<a href="<?php echo get_home_url( '/' ); ?>">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/fruits-logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<?php
								// Wordpress Menu
								$nav_menu_args = array(
									'menu'              => 'Primary menu',
									'menu_class'        => '',
									'container'         => '',
									'container_class'   => '',
									'theme_location'    => 'primary',
								);
								wp_nav_menu( $nav_menu_args );
								?>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="<?php echo site_url( '/product/' ); ?>"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
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
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                            <input type="text" name="s" id="ajax-search-input" placeholder="Keywords" value="<?php echo get_search_query(); ?>">
                            <button type="submit" id="ajax-search-button">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="ajax-search-results"></div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->