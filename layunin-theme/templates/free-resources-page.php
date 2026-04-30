<?php
/**
 * Template Name: Free Resources Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi">
	<div class="container">
		<header class="entry-header text-center mb-phi animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block free-resources-badge"><?php echo esc_html(get_theme_mod('free_resources_badge', 'The Knowledge Vault')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'free_resources_title', 'Free Resources Page' ) ); ?></h1>
			<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'free_resources_content', 'Start your journey with our complimentary high-output guides and frameworks.' ) ); ?></p>
		</header>

		<div class="row g-4 mb-phi">
			<?php for($i = 1; $i <= 4; $i++) :
				$title = get_theme_mod("resource_{$i}_title", 'Mastery Guide ' . $i);
				$type = get_theme_mod("resource_{$i}_type", 'Elite Protocol');
				$link = get_theme_mod("resource_{$i}_link", '#');
				$icon = get_theme_mod("resource_{$i}_icon", 'fas fa-shield-halved');
			?>
			<div class="col-lg-3 col-md-6 animate-up resource-item" style="animation-delay: <?php echo 0.1 * $i; ?>s;">
				<div class="resource-card card h-100 p-4 border-0 shadow-sm text-center transition-all hover-lift">
					<div class="icon-box bg-light text-accent rounded-circle mx-auto mb-phi-l d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
						<i class="<?php echo esc_attr($icon); ?> fa-2x"></i>
					</div>
					<span class="badge bg-navy-subtle text-navy mb-phi-s small item-type"><?php echo esc_html($type); ?></span>
					<h3 class="h5 fw-bold text-navy mb-phi-l item-title"><?php echo esc_html($title); ?></h3>
					<a href="<?php echo esc_url($link); ?>" class="btn btn-outline-navy btn-sm w-100 py-2 mt-auto fw-bold resources-btn-text"><?php echo esc_html(get_theme_mod('resources_btn_text', 'Download Free')); ?></a>
				</div>
			</div>
			<?php endfor; ?>
		</div>

		<div class="entry-content animate-up bg-light p-5 rounded-4 shadow-sm">
			<div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h3 fw-bold text-navy mb-phi-s resources-cta-title"><?php echo esc_html(get_theme_mod('resources_cta_title', 'Looking for more?')); ?></h2>
                    <p class="text-muted mb-0 resources-cta-desc"><?php echo esc_html(get_theme_mod('resources_cta_desc', 'Our Success Library is updated monthly with new tools for the community. Subscribe to be the first to know when we release new high-value resources.')); ?></p>
                </div>
                <div class="col-lg-4 text-lg-end mt-phi-l mt-lg-0">
                    <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-gold btn-lg resources-cta-btn"><?php echo esc_html(get_theme_mod('resources_cta_btn', 'Join the VIP List')); ?></a>
                </div>
            </div>
		</div>

        <div class="mt-phi">
            <?php
            // Display any editor content below the grid
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
	</div>
</main>
<?php get_footer(); ?>
