<?php if ( get_theme_mod( 'show_home_features', true ) ) : ?>
<section class="features-section py-6 bg-white">
	<div class="container">
        <div class="text-center mb-6 animate-up">
		    <h2 class="display-4 fw-black text-navy mb-3 features-title"><?php echo esc_html( get_theme_mod('features_title', 'Why High-Achievers Choose Us') ); ?></h2>
            <div class="accent-line mx-auto" style="width: 80px; height: 4px; background: var(--gold);"></div>
        </div>

		<div class="row g-5">
            <?php
            $features = array(
                1 => array('title' => 'Localized Expertise', 'desc' => 'Frameworks built specifically for the Philippine professional landscape.'),
                2 => array('title' => 'Future-Ready Systems', 'desc' => 'Cutting-edge AI and productivity tools integrated for immediate use.'),
                3 => array('title' => 'Community of Mastery', 'desc' => 'Direct access to a network of like-minded Filipino entrepreneurs.')
            );
            for($i = 1; $i <= 3; $i++) : ?>
			<div class="col-lg-4 animate-up feature-item-<?php echo $i; ?>" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<div class="d-flex align-items-start gap-4">
					<div class="feature-icon bg-light text-gold p-4 rounded-4 shadow-sm">
						<i class="fas <?php echo esc_attr(get_theme_mod("feature_{$i}_icon", ($i == 1) ? 'fa-map-marker-alt' : (($i == 2) ? 'fa-microchip' : 'fa-users'))); ?> fa-2x"></i>
					</div>
					<div>
						<h3 class="h5 fw-bold mb-2 item-title"><?php echo esc_html( get_theme_mod("feature_{$i}_title", $features[$i]['title']) ); ?></h3>
						<p class="text-muted small item-desc"><?php echo esc_html( get_theme_mod("feature_{$i}_desc", $features[$i]['desc']) ); ?></p>
					</div>
				</div>
			</div>
            <?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
