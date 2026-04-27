<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-4 border-bottom pb-4' ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
	<div class="entry-summary text-muted">
		<?php the_excerpt(); ?>
	</div>
</article>
