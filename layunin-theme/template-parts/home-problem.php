<section class="problem-section py-6 animate-up">
	<div class="container">
		<div class="section-header text-center mb-5 pb-4">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block">The Struggle is Real</span>
			<h2 class="display-5 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'problem_title', 'Feeling Stuck and Without Direction?' ) ); ?></h2>
			<p class="text-muted mx-auto" style="max-width: 700px;">Many Filipinos face these same hurdles. You are not alone, and it is not your fault—you just need a better system.</p>
		</div>
		<div class="row g-4 justify-content-center">
			<?php for($i = 1; $i <= 4; $i++) :
				$title = get_theme_mod("problem_item_{$i}_title", 'Problem Item ' . $i);
				$desc = get_theme_mod("problem_item_{$i}_desc", 'Description for problem item ' . $i);
				$icon = get_theme_mod("problem_item_{$i}_icon", 'fas fa-exclamation-circle');
			?>
			<div class="col-lg-3 col-md-6">
				<div class="problem-card card h-100 p-4 border-0 shadow-sm text-center transition-all hover-lift">
					<div class="icon-wrapper mb-4 text-accent fs-1">
						<i class="<?php echo esc_attr($icon); ?>"></i>
					</div>
					<h3 class="h5 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small mb-0"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
