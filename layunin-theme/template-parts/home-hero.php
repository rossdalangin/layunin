<section class="hero-section text-navy d-flex align-items-center position-relative overflow-hidden" style="min-height: 85vh; background: #fff;">
	<div class="hero-bg-accent position-absolute top-0 end-0 w-50 h-100 d-none d-lg-block" style="background: rgba(212, 175, 55, 0.03); transform: skewX(-10deg) translateX(10%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<div class="hero-content animate-up">
					<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Philippine's Premier Goal Success Platform</span>
					<h1 class="display-1 fw-black mb-4"><?php echo esc_html( get_theme_mod( 'hero_headline', 'Your Goals Deserve More Than Just Dreams' ) ); ?></h1>
					<p class="lead mb-5 text-muted fs-4 pe-lg-5">
						<?php echo esc_html( get_theme_mod( 'hero_subheadline', 'Layunin helps you turn your deepest aspirations into clear action, real income, and a more meaningful life.' ) ); ?>
					</p>
					<div class="hero-btns d-flex flex-wrap gap-4">
						<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-gold btn-lg px-5 py-3 shadow-lg"><?php echo esc_html( get_theme_mod('hero_cta_1_text', 'Download Free Guide') ); ?></a>
						<a href="<?php echo esc_url( home_url('/about/') ); ?>" class="btn btn-outline-navy btn-lg px-5 py-3 fw-bold"><?php echo esc_html( get_theme_mod('hero_cta_2_text', 'Start Your Journey') ); ?></a>
					</div>
					<div class="hero-trust mt-5 pt-4 d-flex align-items-center gap-3">
						<div class="avatars d-flex ps-1">
							<div class="rounded-circle border border-2 border-white bg-navy overflow-hidden" style="width: 40px; height: 40px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-2 border-white bg-gold overflow-hidden" style="width: 40px; height: 40px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-2 border-white bg-accent overflow-hidden" style="width: 40px; height: 40px;"><i class="fas fa-user text-white p-2"></i></div>
						</div>
						<div class="small text-muted fw-bold">Joined by 10,000+ High Achievers</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 d-none d-lg-block animate-up" style="animation-delay: 0.2s;">
				<div class="hero-image-box position-relative">
					<div class="glass-card p-5 rounded-4 animate-float">
						<div class="d-flex align-items-center gap-3 mb-4">
							<div class="bg-gold text-white rounded-circle p-3"><i class="fas fa-check fa-2x"></i></div>
							<div>
								<h3 class="h5 mb-0 fw-bold">Goal Clarity</h3>
								<span class="small text-muted">System Activated</span>
							</div>
						</div>
						<div class="progress mb-3" style="height: 10px;">
							<div class="progress-bar bg-gold" role="progressbar" style="width: 85%"></div>
						</div>
						<div class="small text-navy fw-bold">Success Probability: 85%</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
