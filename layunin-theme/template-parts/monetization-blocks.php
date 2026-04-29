<div class="cta-box newsletter-box p-4 bg-primary text-white rounded mb-4">
	<h3 class="h5 monetization-newsletter-title"><?php echo esc_html(get_theme_mod('monetization_newsletter_title', 'Join the Elite Network')); ?></h3>
	<p class="small monetization-newsletter-desc"><?php echo esc_html(get_theme_mod('monetization_newsletter_desc', 'Strategic insights on personal growth and scalable income.')); ?></p>
	<form class="cta-newsletter-form">
		<input type="email" placeholder="<?php echo esc_attr(get_theme_mod('monetization_newsletter_ph', 'Email')); ?>" class="form-control form-control-sm mb-2" required>
			<button type="submit" class="btn btn-gold btn-sm w-100 monetization-newsletter-btn"><?php echo esc_html(get_theme_mod('monetization_newsletter_btn', 'Subscribe')); ?></button>
	</form>
</div>

<div class="cta-box product-offer p-4 card border-0 bg-light rounded mb-4 shadow-sm">
	<h3 class="h5 text-navy monetization-product-title"><?php echo esc_html( get_theme_mod('product_item_1_title', 'The Ultimate Goal Planner') ); ?></h3>
    <?php
    $product_img = get_theme_mod('product_item_1_image', 'https://images.unsplash.com/photo-1506784919141-93584869786a?auto=format&fit=crop&q=80&w=400');
    ?>
	<img src="<?php echo esc_url($product_img); ?>" alt="Planner" class="img-fluid mb-2 rounded monetization-product-img">
	<p class="small monetization-product-desc"><?php echo esc_html(get_theme_mod('monetization_product_desc', 'The exact blueprint used to 10X our digital asset portfolio.')); ?></p>
    <?php
    $product_price = get_theme_mod('product_item_1_price', '₱999');
    $product_link = get_theme_mod('product_item_1_link', '#');
    ?>
	<a href="<?php echo esc_url($product_link); ?>" class="btn btn-outline-primary btn-sm w-100 monetization-product-btn"><?php echo esc_html(get_theme_mod('monetization_product_btn', 'Buy Now')); ?> - <span class="monetization-product-price"><?php echo esc_html($product_price); ?></span></a>
</div>

<div class="affiliate-banner mb-4">
	<?php
	$banner = get_theme_mod( 'affiliate_banner_url', 'https://images.unsplash.com/photo-1512428559083-a40ea9013f01?auto=format&fit=crop&q=80&w=800' );
	?>
	<a href="#"><img src="<?php echo esc_url($banner); ?>" alt="Partner Offer" class="img-fluid rounded affiliate-banner-img"></a>
</div>
