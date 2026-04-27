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
				<h2 class="text-center mb-4">What "Layunin" Means to Us</h2>
				<p class="text-center mb-5">In Tagalog, "Layunin" means goal, purpose, or objective. We believe that living with a clear "Layunin" is the first step toward a fulfilling and successful life.</p>

				<div class="row g-4 mb-5">
					<?php
					$values = explode("\n", get_theme_mod('about_values', "Integrity\nInnovation\nCommunity\nAction"));
					foreach($values as $val) : if(trim($val)) : ?>
					<div class="col-md-6">
						<div class="card h-100 p-4 shadow-sm border-0 bg-light hover-lift">
							<h4 class="h5 mb-0 text-navy"><i class="fas fa-check-circle text-accent me-2"></i> <?php echo esc_html($val); ?></h4>
						</div>
					</div>
					<?php endif; endforeach; ?>
				</div>

				<h2 class="text-center mb-4">Meet the Minds Behind Layunin</h2>
				<div class="row g-4">
					<?php for($i = 1; $i <= 3; $i++) :
						$name = get_theme_mod("team_member_{$i}_name", 'Team Member ' . $i);
						$role = get_theme_mod("team_member_{$i}_role", 'Expert');
						$image = get_theme_mod("team_member_{$i}_image");
					?>
					<div class="col-md-4 text-center">
						<div class="team-card p-3 animate-up" style="animation-delay: <?php echo 0.1 * $i; ?>s;">
							<div class="mb-3">
								<?php if($image) : ?>
									<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" class="img-fluid rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
								<?php else : ?>
									<div class="bg-navy rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
										<i class="fas fa-user fa-3x text-white"></i>
									</div>
								<?php endif; ?>
							</div>
							<h4 class="h5 mb-1"><?php echo esc_html($name); ?></h4>
							<p class="text-accent small text-uppercase fw-bold"><?php echo esc_html($role); ?></p>
						</div>
					</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
