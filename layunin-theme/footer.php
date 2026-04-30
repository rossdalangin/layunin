<?php
/**
 * The template for displaying the footer (v9.8 Masterpiece)
 */
?>
	<footer id="colophon" class="site-footer bg-navy text-white py-phi mt-auto">
		<div class="container">
			<div class="row g-5">
				<div class="col-lg-4">
					<div class="footer-branding mb-phi pe-lg-5">
						<?php if ( has_custom_logo() ) : ?>
							<div class="footer-logo mb-phi-l brightness-0 invert"><?php the_custom_logo(); ?></div>
						<?php else : ?>
							<h2 class="h3 text-white fw-black mb-phi-l"><?php bloginfo('name'); ?></h2>
						<?php endif; ?>
						<p class="text-white-50 lh-lg branding-text">
							<?php echo esc_html( get_theme_mod( 'footer_branding_text', 'Architecting the next generation of Filipino excellence.' ) ); ?>
						</p>
						<div class="social-links d-flex gap-4 mt-phi">
							<?php
							$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
							foreach ( $socials as $social ) :
								$link = get_theme_mod( "social_{$social}", '#' );
								if ( $link ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" class="text-white-50 hover-gold transition-all fs-5"><i class="fab fa-<?php echo $social; ?>"></i></a>
								<?php endif;
							endforeach; ?>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-6">
					<h3 class="h6 text-uppercase fw-bold text-white mb-phi-l letter-spacing-2 footer-col2-title"><?php echo esc_html(get_theme_mod('footer_col2_title', 'Mastery Areas')); ?></h3>
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
					<h3 class="h6 text-uppercase fw-bold text-white mb-phi-l letter-spacing-2 footer-col3-title"><?php echo esc_html(get_theme_mod('footer_col3_title', 'Elite Vault')); ?></h3>
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
					<h3 class="h6 text-uppercase fw-bold text-white mb-phi-l footer-newsletter-title"><?php echo esc_html(get_theme_mod('footer_newsletter_title', 'The Growth Protocol')); ?></h3>
					<p class="text-white-50 small mb-phi-l footer-newsletter-desc"><?php echo esc_html(get_theme_mod('footer_newsletter_desc', 'Join 25,000+ subscribers for weekly high-output insights.')); ?></p>
					<form class="newsletter-form mb-phi-l" action="<?php echo esc_url(get_theme_mod('newsletter_form_action')); ?>" method="POST">
						<div class="input-group">
							<input type="email" name="EMAIL" class="form-control bg-navy-light border-0 text-white py-3" placeholder="<?php echo esc_attr(get_theme_mod('footer_newsletter_ph', 'Enter your best email')); ?>" style="border-radius: 12px 0 0 12px !important;">
							<button class="btn btn-gold px-4 footer-newsletter-btn" type="submit" style="border-radius: 0 12px 12px 0 !important; padding: 0.5rem 1.5rem;"><?php echo esc_html(get_theme_mod('footer_newsletter_btn', 'Join')); ?></button>
						</div>
					</form>
                    <p class="small text-accent fw-bold footer-newsletter-trust"><i class="fas fa-shield-alt me-2"></i> <?php echo esc_html(get_theme_mod('footer_newsletter_trust', 'No spam. Only purpose.')); ?></p>
				</div>
			</div>

			<hr class="my-phi border-white opacity-10">

			<div class="footer-bottom d-md-flex align-items-center justify-content-between small text-white-50">
				<div class="copyright text-white-50">
					<?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' Layunin.com. All rights reserved. Architected in the Philippines.')); ?>
				</div>
				<div class="footer-meta d-flex gap-4 mt-phi-s mt-md-0">
					<a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>" class="text-white-50 text-decoration-none hover-white footer-privacy-label"><?php echo esc_html(get_theme_mod('footer_privacy_label', 'Privacy')); ?></a>
					<a href="<?php echo esc_url( home_url('/terms/') ); ?>" class="text-white-50 text-decoration-none hover-white footer-terms-label"><?php echo esc_html(get_theme_mod('footer_terms_label', 'Terms')); ?></a>
				</div>
			</div>
		</div>
	</footer>

	<a href="#" id="back-to-top" class="back-to-top btn btn-gold rounded-circle shadow-lg" style="display: none; position: fixed; bottom: 40px; right: 40px; z-index: 100; width: 60px; height: 60px; align-items: center; justify-content: center;">
		<i class="fas fa-chevron-up"></i>
	</a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
