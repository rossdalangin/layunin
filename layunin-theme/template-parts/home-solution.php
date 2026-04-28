<section class="solution-section py-6 bg-light animate-up">
	<div class="container">
		<div class="row align-items-center g-5">
			<div class="col-lg-6">
				<div class="solution-image-wrapper position-relative">
					<?php
					$image = get_theme_mod( 'solution_image' );
					if ( $image ) : ?>
						<img src="<?php echo esc_url( $image ); ?>" alt="Layunin Solution" class="img-fluid rounded-4 shadow-lg">
					<?php else : ?>
						<div class="solution-placeholder bg-navy rounded-4 shadow-lg d-flex align-items-center justify-content-center" style="height: 450px;">
							<i class="fas fa-rocket fa-5x text-white opacity-20"></i>
						</div>
					<?php endif; ?>
					<div class="floating-badge bg-gold p-4 rounded-4 shadow-lg position-absolute bottom-0 end-0 m-4 d-none d-md-block animate-float">
						<div class="h4 fw-bold text-white mb-0">100%</div>
						<div class="small text-white-50">Proven Systems</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="solution-content ps-lg-4">
					<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block">The Solution</span>
					<h2 class="display-5 fw-bold text-navy mb-4"><?php echo esc_html( get_theme_mod( 'solution_title', 'How Layunin Transforms Your Life' ) ); ?></h2>
					<p class="lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'solution_desc', 'We provide the roadmap and the tools you need to bridge the gap between where you are and where you want to be.' ) ); ?></p>

					<ul class="list-unstyled solution-bullets">
						<?php
						$bullets = explode("\n", get_theme_mod('solution_bullets', "Clarity: We help you define your 'Layunin' with precision.\nSystems: Proven frameworks for productivity.\nTools: Digital resources and AI assets.\nAccountability: Guidance to keep you moving."));
						foreach($bullets as $bullet) :
							$parts = explode(':', $bullet);
							if (count($parts) >= 2) : ?>
								<li class="mb-4 d-flex">
									<div class="bullet-icon bg-white shadow-sm text-accent rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
										<i class="fas fa-check"></i>
									</div>
									<div>
										<strong class="text-navy d-block"><?php echo esc_html(trim($parts[0])); ?></strong>
										<span class="text-muted small"><?php echo esc_html(trim($parts[1])); ?></span>
									</div>
								</li>
						<?php endif; endforeach; ?>
					</ul>
					<a href="<?php echo esc_url( home_url('/services/') ); ?>" class="btn btn-navy btn-lg px-5 mt-3">Learn More About Our Systems</a>
				</div>
			</div>
		</div>
	</div>
</section>
