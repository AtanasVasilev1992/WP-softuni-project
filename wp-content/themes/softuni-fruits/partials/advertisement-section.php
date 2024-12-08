<?php 
// var_dump( $args );
$top_title = $args[ 'top-sub_title' ];
$title = $args[ 'heading' ];
$title_2 = $args[ 'title_2' ];
$image = $args[ 'image' ];
$content = $args[ 'content' ];
$cta_title = $args[ 'cta_title' ];
$cta_url = $args[ 'cta_url' ];
?>

<!-- advertisement section -->
<div class="abt-section mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="abt-bg">
					<a href="https://www.youtube.com/" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="abt-text">
					<?php if( ! empty( $top_title ) ) : ?>
					<p class="top-sub"><?php echo esc_attr( $top_title ) ; ?></p>
					<?php endif; ?>

					<?php if( ! empty( $title && $title_2 ) ) : ?>
					<h2><?php echo esc_attr( $title ) ; ?> <span class="orange-text"><?php echo esc_attr( $title_2 ) ; ?></span></h2>
					<?php endif ; ?>

					<?php if( ! empty( $content ) ) : ?>
					<p><?php echo $content ; ?></p>
					
					<?php endif; ?>

					<?php if( ! empty( $cta_title && $cta_url ) ) : ?>
					<a href="<?php echo esc_attr( $cta_url ) ; ?>" class="boxed-btn mt-4"><?php echo esc_attr( $cta_title ) ; ?></a>
					<?php endif ;?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end advertisement section -->