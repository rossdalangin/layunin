<section class="solution-section py-6 bg-white overflow-hidden">
	<div class="container">
		<div class="row align-items-center g-6">
			<div class="col-lg-6 position-relative animate-up">
				<?php
				$image = get_theme_mod( 'solution_image', 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1200' );
				?>
				<div class="solution-image-wrapper p-3 bg-light rounded-4 shadow-lg rotate-n3">
					<img src="<?php echo esc_url($image); ?>" alt="Elite Protocol" class="img-fluid rounded-4">
				</div>
				<div class="solution-badge position-absolute bottom-0 end-0 bg-gold text-white p-4 rounded-4 shadow-lg translate-middle-y translate-middle-x animate-float">
					<div class="h4 fw-black mb-0">Elite</div>
					<div class="small fw-bold">Certified Framework</div>
				</div>
			</div>
			<div class="col-lg-6 animate-up" style="animation-delay: 0.2s;">
				<div class="ps-lg-5">
					<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block solution-badge-text"><?php echo esc_html(get_theme_mod('solution_badge_text', 'The Framework')); ?></span>
					<h2 class="display-5 fw-bold text-navy mb-4 solution-title"><?php echo esc_html( get_theme_mod( 'solution_title', 'The Master Blueprint for High-Output Success' ) ); ?></h2>
					<p class="lead text-muted mb-5 solution-desc"><?php echo esc_html( get_theme_mod( 'solution_desc', 'We don\'t just give you "tips". We provide the architectural frameworks and modular systems that allow you to build a life of purpose, profit, and pure impact.' ) ); ?></p>

					<ul class="list-unstyled mb-0">
						<?php
						$default_bullets = "Clarity Over Chaos: The deep-work protocol.\nSystematic Scalability: Built-for-purpose AI workflows.\nDigital Mastery: Frameworks for online asset creation.";
						$bullets = explode("\n", get_theme_mod('solution_bullets', $default_bullets));
						foreach($bullets as $bullet) :
							if(trim($bullet)) :
						?>
						<li class="d-flex align-items-center gap-3 mb-4 fs-5 fw-bold text-navy">
							<div class="bg-light-gold text-gold rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check"></i></div>
							<?php echo esc_html($bullet); ?>
						</li>
						<?php endif; endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
