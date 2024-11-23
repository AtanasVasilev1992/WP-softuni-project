<?php get_header(); ?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p><?php echo get_the_author_meta( 'description' ); ?></p>
                    <h1><?php echo get_the_archive_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

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
                        <div class="single-product-item">

                            <?php if (has_post_thumbnail()) : ?>

                                <div class="product-image">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
                                    </a>
                                </div>

                            <?php endif; ?>

                            <h3><?php the_title(); ?></h3>
                            <p class="product-price"> <?php the_excerpt(); ?></p>
                            <p><?php echo get_the_date(); ?></p>
                            <a href="<?php echo get_the_permalink(); ?>" class="cart-btn">Read more</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>

            <p>No post to be shown!</p>

        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('Previous', 'textdomain'),
                    'next_text' => __('Next', 'textdomain'),
                )); ?>
            </div>
        </div>

    </div>

    <?php fruits_display_latest_posts(); ?>
    <?php get_footer(); ?>