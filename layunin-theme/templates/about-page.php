<?php
/**
 * Template Name: About Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<header class="entry-header text-center mb-5 animate-up">
				<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Who We Are</span>
				<h1 class="entry-title display-4"><?php echo esc_html( get_theme_mod( 'about_title', 'Our Story' ) ); ?></h1>
				<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'about_content', 'Helping Filipinos transform their goals into action, income, and success.' ) ); ?></p>
			</header>
			<div class="entry-content animate-up" style="animation-delay: 0.2s;">
				<h2>What "Layunin" Means to Us</h2>
				<p>In Tagalog, "Layunin" means goal, purpose, or objective. We believe that living with a clear "Layunin" is the first step toward a fulfilling and successful life.</p>
				<h3>Our Core Values</h3>
				<div class="row mt-4">
					<?php
					$values = explode("\n", get_theme_mod('about_values', "Integrity\nInnovation\nCommunity\nAction"));
					foreach($values as $val) : if(trim($val)) : ?>
					<div class="col-md-6 mb-3">
						<div class="card p-4 shadow-sm border-0 bg-light">
							<h4 class="h6 mb-0 text-accent"><i class="fas fa-check-circle me-2"></i> <?php echo esc_html($val); ?></h4>
						</div>
					</div>
					<?php endif; endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
