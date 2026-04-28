<?php if ( get_theme_mod( 'show_home_features', true ) ) : ?>
<section class="features-section py-5 bg-light">
	<div class="container py-5 text-center">
		<h2 class="display-4 mb-5 features-title"><?php echo esc_html( get_theme_mod('features_title', 'Why Choose Layunin?') ); ?></h2>
		<div class="row">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("feature_{$i}_title", "Feature $i");
				$desc = get_theme_mod("feature_{$i}_desc", "Benefit description...");
			?>
			<div class="col-md-4 mb-4 animate-up feature-item-<?php echo $i; ?>" style="animation-delay: <?php echo ($i-1)*0.2; ?>s;">
				<div class="card p-5 h-100 shadow-sm border-0">
					<div class="card-icon mx-auto"><i class="fas fa-check-circle"></i></div>
					<h3 class="h4 fw-bold mb-3 item-title"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small item-desc"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
