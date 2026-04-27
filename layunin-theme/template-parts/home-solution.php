<section class="solution-section bg-light">
	<div class="container">
		<div class="row align-items-center">
			<?php
			$image = get_theme_mod('solution_image', 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=800');
			?>
			<div class="col-md-6 animate-up">
				<img src="<?php echo esc_url($image); ?>" alt="Layunin Solution" class="img-fluid rounded-4 shadow-lg">
			</div>
			<div class="col-md-6 animate-up ps-lg-5" style="animation-delay: 0.2s;">
				<h2 class="display-5 fw-bold"><?php echo esc_html( get_theme_mod( 'solution_title', 'How Layunin Transforms Your Life' ) ); ?></h2>
				<p class="lead text-muted mb-4"><?php echo esc_html( get_theme_mod( 'solution_desc', 'We provide the roadmap and the tools you need to bridge the gap between where you are and where you want to be.' ) ); ?></p>
				<ul class="solution-list list-unstyled">
					<?php
					$bullets = explode("\n", get_theme_mod('solution_bullets', "Clarity: We help you define your 'Layunin' with precision.\nSystems: Proven frameworks for productivity.\nTools: Digital resources and AI assets.\nAccountability: Guidance to keep you moving."));
					foreach($bullets as $bullet) : if(trim($bullet)) : ?>
						<li class="mb-3 d-flex align-items-start"><i class="fas fa-check-circle text-accent me-3 mt-1"></i> <span><?php echo esc_html($bullet); ?></span></li>
					<?php endif; endforeach; ?>
				</ul>
				<a href="#" class="btn btn-primary btn-lg mt-4 px-5">Learn More About Our Method</a>
			</div>
		</div>
	</div>
</section>
