<?php if ( ! get_theme_mod( 'show_home_process', true ) ) return; ?>
<section class="process-section py-xl bg-white position-relative">
	<div class="container text-center py-5">
		<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Elite Framework</span>
		<h2 class="display-4 fw-black text-navy mb-6"><?php echo esc_html( get_theme_mod('process_title', 'The Layunin Method') ); ?></h2>
		<div class="row g-5 mt-4">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("process_step_{$i}_title", "Step $i");
				$desc = get_theme_mod("process_step_{$i}_desc", "Strategic implementation phase.");
			?>
			<div class="col-md-4 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.2; ?>s;">
				<div class="process-number display-1 text-light opacity-10 fw-black mb-n4"><?php echo sprintf('%02d', $i); ?></div>
				<div class="position-relative">
					<h3 class="h3 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted fs-6 lh-lg"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
