<section class="hero-section text-navy d-flex align-items-center position-relative overflow-hidden" style="min-height: 85vh; background: #fff;">
	<div class="hero-bg-accent position-absolute top-0 end-0 w-50 h-100 d-none d-lg-block" style="background: rgba(212, 175, 55, 0.05); transform: skewX(-10deg) translateX(15%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<div class="hero-content animate-up">
					<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Elite Success Systems for Filipinos</span>
					<h1 class="display-1 fw-black mb-4"><?php echo esc_html( get_theme_mod( 'hero_headline', 'Turn Your Ambitions Into Precise Action' ) ); ?></h1>
					<p class="lead mb-5 text-muted fs-4 pe-lg-5">
						<?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We provide the systems, AI productivity tools, and elite guidance to help Filipinos bridge the gap between where they are and where they belong.' ) ); ?>
					</p>
					<div class="hero-btns d-flex flex-wrap gap-4">
						<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-gold shadow-lg hero-cta-1"><?php echo esc_html( get_theme_mod('hero_cta_1_text', 'Start My Journey') ); ?></a>
						<a href="<?php echo esc_url( home_url('/about/') ); ?>" class="btn btn-outline-navy fw-bold border-2 hero-cta-2"><?php echo esc_html( get_theme_mod('hero_cta_2_text', 'Explore Our Methods') ); ?></a>
					</div>
					<div class="hero-trust mt-5 pt-4 d-flex align-items-center gap-4 border-top border-light">
						<div class="avatars d-flex ps-1">
							<div class="rounded-circle border border-3 border-white bg-navy overflow-hidden shadow-sm" style="width: 45px; height: 45px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-3 border-white bg-gold overflow-hidden shadow-sm" style="width: 45px; height: 45px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-3 border-white bg-emerald overflow-hidden shadow-sm" style="width: 45px; height: 45px;"><i class="fas fa-user text-white p-2"></i></div>
						</div>
						<div class="small text-navy fw-bold fs-6">Joined by 10,000+ Filipino High-Achievers</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 d-none d-lg-block animate-up" style="animation-delay: 0.2s;">
				<div class="hero-status-card card glass p-5 rounded-4 animate-float" style="border-radius: 40px !important;">
					<div class="d-flex align-items-center gap-4 mb-4">
						<div class="bg-gold text-white rounded-circle p-3 shadow-sm"><i class="fas fa-bolt fa-2x"></i></div>
						<div>
							<h3 class="h4 mb-0 fw-bold">Clarity Engine</h3>
							<span class="small text-muted">Active Success Protocol</span>
						</div>
					</div>
					<div class="progress mb-4 shadow-sm" style="height: 15px; border-radius: 10px;">
						<div class="progress-bar bg-gold" role="progressbar" style="width: 95%"></div>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<div class="small text-navy fw-bold">Optimization Rate: 95%</div>
						<i class="fas fa-check-circle text-emerald fs-4"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
