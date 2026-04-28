<section class="categories-section py-6">
	<div class="container text-center">
		<h2 class="display-4 fw-bold text-navy mb-3"><?php echo esc_html( get_theme_mod( 'categories_title', 'Explore Our Focus Areas' ) ); ?></h2>
		<p class="section-desc lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'categories_desc', 'Practical guidance for every step of your journey.' ) ); ?></p>
		<div class="row mt-5">
			<?php for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("category_item_{$i}_title");
				$icon = get_theme_mod("category_item_{$i}_icon", "fas fa-star");
				if($title) :
			?>
			<div class="col-lg-4 col-md-6 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card h-100 p-5 border-0 shadow-sm hover-lift rounded-4">
					<div class="card-icon mb-4 text-gold fs-1"><i class="<?php echo esc_attr($icon); ?>"></i></div>
					<h3 class="h4 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small">Practical guidance and resources.</p>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
