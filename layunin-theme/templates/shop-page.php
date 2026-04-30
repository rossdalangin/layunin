<?php
/**
 * Template Name: Shop Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi">
	<div class="container">
		<header class="entry-header text-center mb-phi animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block shop-badge"><?php echo esc_html(get_theme_mod('shop_badge', 'The Mastery Collection')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'shop_title', 'Shop Page' ) ); ?></h1>
			<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'shop_content', 'Invest in the precision-engineered digital assets that drive world-class execution.' ) ); ?></p>
		</header>

		<div class="row g-4">
			<?php for($i = 1; $i <= 6; $i++) :
				$title = get_theme_mod("shop_item_{$i}_title", 'Elite Framework ' . $i);
				$price = get_theme_mod("shop_item_{$i}_price", '&#8369;2,499');
				$image = get_theme_mod("shop_item_{$i}_image", 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=400');
				$link = get_theme_mod("shop_item_{$i}_link", "#");
			?>
			<div class="col-lg-4 col-md-6 animate-up product-item" style="animation-delay: <?php echo 0.05 * $i; ?>s;">
				<div class="product-card card h-100 border-0 shadow-sm overflow-hidden transition-all hover-lift">
					<div class="product-image position-relative">
						<img src="<?php echo esc_url($image); ?>" class="card-img-top" alt="<?php echo esc_attr($title); ?>">
						<div class="product-overlay position-absolute top-0 start-0 w-100 h-100 bg-navy bg-opacity-10 d-flex align-items-center justify-content-center opacity-0 transition-all hover-opacity-100">
							<a href="<?php echo esc_url($link); ?>" class="btn btn-gold px-4 shadow shop-view-btn"><?php echo esc_html(get_theme_mod('shop_view_btn', 'View Details')); ?></a>
						</div>
					</div>
					<div class="card-body p-4">
						<div class="d-flex justify-content-between align-items-center mb-phi-s">
							<span class="badge bg-light text-navy small shop-item-badge"><?php echo esc_html(get_theme_mod('shop_item_badge', 'Digital Resource')); ?></span>
							<span class="text-accent fw-bold item-price"><?php echo $price; ?></span>
						</div>
						<h3 class="h5 fw-bold text-navy mb-0 item-title"><?php echo esc_html($title); ?></h3>
					</div>
					<div class="card-footer bg-white border-0 p-4 pt-0">
						<a href="<?php echo esc_url($link); ?>" class="btn btn-navy btn-sm w-100 py-2 shop-btn-text"><?php echo esc_html(get_theme_mod('shop_btn_text', 'Add to Cart')); ?> <i class="fas fa-shopping-cart ms-2"></i></a>
					</div>
				</div>
			</div>
			<?php endfor; ?>
		</div>

		<div class="newsletter-cta mt-phi p-5 bg-light rounded-4 text-center animate-up">
			<h2 class="h4 fw-bold text-navy mb-phi-s shop-newsletter-title"><?php echo esc_html(get_theme_mod('shop_newsletter_title', 'Want Exclusive Discounts?')); ?></h2>
			<p class="text-muted mb-phi-l shop-newsletter-desc"><?php echo esc_html(get_theme_mod('shop_newsletter_desc', 'Join our community and get 20% off your first digital product purchase.')); ?></p>
			<form class="row g-2 justify-content-center" style="max-width: 500px; margin: 0 auto;">
				<div class="col-md-8">
					<input type="email" class="form-control bg-white border-0 py-3" placeholder="<?php echo esc_attr(get_theme_mod('shop_newsletter_ph', 'Enter your email')); ?>">
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-gold w-100 py-3 fw-bold shop-newsletter-btn"><?php echo esc_html(get_theme_mod('shop_newsletter_btn', 'Join Now')); ?></button>
				</div>
			</form>
		</div>
	</div>
</main>
<?php get_footer(); ?>
