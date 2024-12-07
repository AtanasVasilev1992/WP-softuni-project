<?php get_header(); ?>

<?php get_template_part('partials/page', 'header'); ?>

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Latest </span> Posts</h3>

                </div>
            </div>
        </div>

        <?php if (have_posts()) : ?>
            <div class="row">

                <?php while (have_posts()) : the_post() ?>
                    <div class="col-lg-4 col-md-6 text-center">
                        <div id="post-id-<?php the_ID(); ?>" <?php post_class('single-product-item') ?>>

                            <?php if (has_post_thumbnail()) : ?>

                                <div class="single-latest-news">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
                                    </a>
                                </div>

                            <?php endif; ?>

                            <h3><?php the_title(); ?></h3>
                            <p class="product-price"> <?php the_excerpt(); ?></p>
                            <p><?php echo get_the_date(); ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="cart-btn"><i class="fas fa-info"></i> Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>

            <p>No post to be shown!</p>

        <?php endif; ?>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <?php
                    global $wp_query;
                    $total_pages = $wp_query->max_num_pages;
                    $current_page = max(1, get_query_var('paged'));

                    if ($total_pages > 1) {
                        echo '<ul>';
                        if ($current_page > 1) {
                            echo '<li><a href="' . get_pagenum_link($current_page - 1) . '">Prev</a></li>';
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $current_page) {
                                echo '<li><a href="#" class="active">' . $i . '</a></li>';
                            } else {
                                echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                            }
                        }
                        if ($current_page < $total_pages) {
                            echo '<li><a href="' . get_pagenum_link($current_page + 1) . '">Next</a></li>';
                        }

                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <?php get_footer(); ?>