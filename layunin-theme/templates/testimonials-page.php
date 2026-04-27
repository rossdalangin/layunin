<?php
/**
 * Template Name: Testimonials Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header text-center mb-5 animate-up">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Wall of Love</span>
		<h1 class="page-title display-4"><?php echo esc_html( get_theme_mod( 'testimonials_title', 'Testimonials' ) ); ?></h1>
		<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'testimonials_content', 'See how members of the Layunin community have transformed their lives.' ) ); ?></p>
	</header>
	<div class="row">
		<?php
		$testimonials = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1 ) );
		if ( $testimonials->have_posts() ) :
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				?>
				<div class="col-md-6 mb-4">
					<div class="testimonial-card p-4 border rounded shadow-sm">
						<blockquote class="blockquote">
							<?php the_content(); ?>
						</blockquote>
						<cite class="d-block mt-3 font-weight-bold"><?php the_title(); ?></cite>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			get_template_part( 'template-parts/home-testimonials' );
		endif; ?>
	</div>
</main>
<?php get_footer(); ?>
