<?php
/**
 * Template Name: Free Resources Library
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5">
		<h1 class="page-title"><?php echo esc_html( get_theme_mod( 'free_resources_title', 'Free Resources' ) ); ?></h1>
		<p class="lead"><?php echo esc_html( get_theme_mod( 'free_resources_description', 'Download our premium guides, templates, and tools at no cost.' ) ); ?></p>
	</header>
	<div class="resources-grid row">
		<?php
		$resources = new WP_Query( array( 'post_type' => 'resource', 'posts_per_page' => -1 ) );
		if ( $resources->have_posts() ) :
			while ( $resources->have_posts() ) : $resources->the_post();
				?>
				<div class="col-md-4 mb-4">
					<div class="card h-100 shadow-sm border-0">
						<div class="card-body">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Download</a>
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
