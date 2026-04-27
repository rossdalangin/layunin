<section class="categories-section">
	<div class="container text-center">
		<h2><?php echo esc_html( get_theme_mod( 'categories_title', 'Explore Our Focus Areas' ) ); ?></h2>
		<p class="section-desc">Practical guidance for every step of your journey.</p>
		<div class="category-grid grid-layout mt-5">
			<?php for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("category_item_{$i}_title");
				$icon = get_theme_mod("category_item_{$i}_icon");
				if($title) :
			?>
			<div class="category-card card animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card-icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
				<h3><?php echo esc_html($title); ?></h3>
				<p class="text-muted small">Practical guidance and resources.</p>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
