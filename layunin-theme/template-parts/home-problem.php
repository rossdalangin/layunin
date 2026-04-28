<section class="problem-section py-6 animate-up">
	<div class="container">
		<div class="section-header text-center mb-6">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block">The Foundation of Success</span>
			<h2 class="display-4 fw-black text-navy mb-3"><?php echo esc_html( get_theme_mod( 'problem_title', 'Why Most Goals Fail Before They Even Start' ) ); ?></h2>
			<div class="accent-line mx-auto mb-4" style="width: 80px; height: 4px; background: var(--gold);"></div>
		</div>
		<div class="row g-4">
			<?php for($i = 1; $i <= 4; $i++) :
				$title = get_theme_mod("problem_item_{$i}_title");
				$desc = get_theme_mod("problem_item_{$i}_desc");
				$icon = get_theme_mod("problem_item_{$i}_icon");
			?>
			<div class="col-lg-3 col-md-6">
				<div class="card h-100 p-5 border-0 shadow-sm text-center transition-all hover-lift bg-white">
					<div class="icon-circle bg-light text-accent rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
						<i class="<?php echo esc_attr($icon); ?> fa-2x"></i>
					</div>
					<h3 class="h5 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small mb-0 lh-lg"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
