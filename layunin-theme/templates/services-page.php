<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>
<main id="primary" class="site-main py-6">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Expert Guidance</span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'services_title', 'Our Solutions' ) ); ?></h1>
			<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'services_content', 'Tailored systems and strategies to help you bridge the gap between goals and reality.' ) ); ?></p>
		</header>

		<div class="row g-4 justify-content-center mb-6">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("page_service_{$i}_title", 'Service Tier ' . $i);
				$desc = get_theme_mod("page_service_{$i}_desc", 'High-impact solution for your goals.');
				$price = get_theme_mod("page_service_{$i}_price", '₱' . ($i * 5000));
				$features = get_theme_mod("page_service_{$i}_features", "Feature A\nFeature B\nFeature C");
				$featured = ($i == 2) ? 'featured' : '';
			?>
			<div class="col-lg-4 col-md-6 animate-up" style="animation-delay: <?php echo 0.1 * $i; ?>s;">
				<div class="pricing-card card h-100 p-5 border-0 shadow-sm transition-all hover-lift <?php echo $featured ? 'border-accent border-2 shadow-lg scale-105 z-index-1' : ''; ?>">
					<?php if($featured) : ?>
						<span class="badge bg-gold position-absolute top-0 end-0 m-4">Most Popular</span>
					<?php endif; ?>
					<div class="text-center mb-4">
						<h3 class="h4 fw-bold text-navy"><?php echo esc_html($title); ?></h3>
						<div class="price display-5 fw-bold text-accent my-3"><?php echo esc_html($price); ?></div>
						<p class="text-muted small"><?php echo esc_html($desc); ?></p>
					</div>
					<hr class="my-4">
					<ul class="list-unstyled mb-5">
						<?php
						$feature_list = explode("\n", $features);
						foreach($feature_list as $f) : if(trim($f)) : ?>
							<li class="mb-3 d-flex align-items-center">
								<i class="fas fa-check-circle text-accent me-3"></i>
								<span class="text-navy small"><?php echo esc_html(trim($f)); ?></span>
							</li>
						<?php endif; endforeach; ?>
					</ul>
					<a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn <?php echo $featured ? 'btn-gold' : 'btn-outline-primary'; ?> w-100 py-3 fw-bold mt-auto">Choose This Plan</a>
				</div>
			</div>
			<?php endfor; ?>
		</div>

		<div class="cta-section bg-navy p-5 rounded-4 text-center text-white animate-up">
			<h2 class="h3 mb-4">Need a Custom Solution?</h2>
			<p class="text-white-50 mb-5 mx-auto" style="max-width: 600px;">We specialize in building bespoke systems for businesses and high-net-worth individuals. Let's discuss your unique requirements.</p>
			<a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-gold btn-lg px-5">Book a Consultation</a>
		</div>
	</div>
</main>
<?php get_footer(); ?>
