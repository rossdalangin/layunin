<?php
/**
 * Template Name: Lead Magnet Landing
 */
get_header(); ?>
<main id="primary" class="site-main py-6 bg-light">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-6 animate-up">
				<div class="lm-content-box pe-lg-4">
					<span class="badge bg-gold px-3 py-2 mb-3 shadow-sm">Free Digital Resource</span>
					<h1 class="display-3 fw-bold text-navy mb-4"><?php echo esc_html( get_theme_mod( 'lead_magnet_landing_title', 'Elite 7-Day Goal Reset Protocol' ) ); ?></h1>
					<p class="lead text-muted mb-5 fs-4">
						<?php echo esc_html( get_theme_mod( 'lead_magnet_content', 'Stop existing on autopilot. This is the exact audit used by high-output leaders to reclaim their time and refocus their absolute purpose.' ) ); ?>
					</p>

					<h3 class="h5 fw-bold text-navy mb-4 lm-benefit-title"><?php echo esc_html(get_theme_mod('lm_benefit_title', "The Architecture of the Protocol:")); ?></h3>
					<ul class="list-unstyled mb-5 benefit-list">
						<?php for($i = 1; $i <= 3; $i++) :
							$benefit = get_theme_mod("lm_benefit_{$i}", "Strategic Level {$i} Optimization");
						?>
						<li class="mb-3 d-flex align-items-start benefit-item-<?php echo $i; ?>">
							<div class="benefit-check text-accent me-3 fs-5"><i class="fas fa-check-circle"></i></div>
							<span class="text-navy fw-bold benefit-text"><?php echo esc_html($benefit); ?></span>
						</li>
						<?php endfor; ?>
					</ul>

					<div class="trust-pill d-inline-flex align-items-center bg-white p-2 pe-4 rounded-pill shadow-sm mb-5">
						<div class="avatars me-3 d-flex ps-2">
							<div class="rounded-circle border border-2 border-white bg-navy overflow-hidden" style="width: 35px; height: 35px; margin-right: -10px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-2 border-white bg-gold overflow-hidden" style="width: 35px; height: 35px; margin-right: -10px;"><i class="fas fa-user text-white p-2"></i></div>
							<div class="rounded-circle border border-2 border-white bg-accent overflow-hidden" style="width: 35px; height: 35px;"><i class="fas fa-user text-white p-2"></i></div>
						</div>
						<span class="small text-muted fw-bold">Joined by 25,000+ Filipinos</span>
					</div>
				</div>
			</div>

			<div class="col-lg-6 animate-up" style="animation-delay: 0.2s;">
				<div class="landing-form-card card border-0 shadow-2xl p-5 rounded-4 bg-white overflow-hidden position-relative">
					<div class="accent-line bg-gold position-absolute top-0 start-0 w-100" style="height: 6px;"></div>
					<div class="text-center mb-5">
						<h2 class="h3 fw-bold text-navy">Get the Reset Guide</h2>
						<p class="text-muted">Enter your details below for instant access.</p>
					</div>

					<form class="row g-3">
						<div class="col-12">
							<label class="form-label small fw-bold">Your First Name</label>
							<input type="text" class="form-control form-control-lg bg-light border-0" placeholder="e.g. Maria" required>
						</div>
						<div class="col-12">
							<label class="form-label small fw-bold">Your Primary Email</label>
							<input type="email" class="form-control form-control-lg bg-light border-0" placeholder="e.g. maria@example.com" required>
						</div>
						<div class="col-12 mt-4">
							<button type="submit" class="btn btn-navy btn-lg w-100 py-3 fw-bold shadow-lg transition-all">Download My Copy Now <i class="fas fa-download ms-2"></i></button>
						</div>
						<div class="col-12 text-center mt-3">
							<p class="small text-muted mb-0"><i class="fas fa-lock me-1"></i> Your data is safe. We hate spam too.</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<section class="testimonial-bar bg-navy py-5 overflow-hidden">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8">
				<p class="text-white mb-0 h5 fst-italic">"This guide was exactly what I needed to get my career back on track. I finally have a clear plan!"</p>
			</div>
			<div class="col-md-4 text-md-end mt-4 mt-md-0">
				<div class="d-flex align-items-center justify-content-md-end">
					<div class="text-end me-3">
						<h4 class="h6 text-white mb-0">Juan Dela Cruz</h4>
						<span class="small text-white-50">High-Output Leader</span>
					</div>
					<div class="rounded-circle bg-gold" style="width: 50px; height: 50px;"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
