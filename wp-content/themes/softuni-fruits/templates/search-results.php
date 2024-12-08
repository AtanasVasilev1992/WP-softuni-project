<?php get_header(); ?>

<div class="search-result">
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
</div>

<?php get_footer(); ?>