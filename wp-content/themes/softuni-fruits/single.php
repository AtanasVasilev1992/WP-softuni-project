<?php get_header(); ?>

<?php get_template_part( 'partials/page' , 'header' ) ; ?>

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-md-5">
					<div class="single-latest-news">
						<?php the_post_thumbnail( 'post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="col-md-7">
				<div class="single-product-content">
					
				    <?php if ( ! empty( get_the_title() ) ) : ?>
                        <h3><?php get_the_title(); ?></h3>
                    <?php endif; ?>

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