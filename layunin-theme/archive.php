<?php get_header(); ?>
<?php layunin_breadcrumbs(); ?>
<main id="primary" class="site-main container py-5">
	<?php if ( have_posts() ) : ?>
		<header class="page-header mb-5">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description text-muted">', '</div>' );
			?>
		</header>
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-grid row">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					?>
				</div>
				<?php the_posts_navigation(); ?>
				<?php get_template_part( 'template-parts/monetization-blocks' ); ?>
			</div>
			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
