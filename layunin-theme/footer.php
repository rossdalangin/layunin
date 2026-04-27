	<footer id="colophon" class="site-footer mt-5">
		<div class="container">
			<div class="footer-grid row py-5">
				<div class="col-lg-4 mb-4">
					<div class="footer-branding mb-4">
						<?php the_custom_logo(); ?>
						<h2 class="h4 text-white"><?php bloginfo( 'name' ); ?></h2>
					</div>
					<p class="text-white-50"><?php echo esc_html( get_theme_mod( 'footer_branding_text', 'Empowering Filipinos to turn their goals into action, income, and success. Your journey to a meaningful life starts here.' ) ); ?></p>
					<div class="social-links d-flex gap-3 mt-4">
						<?php
						$socials = array(
							'facebook'  => 'fab fa-facebook-f',
							'twitter'   => 'fab fa-twitter',
							'instagram' => 'fab fa-instagram',
							'linkedin'  => 'fab fa-linkedin-in',
							'youtube'   => 'fab fa-youtube'
						);
						foreach ( $socials as $id => $icon_class ) :
							$link = get_theme_mod( "social_{$id}" );
							if ( $link ) : ?>
								<a href="<?php echo esc_url( $link ); ?>" class="text-white fs-5" aria-label="<?php echo ucfirst($id); ?>"><i class="<?php echo esc_attr($icon_class); ?>"></i></a>
							<?php endif;
						endforeach; ?>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 mb-4">
					<h3 class="footer-title">Navigation</h3>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'     => 'list-unstyled text-white-50',
						'container'      => false,
					) );
					?>
				</div>
				<div class="col-lg-3 col-md-4 mb-4">
					<h3 class="footer-title">Recent Insights</h3>
					<ul class="list-unstyled text-white-50 small">
						<?php
						$recent_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
						while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						?>
						<li class="mb-2"><a href="<?php the_permalink(); ?>" class="text-white-50 text-decoration-none"><?php the_title(); ?></a></li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4 mb-4">
					<h3 class="footer-title"><?php echo esc_html( get_theme_mod( 'footer_newsletter_title', 'Newsletter' ) ); ?></h3>
					<p class="text-white-50 small mb-4"><?php echo esc_html( get_theme_mod( 'footer_newsletter_desc', 'Join 10,000+ subscribers for weekly growth tips.' ) ); ?></p>
					<form class="footer-newsletter">
						<div class="input-group">
							<input type="email" class="form-control border-0" placeholder="Your Email" required>
							<button class="btn btn-gold px-3" type="submit">Join</button>
						</div>
					</form>
				</div>
			</div>
			<div class="site-info py-4 border-top border-white-10 text-center text-white-50 small">
				<p class="mb-0">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. <span class="mx-2">|</span> Made for your "Layunin".</p>
			</div>
		</div>
	</footer>
	<?php get_template_part( 'template-parts/popup-form' ); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
