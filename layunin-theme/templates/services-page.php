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
	<div class="services-grid row">
		<div class="col-md-4 mb-4">
			<div class="card h-100 shadow-sm border-0">
				<div class="card-body text-center">
					<h3>Web Development</h3>
					<p>Custom WordPress themes and websites designed for conversion and speed.</p>
					<a href="#" class="btn btn-primary">Learn More</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card h-100 shadow-sm border-0">
				<div class="card-body text-center">
					<h3>1-on-1 Coaching</h3>
					<p>Direct access to mentors who can help you navigate your growth path.</p>
					<a href="#" class="btn btn-primary">Book Now</a>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card h-100 shadow-sm border-0">
				<div class="card-body text-center">
					<h3>Business Strategy</h3>
					<p>Comprehensive planning for scaling your side hustle or digital business.</p>
					<a href="#" class="btn btn-primary">Inquire Now</a>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
