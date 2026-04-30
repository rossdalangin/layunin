<?php
/**
 * The template for displaying all pages (v9.8 Masterpiece)
 */
get_header(); ?>
<main id="primary" class="site-main py-phi">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header mb-phi-l text-center">
					<?php the_title( '<h1 class="entry-title display-3 fw-black text-navy">', '</h1>' ); ?>
				</header>
				<div class="entry-content fs-5 lh-lg mx-auto" style="max-width: 800px;">
					<?php
					the_content();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'layunin' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>
		<?php
		endwhile;
		?>
	</div>
</main>
<?php get_footer(); ?>
