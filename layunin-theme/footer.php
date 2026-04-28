<?php
/**
 * The template for displaying the footer
 */
?>
	<footer id="colophon" class="site-footer pt-6 pb-4 mt-auto">
		<div class="container">
			<div class="row g-5">
				<div class="col-lg-4">
					<div class="footer-branding mb-4">
						<?php if ( has_custom_logo() ) : ?>
							<div class="footer-logo mb-3">
								<?php the_custom_logo(); ?>
							</div>
						<?php else : ?>
							<h2 class="h3 text-white fw-bold mb-3"><?php bloginfo('name'); ?></h2>
						<?php endif; ?>
						<p class="text-white-50 pe-lg-4">
							<?php echo esc_html( get_theme_mod( 'footer_branding_text', 'Helping Filipinos transform their goals into action, income, and success through practical systems and AI productivity tools.' ) ); ?>
						</p>
						<p class="small text-accent fw-bold mt-4">
							<i class="fas fa-check-circle me-2"></i> <?php echo esc_html(get_theme_mod('footer_trust_statement', 'Built with purpose for the modern Filipino achiever.')); ?>
						</p>
					</div>
				</div>

				<div class="col-lg-2 col-md-6">
					<h3 class="h6 text-uppercase fw-bold text-white mb-4 letter-spacing-1"><?php echo esc_html(get_theme_mod('footer_col2_title', 'Explore')); ?></h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'container'      => false,
						'menu_class'     => 'list-unstyled footer-menu',
						'fallback_cb'    => false,
					) );
					?>
				</div>

				<div class="col-lg-2 col-md-6">
					<h3 class="h6 text-uppercase fw-bold text-white mb-4 letter-spacing-1"><?php echo esc_html(get_theme_mod('footer_col3_title', 'Resources')); ?></h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'list-unstyled footer-menu',
						'fallback_cb'    => false,
					) );
					?>
				</div>

				<div class="col-lg-4">
					<h3 class="h6 text-uppercase fw-bold text-white mb-4 letter-spacing-1"><?php echo esc_html(get_theme_mod('footer_newsletter_title', 'Stay Ahead')); ?></h3>
					<p class="text-white-50 small mb-4">Get the latest insights on productivity, income, and personal growth delivered to your inbox.</p>
					<form class="newsletter-form">
						<div class="input-group">
							<input type="email" class="form-control bg-dark border-0 text-white" placeholder="your@email.com" style="height: 50px;">
							<button class="btn btn-gold" type="button">Join</button>
						</div>
					</form>
					<div class="social-links d-flex gap-3 mt-4 pt-2">
						<?php
						$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
						foreach ( $socials as $social ) :
							$link = get_theme_mod( "social_{$social}" );
							if ( $link ) : ?>
								<a href="<?php echo esc_url( $link ); ?>" class="text-white-50 hover-gold fs-5 transition-all"><i class="fab fa-<?php echo $social; ?>"></i></a>
							<?php endif;
						endforeach; ?>
					</div>
				</div>
			</div>

			<hr class="my-5 border-secondary opacity-25">

			<div class="footer-bottom d-md-flex align-items-center justify-content-between small text-white-50">
				<div class="copyright mb-3 mb-md-0">
					<?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' Layunin.com. All rights reserved.')); ?>
				</div>
				<div class="footer-meta d-flex gap-4">
					<a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a>
					<a href="<?php echo esc_url( home_url('/terms-and-conditions/') ); ?>" class="text-white-50 text-decoration-none hover-white">Terms of Service</a>
				</div>
			</div>
		</div>
	</footer>

	<a href="#" id="back-to-top" class="back-to-top btn btn-gold rounded-circle shadow-lg" style="display: none; position: fixed; bottom: 30px; right: 30px; z-index: 99; width: 50px; height: 50px; align-items: center; justify-content: center;">
		<i class="fas fa-arrow-up"></i>
	</a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
