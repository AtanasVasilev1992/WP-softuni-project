<?php get_template_part('partials/carousel', 'section'); ?>

<!-- footer -->
<div class="footer-area">
	<div class="container">
		<div class="row">

		<?php get_sidebar( 'footer-1' ); ?>

		<?php get_sidebar( 'footer-2' ); ?>

		<?php get_sidebar( 'footer-3' ); ?>

		<?php get_sidebar( 'footer-4' ); ?>
		</div>
	</div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>This template is reworked by <a href="https://github.com/AtanasVasilev1992">Atanas Vasilev</a>.<br>
					Copyrights &copy; <?php echo date('Y'); ?> - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.<br>
					Distributed By - <a href="https://themewagon.com/">Themewagon</a>
				</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end copyright -->

<?php wp_footer(); ?>
</body>

</html>