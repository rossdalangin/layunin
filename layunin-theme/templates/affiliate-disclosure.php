<?php
/**
 * Template Name: Affiliate Disclosure
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h1 class="mb-4"><?php echo esc_html( get_theme_mod( 'affiliate_disclosure_title', get_the_title() ) ); ?></h1>
			<div class="legal-content">
                <?php
                $content = get_theme_mod( 'affiliate_disclosure_content' );
                if ( $content ) :
                    echo wp_kses_post( wpautop( $content ) );
                else : ?>
                    <p>In compliance with the FTC guidelines, please assume that any and all links on this website are affiliate links of which Layunin receives a small commission from sales of certain items, but the price is the same for you.</p>
                    <p>Layunin is a participant in various affiliate programs designed to provide a means for sites to earn advertising fees by advertising and linking to partners.</p>
                <?php endif; ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
