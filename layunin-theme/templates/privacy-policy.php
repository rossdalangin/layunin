<?php
/**
 * Template Name: Privacy Policy
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-4"><?php echo esc_html( get_theme_mod( 'privacy_policy_title', get_the_title() ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'privacy_policy_content' );
                if ( $content ) :
                    echo wp_kses_post( wpautop( $content ) );
                else : ?>
                    <p>At Layunin, accessible from Layunin.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Layunin and how we use it.</p>
                    <h2>Consent</h2>
                    <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
                    <h2>Information we collect</h2>
                    <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
                <?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
