<?php
$latest_posts_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $number_of_posts,
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$latest_posts_query = new WP_Query( $latest_posts_args );
?>

<?php if ( $latest_posts_query->have_posts() ) : ?>
    
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Latest </span> Posts</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">

            <?php while( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post() ; ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-product-item">

                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'post-thumb', 'title' => get_the_title() ] ); ?>
                            </a>
                        <?php endif; ?>

                        <div class="news-text-box">
                            <h3 class="single-product-href">
                                <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="blog-meta">
                                <span class="author">
                                    <i class="fas fa-user"></i> <?php the_author(); ?>
                                </span>
                                <span class="date">
                                    <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
                                </span>
                            </p>
                            
                            <p class="excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="boxed-btn">
                                <?php esc_html_e( 'Read More', 'softuni' ); ?> 
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                <?php 
                    $current_year = date('Y');
                    $archive_link = get_year_link($current_year);
                    ?>
                    <a href="<?php echo esc_url($archive_link); ?>" class="boxed-btn">
                        <?php esc_html_e('More News', 'softuni'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>