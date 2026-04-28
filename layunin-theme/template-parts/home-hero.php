<section class="hero-section text-navy d-flex align-items-center position-relative overflow-hidden" style="min-height: 85vh; background: var(--white);">
	<div class="hero-bg-accent position-absolute top-0 end-0 w-50 h-100 d-none d-lg-block" style="background: rgba(212, 175, 55, 0.04); transform: skewX(-8deg) translateX(12%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<div class="hero-content animate-up">
					<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Elite Success Systems for Filipinos</span>
					<h1 class="display-1 fw-black mb-4"><?php echo esc_html( get_theme_mod( 'hero_headline', 'Turn Your Ambitions Into Clear Action' ) ); ?></h1>
					<p class="lead mb-5 text-muted fs-4 pe-lg-5">
						<?php echo esc_html( get_theme_mod( 'hero_subheadline', 'We provide the systems, AI tools, and professional guidance to help you bridge the gap between where you are and where you deserve to be.' ) ); ?>
					</p>
					<div class="hero-btns d-flex flex-wrap gap-4">
						<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-gold shadow-lg"><?php echo esc_html( get_theme_mod('hero_cta_1_text', 'Start My Journey') ); ?></a>
						<a href="<?php echo esc_url( home_url('/about/') ); ?>" class="btn btn-outline-navy fw-bold">Explore Our Methods</a>
					</div>
					<div class="hero-trust mt-5 pt-4 d-flex align-items-center gap-3 border-top border-light">
						<div class="small text-muted fw-bold"><i class="fas fa-users text-gold me-2"></i> Join 10,000+ Filipino High-Achievers</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 d-none d-lg-block animate-up" style="animation-delay: 0.2s;">
				<div class="hero-image-box position-relative">
					<div class="card glass p-5 rounded-4 animate-float">
						<div class="d-flex align-items-center gap-3 mb-4">
							<div class="bg-gold text-white rounded-circle p-3 shadow"><i class="fas fa-check fa-2x"></i></div>
							<div>
								<h3 class="h5 mb-0 fw-bold">Clarity Index</h3>
								<span class="small text-muted">Optimized for Results</span>
							</div>
						</div>
						<div class="progress mb-3 shadow-sm" style="height: 12px; border-radius: 6px;">
							<div class="progress-bar bg-gold" role="progressbar" style="width: 92%"></div>
						</div>
						<div class="small text-navy fw-bold">Achievability Score: 92%</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
