<div class="cta-box newsletter-box mb-phi-l">
	<h3 class="h5 monetization-newsletter-title text-white mb-phi-s fw-bold"><?php echo esc_html(get_theme_mod('monetization_newsletter_title', 'Join the Elite Network')); ?></h3>
	<p class="small monetization-newsletter-desc opacity-75 mb-phi-l"><?php echo esc_html(get_theme_mod('monetization_newsletter_desc', 'Strategic insights on personal growth and scalable income.')); ?></p>
	<form class="cta-newsletter-form">
		<input type="email" placeholder="<?php echo esc_attr(get_theme_mod('monetization_newsletter_ph', 'Email Address')); ?>" class="form-control form-control-sm mb-phi-s bg-white border-0 py-2" required>
		<button type="submit" class="btn btn-gold btn-sm w-100 monetization-newsletter-btn py-2 fw-black"><?php echo esc_html(get_theme_mod('monetization_newsletter_btn', 'Subscribe')); ?></button>
	</form>
</div>

<div class="cta-box product-offer mb-phi-l shadow-premium">
	<h3 class="h5 text-navy monetization-product-title fw-bold mb-phi-s"><?php echo esc_html( get_theme_mod('product_item_1_title', 'The Ultimate Goal Planner') ); ?></h3>
    <?php
    $product_img = get_theme_mod('product_item_1_image', 'https://images.unsplash.com/photo-1506784919141-93584869786a?auto=format&fit=crop&q=80&w=400');
    ?>
	<img src="<?php echo esc_url($product_img); ?>" alt="Planner" class="img-fluid mb-phi-s rounded-3 shadow-sm monetization-product-img">
	<p class="small monetization-product-desc text-muted mb-phi-l"><?php echo esc_html(get_theme_mod('monetization_product_desc', 'The exact blueprint used to 10X our digital asset portfolio.')); ?></p>
    <?php
    $product_price = get_theme_mod('product_item_1_price', '&#8369;999');
    $product_link = get_theme_mod('product_item_1_link', '#');
    ?>
	<a href="<?php echo esc_url($product_link); ?>" class="btn btn-navy btn-sm w-100 monetization-product-btn py-2 fw-bold"><?php echo esc_html(get_theme_mod('monetization_product_btn', 'Buy Now')); ?> - <span class="monetization-product-price"><?php echo $product_price; ?></span></a>
</div>

<div class="affiliate-banner mb-phi-l">
	<?php
	$banner = get_theme_mod( 'affiliate_banner_url', 'https://images.unsplash.com/photo-1512428559083-a40ea9013f01?auto=format&fit=crop&q=80&w=800' );
	$link = get_theme_mod( 'affiliate_banner_link', '#' );
    $alt = get_theme_mod( 'affiliate_banner_alt', 'Partner Offer' );
	?>
	<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($banner); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid rounded affiliate-banner-img"></a>
</div>
