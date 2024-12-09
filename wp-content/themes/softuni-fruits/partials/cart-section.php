<?php
$args = array(
    'post_type'      => 'banner',
    'posts_per_page' => 1,
);

$banner_query = new WP_Query( $args );
?>

<!-- cart banner section -->
<?php if ( $banner_query -> have_posts() ) :
    while ( $banner_query -> have_posts() ) : $banner_query -> the_post();

        $product_name = get_post_meta( get_the_ID(), '_product_name', true );
        $product_image = get_post_meta( get_the_ID(), '_product_image', true );
        $product_description = get_post_meta( get_the_ID(), '_product_description', true );
        $product_link = get_post_meta( get_the_ID(), '_product_link', true );
        $product_discount = get_post_meta( get_the_ID(), '_product_discount', true );
        $product_countdown = get_post_meta( get_the_ID(), '_product_countdown', true );
?>
        <section class="cart-banner pt-100 pb-100">
            <div class="container">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-lg-6">
                        <div class="image">
                            <?php if ( ! empty ($product_discount ) ) : ?>
                                <div class="price-box">
                                    <div class="inner-price">
                                        <span class="price">
                                            <strong><?php echo esc_html( $product_discount ); ?>%</strong> <br> off per kg
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ( ! empty( $product_image ) && ! empty( $product_name ) ) : ?>
                                <img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( $product_name ); ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--Content Column-->
                    <div class="content-column col-lg-6">
                        <h3><span class="orange-text">Deal</span> of the month</h3>
                        <?php if ( ! empty( $product_name ) ) : ?>
                            <h4><?php echo esc_html( $product_name ); ?></h4>
                        <?php endif; ?>

                        <?php if ( ! empty( $product_description ) ) : ?>
                            <div class="text"> <?php echo wp_kses_post( $product_description ); ?> </div>
                        <?php endif; ?>

                        <!--Countdown Timer-->
                        <?php if ( ! empty( $product_countdown ) ) : ?>
                            <div class="time-counter">
                                <div class="time-countdown clearfix" data-countdown="<?php echo esc_attr( $product_countdown ); ?>">
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Days</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Hours</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Mins</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Secs</div>
                                    </div>
                                </div>
                            </div>

                        <?php else : ?>
                            <div class="time-counter">
                                <div class="time-countdown clearfix" data-countdown="2024/12/24">
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Days</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Hours</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Mins</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Secs</div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;  ?>

                        <?php if ( ! empty( $product_link ) ): ?>
                            <a href="<?php echo esc_url( $product_link ); ?>" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <?php elseif ( empty( $product_link ) ): ?>
                            <a href="<?php echo site_url( '/product/' ); ?>" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <?php endif;  ?>

                    </div>
                </div>
            </div>
        </section>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
<!-- end cart banner section -->