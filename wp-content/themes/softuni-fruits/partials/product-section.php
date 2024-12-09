<?php
$latest_products_args = array(
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'posts_per_page' => $number_of_posts,
);

$latest_products_query = new WP_Query( $latest_products_args );
?>

<?php if ( $latest_products_query -> have_posts() ) : ?>
	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php while ( $latest_products_query -> have_posts() ) : $latest_products_query -> the_post(); ?>
				<?php $product_price = get_post_meta( get_the_ID(), 'product_price', true); ?>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<?php if ( ! empty( the_post_thumbnail() ) ) : ?>
							    <div class="product-image">
								    <a href="<?php echo get_the_permalink(); ?>">
								    <?php the_post_thumbnail( 'post-thumbnail', ['class' => '', 'title' => 'Feature image'] ); ?>
								    </a>
							    </div>
							<?php endif; ?>

							<?php if ( ! empty( the_title() ) ) : ?>
							    <h3><?php the_title(); ?></h3>
							<?php endif; ?>

							<p class="product-price">
								<span>Per Kg</span> <?php echo esc_attr( $product_price ); ?>
							</p>
							<a href="<?php echo get_the_permalink(); ?>" class="cart-btn">
								<i class="fas fa-info"></i> Read more
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo site_url( '/product/' ); ?>" class="boxed-btn">More News</a>
                </div>
            </div>
	</div>
	<!-- end product section -->
<?php endif; ?>

<?php wp_reset_postdata(); ?>