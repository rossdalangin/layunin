<section class="hero-section text-navy d-flex align-items-center position-relative overflow-hidden py-phi" style="min-height: 85vh; background: var(--white);">
	<div class="hero-bg-accent position-absolute top-0 end-0 w-50 h-100 d-none d-lg-block" style="background: var(--bg-light-gold); transform: skewX(-10deg) translateX(15%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-5">
			<div class="col-lg-7">
				<div class="hero-content animate-up">
					<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block hero-badge-text"><?php echo esc_html(get_theme_mod('hero_badge', 'Elite Success Systems for Filipinos')); ?></span>
					<h1 class="display-1 fw-black mb-phi-l"><?php echo esc_html( get_theme_mod( 'hero_headline', 'Manifest Your "Layunin" Into A High-Impact Reality' ) ); ?></h1>
					<p class="lead mb-phi text-muted fs-4 pe-lg-5">
						<?php echo esc_html( get_theme_mod( 'hero_subheadline', 'Bridging the gap between Filipino ambition and world-class execution through elite systems, AI productivity, and financial mastery.' ) ); ?>
					</p>
					<div class="hero-btns d-flex flex-wrap gap-4">
						<a href="<?php echo esc_url( get_theme_mod('hero_cta_1_link', home_url('/lead-magnet/')) ); ?>" class="btn btn-gold shadow-lg hero-cta-1"><?php echo esc_html( get_theme_mod('hero_cta_1_text', 'Start Your Transformation') ); ?></a>
						<a href="<?php echo esc_url( get_theme_mod('hero_cta_2_link', home_url('/about/')) ); ?>" class="btn btn-outline-navy fw-bold border-2 hero-cta-2"><?php echo esc_html( get_theme_mod('hero_cta_2_text', 'Browse Elite Systems') ); ?></a>
					</div>
					<div class="hero-trust mt-phi pt-4 d-flex align-items-center gap-4 border-top border-light">
						<div class="avatars d-flex ps-1">
							<div class="rounded-circle border border-3 border-white bg-navy overflow-hidden shadow-sm" style="width: 45px; height: 45px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-3 border-white bg-gold overflow-hidden shadow-sm" style="width: 45px; height: 45px; margin-right: -15px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-3 border-white bg-emerald overflow-hidden shadow-sm" style="width: 45px; height: 45px;"><i class="fas fa-user text-white p-2"></i></div>
						</div>
						<div class="small text-navy fw-bold fs-6 hero-social-proof"><?php echo esc_html(get_theme_mod('hero_social_proof', 'Trusted by 25,000+ Filipino High-Achievers & Entrepreneurs')); ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 d-none d-lg-block animate-up" style="animation-delay: 0.2s;">
				<div class="hero-status-card card glass p-5 rounded-4 animate-float" style="border-radius: 40px !important;">
					<div class="d-flex align-items-center gap-4 mb-phi-l">
						<div class="bg-gold text-white rounded-circle p-3 shadow-sm"><i class="<?php echo esc_attr(get_theme_mod('hero_card_icon', 'fas fa-bolt')); ?> fa-2x"></i></div>
						<div>
							<h3 class="h4 mb-0 fw-bold hero-card-title"><?php echo esc_html(get_theme_mod('hero_card_title', 'Clarity Engine')); ?></h3>
							<span class="small text-muted hero-card-status"><?php echo esc_html(get_theme_mod('hero_card_status', 'Active Success Protocol')); ?></span>
						</div>
					</div>
					<div class="progress mb-phi-l shadow-sm" style="height: 15px; border-radius: 10px;">
						<div class="progress-bar bg-gold" role="progressbar" style="width: <?php echo esc_attr(get_theme_mod('hero_card_percent', '95')); ?>%"></div>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<div class="small text-navy fw-bold hero-card-rate"><?php echo esc_html(get_theme_mod('hero_card_rate', 'Optimization Rate: 95%')); ?></div>
						<i class="fas fa-check-circle text-emerald fs-4"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
