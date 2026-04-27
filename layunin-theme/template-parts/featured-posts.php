<section class="featured-posts-section bg-light py-5">
	<div class="container">
		<h2 class="text-center mb-5">Editor's Picks</h2>
		<div class="row">
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
				<div class="col-md-4 mb-4">
					<div class="card h-100 border-0 shadow-sm">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?></a>
						<?php endif; ?>
						<div class="card-body">
							<h3 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="small text-muted"><?php echo get_the_date(); ?></p>
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
