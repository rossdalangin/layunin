<?php
/**
 * Template Name: About Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<header class="entry-header text-center mb-5">
				<h1 class="entry-title"><?php echo esc_html( get_theme_mod( 'about_title', 'Our Story and Mission' ) ); ?></h1>
				<p class="lead text-muted"><?php echo esc_html( get_theme_mod( 'about_description', 'Helping Filipinos transform their goals into action, income, and success.' ) ); ?></p>
			</header>
			<div class="entry-content">
				<p>Layunin was founded on a simple yet powerful idea: that every Filipino has the potential to achieve greatness if given the right tools, guidance, and mindset.</p>
				<h2>What "Layunin" Means to Us</h2>
				<p>In Tagalog, "Layunin" means goal, purpose, or objective. We believe that living with a clear "Layunin" is the first step toward a fulfilling and successful life.</p>
				<h3>Our Core Values</h3>
				<ul>
					<li><strong>Integrity:</strong> We provide honest and practical guidance.</li>
					<li><strong>Innovation:</strong> We leverage modern tools like AI to accelerate growth.</li>
					<li><strong>Community:</strong> We grow together as a community of achievers.</li>
					<li><strong>Action:</strong> We value results over just dreams.</li>
				</ul>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
