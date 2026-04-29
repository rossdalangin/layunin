<?php
/**
 * Template Name: Privacy Policy
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-4"><?php echo esc_html( get_theme_mod( 'privacy_policy_title', 'Privacy Policy Page' ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'privacy_policy_content' );
                if ( $content ) :
                    echo wp_kses_post( wpautop( $content ) );
                else : ?>
                    <p>Your data security is paramount in the pursuit of mastery. We use industry-standard encryption.</p>
                <?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
