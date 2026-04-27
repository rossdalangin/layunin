<section class="products-section">
	<div class="container text-center">
		<h2><?php echo esc_html( get_theme_mod( 'products_title', 'Premium Resources to Accelerate Your Success' ) ); ?></h2>
		<p class="section-desc">Tools designed for the modern Filipino achiever.</p>
		<div class="product-grid grid-layout mt-5">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("product_item_{$i}_title");
				$price = get_theme_mod("product_item_{$i}_price");
				$image = get_theme_mod("product_item_{$i}_image", 'https://images.unsplash.com/photo-1506784919141-93584869786a?auto=format&fit=crop&q=80&w=400');
				$link  = get_theme_mod("product_item_{$i}_link");
				if($title) :
			?>
			<div class="product-card card animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
				<div class="product-image mb-4">
					<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid rounded shadow-sm">
				</div>
				<h3><?php echo esc_html($title); ?></h3>
				<div class="product-meta d-flex justify-content-between align-items-center mt-3">
					<span class="price fw-bold text-accent fs-4"><?php echo esc_html($price); ?></span>
					<a href="<?php echo esc_url($link); ?>" class="btn btn-gold btn-sm px-4">Get Started</a>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
