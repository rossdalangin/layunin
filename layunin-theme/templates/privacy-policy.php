<?php
/**
 * Template Name: Privacy Policy
 */
get_header(); ?>
<main id="primary" class="site-main container py-phi">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-phi-l"><?php echo esc_html( get_theme_mod( 'privacy_policy_title', 'Privacy Policy Page' ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'privacy_policy_content', 'Your data security is paramount in the pursuit of mastery. We use industry-standard encryption.' );
                echo wp_kses_post( wpautop( $content ) );
                ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
