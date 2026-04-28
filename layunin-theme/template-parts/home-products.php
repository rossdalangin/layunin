<section class="products-section py-6">
	<div class="container text-center">
		<h2 class="display-4 fw-bold text-navy mb-3"><?php echo esc_html( get_theme_mod( 'products_title', 'Premium Resources' ) ); ?></h2>
		<p class="section-desc lead text-muted mb-5"><?php echo esc_html( get_theme_mod( 'products_desc', 'Tools designed for the modern Filipino achiever.' ) ); ?></p>
		<div class="row mt-5">
			<?php for($i = 1; $i <= 3; $i++) :
				$title = get_theme_mod("product_item_{$i}_title");
				$price = get_theme_mod("product_item_{$i}_price");
				$image = get_theme_mod("product_item_{$i}_image");
				$link  = get_theme_mod("product_item_{$i}_link", "#");
				if($title) :
			?>
			<div class="col-lg-4 mb-4 animate-up" style="animation-delay: <?php echo ($i-1)*0.1; ?>s;">
                <div class="card h-100 border-0 shadow-sm hover-lift rounded-4 overflow-hidden">
                    <div class="product-image" style="height: 250px;">
                        <?php if($image) : ?>
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-100 h-100 object-fit-cover">
                        <?php else : ?>
                            <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="fas fa-box-open fa-3x text-muted opacity-25"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-navy mb-3"><?php echo esc_html($title); ?></h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price fw-bold text-gold fs-4"><?php echo esc_html($price); ?></span>
                            <a href="<?php echo esc_url($link); ?>" class="btn btn-navy btn-sm px-4">Get Started</a>
                        </div>
                    </div>
                </div>
			</div>
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
