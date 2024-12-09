<?php get_header(); ?>

<?php get_template_part( 'partials/page' , 'header' ) ; ?>

<?php
$id = get_the_ID();
$testimonial_autor = get_field( 'autor', $id );
$testimonial_autor_job = get_field( 'autor_job', $id );
$testimonial_image = get_field( 'autor_image', $id );
?>

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">

			<?php if( ! empty( $testimonial_image ) ) : ?>
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo esc_attr( $testimonial_image ); ?>" >
					</div>
				</div>
			<?php endif; ?>

			<div class="col-md-7">
				<div class="single-product-content">
					<?php if( empty( $testimonial_autor ) ) : ?>
					    <h3><?php echo get_the_title(); ?></h3>
					<?php endif; ?>

					<?php if( ! empty( $testimonial_autor ) ): ?>
					    <h3><?php echo esc_attr( $testimonial_autor); ?></h3>
					<?php endif; ?>

					<?php if( ! empty( $testimonial_autor_job ) ) : ?>
					    <p><?php echo esc_attr( $testimonial_autor_job ); ?></p>
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