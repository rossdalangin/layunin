<?php get_header(); ?>
<main id="primary" class="site-main container py-5 text-center">
	<div class="py-5 animate-up">
		<h1 class="display-1 text-accent"><?php echo esc_html( get_theme_mod( '404_title', '404' ) ); ?></h1>
		<h2 class="display-4"><?php echo esc_html( get_theme_mod( '404_content', 'Oops! Page Not Found.' ) ); ?></h2>
		<p class="lead mb-5 text-muted">The page you are looking for might have been removed or is temporarily unavailable.</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Return to Homepage</a>
	</div>
</main>
<?php get_footer(); ?>
