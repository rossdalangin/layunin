<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>
<main id="primary" class="site-main py-xl">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Elite Guidance</span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'services_title', 'Services Page' ) ); ?></h1>
		</header>

		<div class="entry-content animate-up">
			<?php
            $custom_content = get_theme_mod('services_content');
            if($custom_content) {
                echo wpautop(do_shortcode($custom_content));
            } else {
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            }
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
