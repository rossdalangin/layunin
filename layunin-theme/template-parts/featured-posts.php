<?php if ( get_theme_mod( 'show_home_featured_posts', true ) ) : ?>
<section class="featured-posts-section bg-light py-phi">
	<div class="container">
        <div class="text-center mb-phi animate-up">
		    <h2 class="display-4 fw-black text-navy mb-phi-s featured-posts-title"><?php echo esc_html(get_theme_mod('featured_posts_title', "Strategic Insights & Case Studies")); ?></h2>
            <div class="accent-line mx-auto" style="width: 80px; height: 4px; background: var(--gold);"></div>
        </div>

		<div class="row g-4">
			<?php
			$featured = new WP_Query( array(
				'posts_per_page' => 3,
				'meta_key'       => '_is_featured',
				'meta_value'     => 'yes'
			) );
			if ( ! $featured->have_posts() ) {
				$featured = new WP_Query( array( 'posts_per_page' => 3 ) );
			}
			while ( $featured->have_posts() ) : $featured->the_post();
				?>
				<div class="col-md-4 mb-phi-l animate-up">
					<div class="card h-100 border-0 shadow-sm transition-all hover-lift overflow-hidden" style="border-radius: 20px !important;">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="d-block overflow-hidden">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'card-img-top transition-all' ) ); ?>
                            </a>
						<?php endif; ?>
						<div class="card-body p-4">
                            <div class="mb-2"><?php the_category(', '); ?></div>
							<h3 class="h5 fw-bold mb-phi-s"><a href="<?php the_permalink(); ?>" class="text-navy text-decoration-none"><?php the_title(); ?></a></h3>
							<p class="small text-muted mb-0"><i class="far fa-calendar-alt me-2"></i><?php echo get_the_date(); ?></p>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif; ?>
