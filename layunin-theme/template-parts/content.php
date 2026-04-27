<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-lg-4 col-md-6 mb-4 animate-up' ); ?>>
	<div class="card h-100 shadow-sm border-0 overflow-hidden p-0">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail overflow-hidden">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'large', array( 'class' => 'card-img-top transition-all' ) ); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="card-body p-4">
			<div class="entry-meta small text-accent text-uppercase fw-bold mb-2">
				<?php the_category(', '); ?>
			</div>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title h5 mb-3"><a class="text-navy text-decoration-none" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>
			<div class="entry-excerpt text-muted small mb-4">
				<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
			</div>
			<div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
				<span class="small text-muted"><i class="far fa-calendar-alt me-1"></i> <?php echo get_the_date(); ?></span>
				<a href="<?php the_permalink(); ?>" class="text-navy fw-bold small text-decoration-none">Read More <i class="fas fa-arrow-right ms-1"></i></a>
			</div>
		</div>
	</div>
</article>
