<?php get_header(); ?>
<main id="primary" class="site-main container py-5">
	<header class="page-header mb-5 border-bottom pb-4">
        <span class="text-accent text-uppercase fw-bold letter-spacing-1 mb-2 d-block archive-title-prefix"><?php echo esc_html(get_theme_mod('archive_title_prefix', 'Explore Our')); ?></span>
		<h1 class="page-title"><?php single_cat_title(); ?></h1>
		<?php the_archive_description( '<div class="category-description text-muted">', '</div>' ); ?>
	</header>
	<div class="row">
		<div class="col-lg-8">
			<div class="blog-grid row">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</div>
		<div class="col-lg-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
