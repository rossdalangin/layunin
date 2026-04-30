<?php get_header(); ?>
<section class="error-404 not-found py-phi text-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 animate-up">
				<div class="display-1 fw-black text-gold opacity-10 mb-n4">404</div>
				<h1 class="display-3 fw-black text-navy mb-4 error-404-title"><?php echo esc_html(get_theme_mod('error_404_title', 'Even Masters Get Lost.')); ?></h1>
				<p class="lead text-muted mb-6 fs-4 error-404-desc">
					<?php echo esc_html(get_theme_mod('error_404_desc', "We couldn't find the page you're looking for. But don't worry, every wrong turn is a chance to re-audit your direction. Let's get you back on course.")); ?>
				</p>

				<div class="search-form-wrapper p-5 bg-light rounded-4 mb-6 shadow-sm">
					<?php get_search_form(); ?>
				</div>

				<div class="d-flex justify-content-center gap-4">
					<a href="<?php echo esc_url( get_theme_mod('error_404_btn1_link', home_url('/')) ); ?>" class="btn btn-navy px-5 py-3 fw-bold error-404-btn1"><?php echo esc_html(get_theme_mod('error_404_btn1', 'Back to Launchpad')); ?></a>
					<a href="<?php echo esc_url( get_theme_mod('error_404_btn2_link', home_url('/contact/')) ); ?>" class="btn btn-outline-navy px-5 py-3 fw-bold border-2 error-404-btn2"><?php echo esc_html(get_theme_mod('error_404_btn2', 'Contact Support')); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
