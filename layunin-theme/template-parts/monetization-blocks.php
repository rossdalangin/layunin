<div class="cta-box newsletter-box p-4 bg-primary text-white rounded mb-4">
	<h3 class="h5">Join the Layunin Community</h3>
	<p class="small">Get our weekly tips on personal growth and income delivered to your inbox.</p>
	<form class="cta-newsletter-form">
		<input type="email" placeholder="Email" class="form-control form-control-sm mb-2" required>
		<button type="submit" class="btn btn-gold btn-sm w-100">Subscribe</button>
	</form>
</div>

<div class="cta-box product-offer p-4 bg-light border rounded mb-4 shadow-sm border-0">
	<h3 class="h5 text-navy"><?php echo esc_html( get_theme_mod('product_item_1_title', 'The Ultimate Goal Planner') ); ?></h3>
	<img src="https://images.unsplash.com/photo-1506784919141-93584869786a?auto=format&fit=crop&q=80&w=400" alt="Planner" class="img-fluid mb-2 rounded">
	<p class="small">Take control of your life with our best-selling digital planner.</p>
	<a href="#" class="btn btn-outline-primary btn-sm w-100">Buy Now - ₱999</a>
</div>

<div class="affiliate-banner mb-4">
	<?php
	$banner = get_theme_mod( 'affiliate_banner_url', 'https://images.unsplash.com/photo-1512428559083-a40ea9013f01?auto=format&fit=crop&q=80&w=800' );
	?>
	<a href="#"><img src="<?php echo esc_url($banner); ?>" alt="Partner Offer" class="img-fluid rounded"></a>
</div>
