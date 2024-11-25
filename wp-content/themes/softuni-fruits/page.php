<?php get_header(); ?>

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

 
<?php fruits_display_latest_posts(); ?>
<?php get_footer(); ?>