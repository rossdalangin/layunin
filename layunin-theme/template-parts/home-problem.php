<section class="problem-section">
	<div class="container text-center">
		<h2><?php echo esc_html( get_theme_mod( 'problem_title', 'Feeling Stuck and Without Direction?' ) ); ?></h2>
		<p class="section-desc">Many Filipinos struggle with turning their dreams into reality. Does this sound like you?</p>
		<div class="problem-grid grid-layout mt-5">
			<?php for($i = 1; $i <= 4; $i++) :
				$title = get_theme_mod("problem_item_{$i}_title");
				$desc = get_theme_mod("problem_item_{$i}_desc");
				$icon = get_theme_mod("problem_item_{$i}_icon");
				if($title) :
			?>
			<div class="problem-item card animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card-icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
				<h3><?php echo esc_html($title); ?></h3>
				<p class="text-muted small"><?php echo esc_html($desc); ?></p>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
