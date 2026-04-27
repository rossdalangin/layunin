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
		<div class="blog-grid row">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<?php the_posts_navigation(); ?>
			</div>
		</div>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
