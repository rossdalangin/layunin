<section class="services-section py-phi bg-light">
	<div class="container text-center mb-6 animate-up">
		<h2 class="display-4 fw-black text-navy mb-3"><?php echo esc_html( get_theme_mod( 'services_home_title', 'Strategic Implementation Systems' ) ); ?></h2>
        <div class="accent-line mx-auto" style="width: 80px; height: 4px; background: var(--gold);"></div>
	</div>

	<div class="container">
		<div class="row g-5">
			<?php
            $servs = array(
                1 => array('title' => 'Executive Mentorship', 'desc' => '1-on-1 strategic alignment for high-net-worth founders.', 'icon' => 'fas fa-chess-king'),
                2 => array('title' => 'Business Optimization', 'desc' => 'Custom systems and AI workflows for your existing team.', 'icon' => 'fas fa-gears'),
                3 => array('title' => 'Wealth Architecture', 'desc' => 'Building diversified, scalable digital asset portfolios.', 'icon' => 'fas fa-vault')
            );
			for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("service_item_{$i}_title", $servs[$i]['title']);
				$desc = get_theme_mod("service_item_{$i}_desc", $servs[$i]['desc']);
				$icon = get_theme_mod("service_item_{$i}_icon", $servs[$i]['icon']);
				if($title) :
			?>
			<div class="col-lg-4 animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<div class="service-card card p-5 border-0 shadow-sm h-100 transition-all hover-lift" style="border-radius: 40px !important;">
					<div class="service-icon text-gold mb-4 display-4"><i class="<?php echo esc_attr($icon); ?>"></i></div>
					<h3 class="h4 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted mb-5"><?php echo esc_html($desc); ?></p>
						<a href="<?php echo esc_url( home_url('/services/') ); ?>" class="btn btn-link text-navy text-decoration-none fw-bold p-0 services-home-btn-text"><?php echo esc_html(get_theme_mod('services_home_btn_text', 'Explore Service')); ?> <i class="fas fa-arrow-right ms-2"></i></a>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
