	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="site-info">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( get_theme_mod( 'footer_text', 'Your Goals Deserve More Than Just Dreams.' ) ); ?></p>
				<nav class="footer-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
					) );
					?>
				</nav>
			</div>
		</div>
	</footer>
	<?php get_template_part( 'template-parts/popup-form' ); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
