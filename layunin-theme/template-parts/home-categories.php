<section class="categories-section py-6 bg-light">
	<div class="container text-center mb-6 animate-up">
		<h2 class="display-4 fw-black text-navy mb-3"><?php echo esc_html( get_theme_mod( 'categories_title', 'The Pillars of Your Purpose' ) ); ?></h2>
		<p class="section-desc lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'categories_desc', 'Deep-dive into the strategies that move the needle.' ) ); ?></p>
	</div>

	<div class="container">
		<div class="row g-4 justify-content-center">
			<?php
            $cat_titles = array('Goal Setting', 'Online Income', 'Productivity', 'AI Mastery', 'Elite Mindset', 'Scalable Business');
            $cat_icons = array('fas fa-bullseye', 'fas fa-wallet', 'fas fa-bolt', 'fas fa-robot', 'fas fa-brain', 'fas fa-chart-line');
			for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("category_item_{$i}_title", $cat_titles[$i-1]);
				$icon = get_theme_mod("category_item_{$i}_icon", $cat_icons[$i-1]);
				if($title) :
			?>
			<div class="col-lg-4 col-md-6 animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<a href="<?php echo esc_url(get_category_link(get_cat_ID($title))); ?>" class="category-card card p-5 border-0 shadow-sm h-100 text-center text-decoration-none transition-all hover-lift" style="border-radius: 30px !important;">
					<div class="category-icon text-gold mb-4 display-3"><i class="<?php echo esc_attr($icon); ?>"></i></div>
					<h3 class="h4 fw-bold text-navy mb-0"><?php echo esc_html($title); ?></h3>
				</a>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
