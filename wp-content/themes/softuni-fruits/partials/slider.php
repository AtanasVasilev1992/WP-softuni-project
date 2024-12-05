<?php
$slider_args = array(
    'post_type'      => 'slider',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
);

$slider_query = get_posts( $slider_args );
?>


<?php if ( ! empty( $slider_query ) && is_array( $slider_query ) ) : ?>
    <div class="homepage-slider">
        <?php foreach ( $slider_query as $slider) : ?>
            <?php
            $slider_id = $slider->ID;

            $slider_background_class = get_field('background_class', $slider_id);
            $slider_title = get_field('slider_title', $slider_id);
            $slider_subtitle = get_field('slider_subtitle', $slider_id);
            ?>

            <?php if ( $slider_background_class ) : ?>
                <div class="single-homepage-slider <?php echo esc_html( $slider_background_class ); ?>">
            <?php else : ?>
                <div class="single-homepage-slider">
            <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <?php if ( $slider_subtitle ) : ?>
                                        <p class="subtitle"><?php echo esc_html( $slider_subtitle ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $slider_title ) : ?>
                                        <h1><?php echo esc_html( $slider_title ); ?></h1>
                                    <?php endif; ?>

                                    <div class="hero-btns">
                                        <a href="#" class="boxed-btn">Fruit Collection</a>
                                        <a href="#" class="bordered-btn">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>