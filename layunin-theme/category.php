<?php get_header(); ?>
<main id="primary" class="site-main py-phi bg-light">
	<div class="container">
		<header class="archive-header text-center mb-phi animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block archive-title-prefix"><?php echo esc_html(get_theme_mod('archive_title_prefix', 'Mastering:')); ?></span>
			<h1 class="display-3 fw-black text-navy mb-phi-s">
				<?php single_cat_title(); ?>
			</h1>
            <?php the_archive_description( '<div class="category-description text-muted lead mb-phi-l">', '</div>' ); ?>
			<div class="accent-line mx-auto mb-phi-l" style="width: 80px; height: 4px; background: var(--gold);"></div>
		</header>

		<div class="row g-4">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

                $older_label = get_theme_mod('archive_older_label', 'Previous Strategies');
                $newer_label = get_theme_mod('archive_newer_label', 'Recent Strategics');
				the_posts_navigation( array(
					'prev_text' => '<i class="fas fa-arrow-left me-2"></i> <span class="archive-older-label">' . esc_html($older_label) . '</span>',
					'next_text' => '<span class="archive-newer-label">' . esc_html($newer_label) . '</span> <i class="fas fa-arrow-right ms-2"></i>',
					'class' => 'posts-navigation d-flex justify-content-center gap-4 mt-phi'
				) );

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
