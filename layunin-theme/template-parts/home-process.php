<?php if ( get_theme_mod( 'show_home_process', true ) ) : ?>
<section class="process-section py-5 bg-white">
	<div class="container py-5 text-center">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Our Framework</span>
		<h2 class="display-4 mb-5 process-title"><?php echo esc_html( get_theme_mod('process_title', 'How Layunin Works') ); ?></h2>
		<div class="row mt-5">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("process_step_{$i}_title", "Step $i");
				$desc = get_theme_mod("process_step_{$i}_desc", "Description of step $i...");
			?>
			<div class="col-md-4 mb-4 animate-up process-step-<?php echo $i; ?>" style="animation-delay: <?php echo ($i-1)*0.2; ?>s;">
				<div class="process-step-number display-1 text-light opacity-25 fw-bold mb-n4"><?php echo $i; ?></div>
				<div class="position-relative">
					<h3 class="h4 fw-bold mb-3 step-title"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small step-desc"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
