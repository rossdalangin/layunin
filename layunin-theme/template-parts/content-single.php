<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-4">
		<?php the_title( '<h1 class="entry-title display-4">', '</h1>' ); ?>
		<div class="entry-meta text-muted mb-3">
			<span class="posted-on"><?php the_date(); ?></span> |
			<span class="reading-time"><?php echo layunin_reading_time(); ?> min read</span>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail mb-4 rounded overflow-hidden shadow-sm">
				<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid w-100' ) ); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages();
		?>
	</div>

	<footer class="entry-footer mt-5 pt-5 border-top">
		<div class="author-box d-flex align-items-center p-4 bg-light rounded mb-5">
			<div class="author-avatar me-4">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 90, '', '', array( 'class' => 'rounded-circle' ) ); ?>
			</div>
			<div class="author-info">
				<h3 class="author-name h5 mb-2">About <?php the_author(); ?></h3>
				<p class="author-bio mb-0 small"><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>

		<div class="related-posts">
			<h3 class="mb-4">You Might Also Like</h3>
			<div class="row">
				<?php
				$related = new WP_Query( array(
					'category__in'   => wp_get_post_categories( get_the_ID() ),
					'posts_per_page' => 3,
					'post__not_in'   => array( get_the_ID() ),
				) );
				if ( $related->have_posts() ) :
					while ( $related->have_posts() ) : $related->the_post();
						?>
						<div class="col-md-4 mb-3">
							<div class="related-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid rounded mb-2' ) ); ?></a>
								<?php endif; ?>
								<h4 class="h6"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</footer>
</article>
