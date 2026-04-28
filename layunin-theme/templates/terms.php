<?php
/**
 * Template Name: Terms and Conditions
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-4"><?php echo esc_html( get_theme_mod( 'terms_title', get_the_title() ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'terms_content' );
                if ( $content ) :
                    echo wp_kses_post( wpautop( $content ) );
                else : ?>
                    <p>Welcome to Layunin!</p>
                    <p>These terms and conditions outline the rules and regulations for the use of Layunin's Website, located at Layunin.com.</p>
                    <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use Layunin if you do not agree to take all of the terms and conditions stated on this page.</p>
                <?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
