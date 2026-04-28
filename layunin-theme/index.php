<?php get_header(); ?>

<main id="primary" class="site-main container">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;

        $older_label = get_theme_mod('archive_older_label', 'Older Posts');
        $newer_label = get_theme_mod('archive_newer_label', 'Newer Posts');
		the_posts_navigation( array(
            'prev_text' => '<span class="archive-older-label">' . esc_html($older_label) . '</span>',
            'next_text' => '<span class="archive-newer-label">' . esc_html($newer_label) . '</span>',
        ) );
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</main>

<?php
get_sidebar();
get_footer();
