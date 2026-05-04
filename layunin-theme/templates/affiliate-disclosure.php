<?php
/**
 * Template Name: Affiliate Disclosure
 */
get_header(); ?>
<main id="primary" class="site-main container py-phi">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-phi-l"><?php echo esc_html( get_theme_mod( 'affiliate_disclosure_title', 'Affiliate Disclosure Page' ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'affiliate_disclosure_content', 'Transparency is a core value of the Layunin community. Please assume that links on this site may be affiliate links. We only recommend elite tools we use ourselves.' );
                echo wp_kses_post( wpautop( $content ) );
                ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
