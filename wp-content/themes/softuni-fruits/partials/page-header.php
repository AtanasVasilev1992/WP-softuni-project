<?php if (! is_front_page()) : ?>
		<!-- breadcrumb-section -->
		<div class="breadcrumb-section breadcrumb-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="breadcrumb-text">
							<?php if ( is_archive() ) : ?>
								<?php if ( ! empty( category_description() ) ) : ?>
									<p><?php echo category_description(); ?></p>
								<?php elseif ( empty( category_description() ) ): ?>
									<p>Fresh Fruits Online</p>
								<?php endif; ?>
								<h1><?php echo get_the_archive_title(); ?></h1>
							<?php else : ?>
								<?php if ( ! empty ( category_description() ) ) : ?>
									<p><?php echo category_description(); ?></p>
								<?php elseif ( empty ( category_description( ) ) ): ?>
									<p>Fresh Fruits Online</p>
								<?php endif; ?>

								<h1><?php echo get_the_title(); ?></h1>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end breadcrumb section -->
	<?php endif; ?>