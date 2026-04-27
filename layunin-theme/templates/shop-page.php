<?php
/**
 * Template Name: Shop Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5 animate-up">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Premium Shop</span>
		<h1 class="page-title display-4"><?php echo esc_html( get_theme_mod( 'shop_title', 'Digital Shop' ) ); ?></h1>
		<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'shop_content', 'Premium tools and planners for your success.' ) ); ?></p>
	</header>
	<div class="row">
		<!-- Integration with WooCommerce or custom product loop would go here -->
		<div class="col-12 text-center">
			<p>Check out our featured products below.</p>
			<?php get_template_part( 'template-parts/home-products' ); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
