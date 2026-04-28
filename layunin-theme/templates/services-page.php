<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>
<main id="primary" class="site-main py-6">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block services-badge"><?php echo esc_html(get_theme_mod('services_badge', 'Elite Guidance')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'services_title', 'Services Page' ) ); ?></h1>
		</header>

		<div class="entry-content animate-up">
			<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
