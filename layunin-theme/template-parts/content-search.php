<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-phi-l border-bottom pb-4' ); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title h4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>
	<div class="entry-summary text-muted mb-phi-s">
		<?php the_excerpt(); ?>
	</div>
    <a href="<?php the_permalink(); ?>" class="btn btn-navy btn-sm"><?php echo esc_html(get_theme_mod('blog_search_btn_text', 'Read Strategy')); ?></a>
</article>
