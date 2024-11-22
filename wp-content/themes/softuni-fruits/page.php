<?php get_header(); ?>


    <!-- <?php if ( have_posts() ) : ?> -->
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1><?php echo get_the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end breadcrumb section -->
 
	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">

				<div class="col-md-12">
					<div class="single-product-content">
						<h3 class="col-md-10"><?php echo get_the_title(); ?></h3>
						<?php echo the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

    
    <!-- <?php endif; ?> -->

<?php get_footer(); ?>