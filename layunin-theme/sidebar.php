<aside id="secondary" class="widget-area">
	<div class="sidebar-box p-4 card mb-5 text-center">
		<h3 class="h6 text-uppercase fw-bold mb-4">About the Author</h3>
		<img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=200" alt="Author" class="rounded-circle mb-3 mx-auto" style="width: 100px; height: 100px; object-fit: cover;">
		<p class="small text-muted mb-0"><?php echo esc_html( get_theme_mod('sidebar_bio_text', 'Dedicated to helping Filipinos achieve their greatest Layunin.') ); ?></p>
	</div>

	<?php get_template_part( 'template-parts/monetization-blocks' ); ?>

	<div class="sidebar-widgets">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
