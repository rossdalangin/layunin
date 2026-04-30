<?php get_header(); ?>

<main id="primary" class="site-main py-phi bg-light">
	<div class="container">
		<header class="page-header text-center mb-phi animate-up">
			<h1 class="display-3 fw-black text-navy mb-phi-s search-results-title">
				<?php echo esc_html(get_theme_mod('search_results_title', 'Strategic Results for:')); ?>
                <span class="text-gold">"<?php echo get_search_query(); ?>"</span>
			</h1>
			<div class="accent-line mx-auto" style="width: 80px; height: 4px; background: var(--gold);"></div>
		</header>

		<div class="row g-4">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
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

<?php
get_footer();
