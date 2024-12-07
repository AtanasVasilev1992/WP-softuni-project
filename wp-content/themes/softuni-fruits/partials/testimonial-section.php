<?php
$latest_testimonials_args = array(
    'post_type'      => 'testimonial',
    'post_status'    => 'publish',
    'posts_per_page' => $number_of_posts,
);

$latest_testimonials_query = new WP_Query($latest_testimonials_args);
?>

<?php if ($latest_testimonials_query->have_posts()) : ?>
    <!-- testimonial-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <?php while ($latest_testimonials_query->have_posts()) : $latest_testimonials_query->the_post(); ?>
                            <?php
                            $id = get_the_ID();
                            $testimonial_autor = get_field('autor', $id);
                            $testimonial_autor_job = get_field('autor_job', $id);
                            $testimonial_image = get_field('autor_image', $id);
                            ?>
                            <div class="single-testimonial-slider">
                                <?php if (! empty($testimonial_image) && (! empty($testimonial_autor))) : ?>
                                    <div class="client-avater">
                                        <img src="<?php echo esc_url($testimonial_image); ?>" alt="<?php echo esc_attr($testimonial_autor); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (! empty(get_the_title())): ?>
                                    <div class="client-meta">
                                        <h3><?php echo esc_html(get_the_title()); ?>
                                            <?php if (! empty($testimonial_autor_job)): ?>
                                                <span><?php echo esc_html($testimonial_autor_job); ?></span>
                                        </h3>
                                    <?php else : ?>
                                        <span>Fruit Lover</span></h3>
                                    <?php endif ?>
                                    <?php if (! empty(get_the_content())) : ?>
                                        <p class="testimonial-body">
                                            "<?php echo get_the_content(); ?>"
                                        </p>
                                    <?php endif; ?>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->
<?php endif; ?>

<?php wp_reset_postdata(); ?>