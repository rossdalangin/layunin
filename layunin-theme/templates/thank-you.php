<?php
/**
 * Template Name: Thank You Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi text-center">
	<div class="container">
		<div class="py-phi">
			<i class="fas fa-circle-check display-1 text-success mb-phi-l"></i>
			<h1 class="display-3"><?php echo esc_html( get_theme_mod( 'thank_you_title', "Thank You Page" ) ); ?></h1>
			<p class="lead mb-phi"><?php echo esc_html( get_theme_mod( 'thank_you_content', 'Your protocol is being delivered. Stand by for transformation.' ) ); ?></p>
			<div class="next-steps py-4 border-top border-bottom">
				<h3 class="thank-you-next-title"><?php echo esc_html(get_theme_mod('thank_you_next_title', "The Next Phase")); ?></h3>
				<p class="thank-you-next-desc"><?php echo esc_html(get_theme_mod('thank_you_next_desc', 'While your guide arrives, immerse yourself in our most impactful case studies.')); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline-primary"><?php echo esc_html(get_theme_mod('thank_you_btn_text', 'Return to Launchpad')); ?></a>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
