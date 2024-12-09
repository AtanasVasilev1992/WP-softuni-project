<?php
$features_query = new WP_Query( array(
	'post_type'      => 'feature',
	'posts_per_page' => 4
));

?>

<!-- featured section -->
<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Why <span class="orange-text">Fruits</span></h2>
						
						<div class="row">
			<?php
			if ( $features_query -> have_posts() ) :
				while ( $features_query -> have_posts() ) : $features_query -> the_post();
					$feature_class = get_post_meta( get_the_ID(), '_feature_css_class', true );
			?>
					<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
						<div class="list-box d-flex">
							<div class="list-icon">

								<?php if ( ! empty( $feature_class ) ) : ?>
									<i class="fas <?php echo esc_attr( $feature_class ); ?>"></i>
								<?php endif; ?>
							</div>
							<div class="content">
								<?php if ( ! empty( the_title() ) ) : ?>
									<h3><?php the_title(); ?></h3>
								<?php endif; ?>
								
								<?php if ( ! empty( the_content() ) ) : ?>
									<p><?php the_content(); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

			<?php endif; ?>
		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

<?php wp_reset_postdata(); ?>