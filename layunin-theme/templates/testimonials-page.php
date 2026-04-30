<?php
/**
 * Template Name: Testimonials Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi bg-light">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block testimonials-badge"><?php echo esc_html(get_theme_mod('testimonials_badge', 'Proof of Impact')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'testimonials_title', 'Testimonials Page' ) ); ?></h1>
			<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'testimonials_content', 'Hear from the high-achievers who have architected their lives using the Layunin framework.' ) ); ?></p>
		</header>

		<div class="row g-4 mb-6">
			<?php
			$testimonials = new WP_Query( array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 12,
			) );

			if ( $testimonials->have_posts() ) :
				$count = 0;
				while ( $testimonials->have_posts() ) : $testimonials->the_post();
					$role = get_post_meta( get_the_ID(), '_testimonial_role', true );
					$count++;
					$delay = ($count % 3) * 0.1;
					?>
					<div class="col-lg-4 col-md-6 animate-up testimonial-card-item" style="animation-delay: <?php echo $delay; ?>s;">
						<div class="testimonial-card card h-100 border-0 shadow-sm p-5 rounded-4 transition-all hover-lift bg-white position-relative overflow-hidden">
                            <div class="quote-icon position-absolute top-0 start-0 m-4 opacity-05 z-index-0"><i class="fas fa-quote-left fa-4x text-gold"></i></div>
							<div class="position-relative z-index-1">
							<div class="rating mb-3 text-accent small">
								<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
							</div>
							<blockquote class="text-muted mb-4 fst-italic">"<?php echo get_the_content(); ?>"</blockquote>
							<div class="author-meta d-flex align-items-center">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="avatar me-3">
										<?php the_post_thumbnail( array(50, 50), array( 'class' => 'rounded-circle shadow-sm' ) ); ?>
									</div>
								<?php else : ?>
									<div class="avatar me-3 bg-navy rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
										<i class="fas fa-user text-white small"></i>
									</div>
								<?php endif; ?>
								<div>
									<h4 class="h6 fw-bold text-navy mb-0"><?php the_title(); ?></h4>
									<span class="small text-muted"><?php echo esc_html( $role ? $role : 'Member' ); ?></span>
								</div>
							</div>
                            </div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Fallback if no testimonials exist
				for($i=1; $i<=3; $i++) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="testimonial-card card h-100 border-0 shadow-sm p-4 rounded-4 bg-white">
							<blockquote class="text-muted mb-4"><?php echo esc_html(get_theme_mod('testimonials_fallback_quote', 'Layunin has completely changed my mindset toward goal setting. I finally have the tools to succeed.')); ?></blockquote>
							<h4 class="h6 fw-bold text-navy mb-0"><?php echo esc_html(get_theme_mod('testimonials_fallback_author', 'Maria Santos')); ?></h4>
						</div>
					</div>
				<?php endfor;
			endif;
			?>
		</div>

		<div class="cta-banner bg-gold p-5 rounded-4 text-center animate-up shadow-lg">
			<h2 class="h3 fw-bold text-white mb-3 testimonials-cta-title"><?php echo esc_html(get_theme_mod('testimonials_cta_title', 'Ready To Be Our Next Success Story?')); ?></h2>
			<p class="text-white-50 mb-4 testimonials-cta-desc"><?php echo esc_html(get_theme_mod('testimonials_cta_desc', 'Join thousands of Filipinos who have transformed their lives.')); ?></p>
			<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-navy btn-lg px-5 shadow testimonials-cta-btn"><?php echo esc_html(get_theme_mod('testimonials_cta_btn', 'Get Started Today')); ?></a>
		</div>
	</div>
</main>
<?php get_footer(); ?>
