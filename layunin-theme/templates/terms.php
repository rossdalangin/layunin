<?php
/**
 * Template Name: Terms and Conditions
 */
get_header(); ?>
<main id="primary" class="site-main container py-phi">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-phi-l"><?php echo esc_html( get_theme_mod( 'terms_title', 'Terms Page' ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'terms_content', 'The standards of excellence for the Layunin community. By using this site, you agree to our elite protocols.' );
                echo wp_kses_post( wpautop( $content ) );
                ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
