<?php
/**
 * Template Name: Free Resources Library
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5 animate-up">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Knowledge Hub</span>
		<h1 class="page-title display-4"><?php echo esc_html( get_theme_mod( 'free_resources_title', 'Free Resources' ) ); ?></h1>
		<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'free_resources_content', 'Download our premium guides, templates, and tools at no cost.' ) ); ?></p>
	</header>
	<div class="resources-grid row mt-5">
		<?php
		$resources = new WP_Query( array( 'post_type' => 'resource', 'posts_per_page' => -1 ) );
		if ( $resources->have_posts() ) :
			$i = 0;
			while ( $resources->have_posts() ) : $resources->the_post();
				?>
				<div class="col-lg-4 col-md-6 mb-4 animate-up" style="animation-delay: <?php echo ($i++ % 3) * 0.1; ?>s;">
					<div class="card h-100 shadow-sm border-0 p-0 overflow-hidden">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="resource-thumb">
								<?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
							</div>
						<?php endif; ?>
						<div class="card-body p-4">
							<span class="badge bg-light text-accent mb-3 px-3 py-2 rounded-pill">Free Download</span>
							<h3 class="h4 fw-bold mb-3"><?php the_title(); ?></h3>
							<div class="text-muted small mb-4"><?php the_excerpt(); ?></div>
							<a href="<?php the_permalink(); ?>" class="btn btn-gold w-100">Access Resource</a>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<div class="col-12 text-center">
				<p>Stay tuned! We are adding new resources soon.</p>
			</div>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
