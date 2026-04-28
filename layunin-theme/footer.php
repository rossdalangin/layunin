<?php
/**
 * The template for displaying the footer
 */
?>
	<footer id="colophon" class="site-footer bg-navy text-white pt-5 pb-4">
		<div class="container">
			<div class="row g-5">
				<div class="col-lg-4">
					<div class="footer-branding mb-4">
						<?php if ( has_custom_logo() ) : ?>
							<div class="footer-logo mb-3 brightness-0 invert">
								<?php the_custom_logo(); ?>
							</div>
						<?php else : ?>
							<h2 class="h4 text-white fw-bold mb-3"><?php bloginfo('name'); ?></h2>
						<?php endif; ?>
						<p class="text-white-50 small pe-lg-4">
							<?php echo esc_html( get_theme_mod( 'footer_branding_text', 'Empowering Filipinos to turn their goals into action, income, and success. Your journey to a meaningful life starts here.' ) ); ?>
						</p>
						<div class="social-links d-flex gap-3 mt-4">
							<?php
							$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
							foreach ( $socials as $social ) :
								$link = get_theme_mod( "social_{$social}" );
								if ( $link ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" class="text-white hover-gold transition-all"><i class="fab fa-<?php echo $social; ?>"></i></a>
								<?php endif;
							endforeach; ?>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-4">
					<h3 class="h6 text-uppercase fw-bold text-accent mb-4"><?php echo esc_html(get_theme_mod('footer_col2_title', 'Quick Links')); ?></h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'container'      => false,
						'menu_class'     => 'list-unstyled footer-menu small',
						'fallback_cb'    => false,
					) );
					?>
				</div>

				<div class="col-lg-2 col-md-4">
					<h3 class="h6 text-uppercase fw-bold text-accent mb-4"><?php echo esc_html(get_theme_mod('footer_col3_title', 'Resources')); ?></h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'list-unstyled footer-menu small',
						'fallback_cb'    => false,
					) );
					?>
				</div>

				<div class="col-lg-4 col-md-4">
					<h3 class="h6 text-uppercase fw-bold text-accent mb-4"><?php echo esc_html(get_theme_mod('footer_newsletter_title', 'Newsletter')); ?></h3>
					<p class="text-white-50 small mb-4"><?php echo esc_html(get_theme_mod('footer_newsletter_desc', 'Join 10,000+ subscribers for weekly growth tips.')); ?></p>
					<form class="newsletter-form">
						<div class="input-group">
							<input type="email" class="form-control bg-dark border-0 text-white" placeholder="Your Email" aria-label="Email">
							<button class="btn btn-gold" type="button">Join</button>
						</div>
					</form>
				</div>
			</div>

			<hr class="my-5 border-secondary">

			<div class="footer-bottom d-md-flex align-items-center justify-content-between small text-white-50">
				<div class="copyright mb-3 mb-md-0">
					<?php echo esc_html(get_theme_mod('footer_copyright', '© ' . date('Y') . ' Layunin.com. All rights reserved.')); ?>
				</div>
				<div class="footer-meta d-flex gap-3">
					<a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>" class="text-white-50 text-decoration-none hover-white">Privacy</a>
					<a href="<?php echo esc_url( home_url('/terms-and-conditions/') ); ?>" class="text-white-50 text-decoration-none hover-white">Terms</a>
				</div>
			</div>
		</div>
	</footer>

	<a href="#" id="back-to-top" class="back-to-top btn btn-gold rounded-circle shadow-lg" style="display: none;">
		<i class="fas fa-arrow-up"></i>
	</a>

	<?php get_template_part( 'template-parts/popup-form' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
