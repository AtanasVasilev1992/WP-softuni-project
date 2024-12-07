<?php
$features_query = new WP_Query(array(
	'post_type' => 'feature',
	'posts_per_page' => -1
));

?>

<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">
		<div class="row">
			<?php 
			if ($features_query->have_posts()) :
				while ($features_query->have_posts()) : $features_query->the_post();
					$feature_class = get_post_meta(get_the_ID(), '_feature_css_class', true);
					$feature_icon = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
			?>
					<div class="col-lg-4 col-md-6 mb-4 mb-lg-0 ">
						<div class="list-box d-flex align-items-center">
							<div class="list-icon">
								<?php if ($feature_icon) : ?>
									<img src="<?php echo esc_url($feature_icon); ?>" alt="<?php the_title(); ?>">
								<?php else : ?>
									<i class="fas <?php echo esc_attr($feature_class); ?>"></i>
								<?php endif; ?>
							</div>
							<div class="content">
								<h3><?php the_title(); ?></h3>
								<p><?php the_content(); ?></p>
							</div>
						</div>
					</div>
			<?php endwhile; ?>
			
			<?php endif;?>
		</div>
	</div>
</div>
<!-- end features list section -->

<?php wp_reset_postdata(); ?>