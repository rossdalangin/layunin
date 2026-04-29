<?php if ( ! get_theme_mod( 'show_home_categories', true ) ) return; ?>
<section class="categories-section bg-light">
	<div class="container text-center py-5">
		<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Focus Areas</span>
		<h2 class="display-4 fw-black mb-5"><?php echo esc_html( get_theme_mod( 'categories_title', 'Explore Our Mastery Areas' ) ); ?></h2>
		<p class="lead text-muted mx-auto mb-6" style="max-width: 800px;"><?php echo esc_html( get_theme_mod( 'categories_desc', 'Practical guidance for every step of your journey.' ) ); ?></p>
		<div class="master-grid mt-5">
			<?php for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("category_item_{$i}_title", "Focus Area $i");
				$icon = get_theme_mod("category_item_{$i}_icon", "fas fa-star");
			?>
			<div class="category-card card p-5 border-0 shadow-premium animate-up hover-lift" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card-icon text-gold mb-4 fs-1"><i class="<?php echo esc_attr($icon); ?>"></i></div>
				<h3 class="h4 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
				<p class="text-muted small mb-0">Elite guidance and professional resources.</p>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
