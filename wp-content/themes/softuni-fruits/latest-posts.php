<?php
$latest_posts_args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $number_of_posts,
);

$latest_posts_query = new WP_Query($latest_posts_args);
?>

<?php if ($latest_posts_query->have_posts()) : ?>
    <!-- latest news -->
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
                        <a href="<?php echo get_the_permalink(); ?>">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
                        </a>
                        <div class="news-text-box">
                            <h3 class="single-product-href"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> <?php echo get_the_author_meta( 'nickname' ); ?></span>
                                <span class="date"><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            </p>
                            <p class="excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="boxed-btn">read more <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo site_url( '/2024/' ); ?>" class="boxed-btn">More News</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
<?php endif; ?>

<?php wp_reset_postdata(); ?>