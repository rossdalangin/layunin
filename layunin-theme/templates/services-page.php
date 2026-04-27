<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5 animate-up">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Premium Solutions</span>
		<h1 class="page-title display-4"><?php echo esc_html( get_theme_mod( 'services_title', 'Our Solutions' ) ); ?></h1>
		<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'services_content', 'Tailored solutions for your personal and professional growth.' ) ); ?></p>
	</header>
	<div class="services-grid row mt-5">
		<?php for($i = 1; $i <= 3; $i++) :
			$title = get_theme_mod("page_service_{$i}_title");
			$desc = get_theme_mod("page_service_{$i}_desc");
			if($title) :
		?>
		<div class="col-md-4 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
			<div class="card h-100 shadow-sm border-0 text-center p-5">
				<div class="card-icon mx-auto"><i class="fas fa-gem"></i></div>
				<h3 class="h4 fw-bold mb-3"><?php echo esc_html($title); ?></h3>
				<p class="text-muted small mb-4"><?php echo esc_html($desc); ?></p>
				<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-primary btn-sm mt-auto">Inquire Now</a>
			</div>
		</div>
		<?php endif; endfor; ?>
	</div>
</main>
<?php get_footer(); ?>
