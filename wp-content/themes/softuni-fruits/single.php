<?php get_header(); ?>
    

    <!-- <?php if ( have_posts() ) : ?> -->
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
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
                
                <?php if ( has_post_thumbnail() ) : ?>
				<div class="col-md-5">
					<div class="single-product-img">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
					</div>
				</div>
                <?php endif; ?>

				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo get_the_title(); ?></h3>
						<?php echo the_content(); ?>
							<p><strong>Categories: </strong>Fruits, Organic</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

    
    <!-- <?php endif; ?> -->


<?php get_footer(); ?>