<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 mb-4' ); ?>>
	<div class="card h-100 shadow-sm border-0 overflow-hidden">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" class="post-thumbnail">
				<?php the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) ); ?>
			</a>
		<?php endif; ?>
		<div class="card-body">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header>
			<div class="entry-excerpt text-muted small mb-3">
				<?php the_excerpt(); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a>
		</div>
	</div>
</article>
