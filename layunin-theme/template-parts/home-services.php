<section class="services-section bg-light py-6">
	<div class="container text-center">
		<h2 class="display-4 fw-bold text-navy mb-3"><?php echo esc_html( get_theme_mod( 'services_home_title', 'Work With Us' ) ); ?></h2>
		<p class="section-desc lead text-muted mb-5">Get personalized support to reach your goals faster.</p>
		<div class="row mt-5">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("service_item_{$i}_title");
				$desc = get_theme_mod("service_item_{$i}_desc");
				$icon = get_theme_mod("service_item_{$i}_icon", "fas fa-briefcase");

                if(!$title) {
                    $defaults = array(
                        1 => array('title' => 'Mastery Coaching', 'desc' => '1-on-1 strategic sessions to align your actions with your highest goals.', 'icon' => 'fas fa-user-tie'),
                        2 => array('title' => 'System Implementation', 'desc' => 'We build your productivity and AI systems for you, from scratch.', 'icon' => 'fas fa-cogs'),
                        3 => array('title' => 'Corporate Training', 'desc' => 'Elite workshops for teams looking to maximize output and clarity.', 'icon' => 'fas fa-users'),
                    );
                    $title = $defaults[$i]['title'];
                    $desc = $defaults[$i]['desc'];
                    $icon = $defaults[$i]['icon'];
                }
			?>
			<div class="col-lg-4 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="card h-100 p-5 border-0 shadow-sm hover-lift rounded-4">
					<div class="icon-box bg-gold text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="<?php echo esc_attr($icon); ?> fa-2x"></i>
                    </div>
					<h3 class="h4 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small"><?php echo esc_html($desc); ?></p>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-navy btn-sm mt-3 fw-bold">Inquire Now</a>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
