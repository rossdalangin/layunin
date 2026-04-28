<?php get_header(); ?>
<main id="primary" class="site-main container py-5">
	<?php if ( have_posts() ) : ?>
		<header class="page-header mb-5 text-center animate-up">
			<h1 class="page-title display-4 search-results-title">
				<?php echo esc_html( get_theme_mod( 'search_results_title', 'Search Results for:' ) ); ?> <?php echo get_search_query(); ?>
			</h1>
		</header>
		<div class="search-results-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'search' );
			endwhile;
			the_posts_navigation();
			?>
		</div>
	<?php else : ?>
		<section class="no-results not-found text-center py-5">
			<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'layunin' ); ?></h2>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'layunin' ); ?></p>
			<?php get_search_form(); ?>
		</section>
	<?php endif; ?>
</main>
<?php
get_sidebar();
get_footer();
