<?php
/**
 * Template Name: Shop Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5">
		<h1 class="page-title">Digital Shop</h1>
		<p class="lead">Premium tools to help you succeed.</p>
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
