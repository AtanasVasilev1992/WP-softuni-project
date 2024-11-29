<?php get_header(); ?>

<?php
$product_price = get_post_meta(get_the_ID(), 'product_price', true);

$product_category = get_post_meta(get_the_ID(), 'product-category', true);
$product_likes = get_post_meta(get_the_ID(), 'likes', true);
?>

<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="col-md-5">
					<div class="single-product-img">
						<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => '', 'title' => 'Feature image' ] ); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="col-md-7">
				<div class="single-product-content">
					<h3><?php echo get_the_title(); ?></h3>
					<?php if ( empty ( $product_price ) ) {
						echo "<p> This product don't have likes yet!</p>";
					}
					?>
					<?php if ( ! empty ( $product_price ) ) {
						echo '<p> This product have ' . esc_attr($product_likes) . ' likes!</p>';
					}
					?>
					<?php
					if (empty($product_price)) {
						echo '<p><span>There is no price yet!</span></p>';
					}

					if (! empty($product_price)) {
						echo '<p class="single-product-pricing">';
						echo '<span>Price Per Kg:</span>' . esc_attr($product_price);
						echo '</p>';
					}
					?>

					<?php echo the_content(); ?>
					<?php
					// var_dump($product_category);
					if (! empty($product_category)) {
						echo '<p>';
						echo '<strong>Categories: </strong>' . esc_attr($product_category);
						echo '</p>';
					}
					?>

					<div>
						<a href="#" class="cart-btn like" id="prodict-<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>"><i class="fas fa-thumbs-up"></i> Like </a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- end single product -->

<?php fruits_display_latest_posts(); ?>
<?php get_footer(); ?>