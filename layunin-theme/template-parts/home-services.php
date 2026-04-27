<section class="services-section bg-light">
	<div class="container text-center">
		<h2><?php echo esc_html( get_theme_mod( 'services_home_title', 'Work With Us' ) ); ?></h2>
		<p class="section-desc">Get personalized support to reach your goals faster.</p>
		<div class="service-grid grid-layout mt-5">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("service_item_{$i}_title");
				$desc = get_theme_mod("service_item_{$i}_desc");
				$icon = get_theme_mod("service_item_{$i}_icon");
				if($title) :
			?>
			<div class="service-item card animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card-icon"><i class="<?php echo esc_attr($icon); ?>"></i></div>
				<h3><?php echo esc_html($title); ?></h3>
				<p class="text-muted small"><?php echo esc_html($desc); ?></p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-primary btn-sm mt-3">Inquire Now</a>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
