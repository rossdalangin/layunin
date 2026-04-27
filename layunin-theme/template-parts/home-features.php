<?php if ( get_theme_mod( 'show_home_features', true ) ) : ?>
<section class="features-section py-5 bg-light">
	<div class="container py-5 text-center">
		<h2 class="display-4 mb-5"><?php echo esc_html( get_theme_mod('features_title', 'Why Choose Layunin?') ); ?></h2>
		<div class="row">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("feature_{$i}_title");
				$desc = get_theme_mod("feature_{$i}_desc");
				if($title) :
			?>
			<div class="col-md-4 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.2; ?>s;">
				<div class="card p-5 h-100 shadow-sm border-0">
					<div class="card-icon mx-auto"><i class="fas fa-check-circle"></i></div>
					<h3 class="h4 fw-bold mb-3"><?php echo esc_html($title); ?></h3>
					<p class="text-muted small"><?php echo esc_html($desc); ?></p>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
