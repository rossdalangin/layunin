<section class="products-section py-6 bg-white">
	<div class="container text-center mb-6 animate-up">
		<h2 class="display-4 fw-bold text-navy mb-3"><?php echo esc_html( get_theme_mod( 'products_title', 'Elite Assets & Accelerators' ) ); ?></h2>
		<p class="section-desc lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'products_desc', 'Precision-engineered tools to compress your learning curve and amplify your results.' ) ); ?></p>
	</div>

	<div class="container">
		<div class="row g-4">
			<?php
            $prods = array(
                1 => array('title' => 'The Master Planner', 'price' => '₱1,499'),
                2 => array('title' => 'AI Prompt Vault', 'price' => '₱2,999'),
                3 => array('title' => 'The Creator System', 'price' => '₱4,999')
            );
			for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("product_item_{$i}_title", $prods[$i]['title']);
				$price = get_theme_mod("product_item_{$i}_price", $prods[$i]['price']);
				$image = get_theme_mod("product_item_{$i}_image", 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=400');
				$link  = get_theme_mod("product_item_{$i}_link", "#");
				if($title) :
			?>
			<div class="col-lg-4 col-md-6 animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<div class="product-card card h-100 border-0 shadow-sm transition-all hover-lift overflow-hidden" style="border-radius: 30px !important;">
					<div class="product-img-wrapper position-relative overflow-hidden" style="height: 250px;">
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-100 h-100 object-fit-cover">
						<div class="price-tag position-absolute top-0 end-0 bg-gold text-white px-4 py-2 m-3 rounded-pill fw-bold shadow-sm"><?php echo esc_html($price); ?></div>
					</div>
					<div class="card-body p-5">
						<h3 class="h5 fw-bold text-navy mb-4"><?php echo esc_html($title); ?></h3>
						<a href="<?php echo esc_url($link); ?>" class="btn btn-outline-navy w-100 py-3 fw-bold">View Asset</a>
					</div>
				</div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
