<section class="hero-section text-white d-flex align-items-center position-relative overflow-hidden" style="min-height: 90vh; background: linear-gradient(135deg, var(--navy) 0%, #003366 100%);">
	<?php if ( get_theme_mod( 'hero_image' ) ) : ?>
		<div class="hero-bg-image position-absolute top-0 start-0 w-100 h-100" style="background-image: url('<?php echo esc_url( get_theme_mod( 'hero_image' ) ); ?>'); background-size: cover; background-position: center; opacity: 0.2;"></div>
	<?php endif; ?>

	<div class="container position-relative z-index-1">
		<div class="row">
			<div class="col-lg-8">
				<div class="hero-content animate-up">
					<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Empowering Filipinos</span>
					<h1 id="hero-headline" class="display-2 fw-bold mb-4"><?php echo esc_html( get_theme_mod( 'hero_headline', 'Your Goals Deserve More Than Just Dreams' ) ); ?></h1>
					<p id="hero-subheadline" class="lead mb-5 text-white-50 fs-4" style="max-width: 600px;">
						<?php echo esc_html( get_theme_mod( 'hero_subheadline', 'Layunin helps you turn your goals into clear action, real income, and a meaningful life.' ) ); ?>
					</p>
					<div class="hero-btns d-flex flex-wrap gap-3">
						<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-gold btn-lg px-5 py-3 fw-bold shadow-lg transition-all"><?php echo esc_html( get_theme_mod('hero_cta_1_text', 'Download Free Guide') ); ?></a>
						<a href="<?php echo esc_url( home_url('/about/') ); ?>" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold transition-all"><?php echo esc_html( get_theme_mod('hero_cta_2_text', 'Start Your Journey') ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Scroll Down Mouse -->
	<div class="scroll-down position-absolute bottom-0 start-50 translate-middle-x mb-4 d-none d-md-block">
		<div class="mouse">
			<div class="wheel"></div>
		</div>
	</div>
</section>
