<aside id="secondary" class="widget-area">
	<div class="sidebar-box p-4 card mb-5 text-center">
		<h3 class="h6 text-uppercase fw-bold mb-4 sidebar-author-title"><?php echo esc_html(get_theme_mod('sidebar_author_title', 'About the Author')); ?></h3>
        <?php
        $author_img = get_theme_mod('sidebar_author_image', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=300');
        ?>
		<img src="<?php echo esc_url($author_img); ?>" alt="Author" class="rounded-circle mb-3 mx-auto sidebar-author-img" style="width: 100px; height: 100px; object-fit: cover;">
		<p class="small text-muted mb-3 sidebar-bio"><?php echo esc_html( get_theme_mod('sidebar_bio_text', 'Strategist, Mentor, and Founder of Layunin. Dedicated to architecting the next generation of Filipino high-achievers.') ); ?></p>
		<div class="author-socials d-flex justify-content-center gap-2">
			<?php if(get_theme_mod('author_facebook')) : ?><a href="<?php echo esc_url(get_theme_mod('author_facebook')); ?>" class="text-navy small"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
			<?php if(get_theme_mod('author_twitter')) : ?><a href="<?php echo esc_url(get_theme_mod('author_twitter')); ?>" class="text-navy small"><i class="fab fa-twitter"></i></a><?php endif; ?>
			<?php if(get_theme_mod('author_linkedin')) : ?><a href="<?php echo esc_url(get_theme_mod('author_linkedin')); ?>" class="text-navy small"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
		</div>
	</div>

	<?php if(get_theme_mod('show_sidebar_newsletter', true)) : ?>
	<div class="sidebar-box p-4 card mb-5 bg-navy text-white border-0">
		<h3 class="h6 text-uppercase fw-bold text-accent mb-3 sidebar-newsletter-title"><?php echo esc_html(get_theme_mod('sidebar_newsletter_title', 'Elite Growth Protocol')); ?></h3>
		<p class="small opacity-75 mb-4 sidebar-newsletter-desc"><?php echo esc_html(get_theme_mod('sidebar_newsletter_desc', 'Architect your life and reclaim your purpose in just 7 days.')); ?></p>
		<form class="sidebar-newsletter">
			<input type="email" class="form-control form-control-sm mb-3 bg-white text-navy" placeholder="<?php echo esc_attr(get_theme_mod('sidebar_newsletter_ph', 'Email Address')); ?>" required>
			<button class="btn btn-gold btn-sm w-100 sidebar-newsletter-btn" type="submit"><?php echo esc_html(get_theme_mod('sidebar_newsletter_btn', 'Download Free')); ?></button>
		</form>
	</div>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/monetization-blocks' ); ?>

	<div class="sidebar-widgets">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
