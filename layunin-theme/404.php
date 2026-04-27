<?php get_header(); ?>
<main id="primary" class="site-main container py-5 text-center">
	<div class="py-5">
		<h1 class="display-1">404</h1>
		<h2>Oops! Page Not Found.</h2>
		<p class="lead mb-5">The page you are looking for might have been removed or is temporarily unavailable.</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Return to Homepage</a>
	</div>
</main>
<?php get_footer(); ?>
