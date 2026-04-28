<?php get_header(); ?>
<main id="primary" class="site-main py-6 bg-light">
	<div class="container">
		<header class="archive-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block">Explore Our</span>
			<h1 class="display-3 fw-black text-navy mb-3">
				<?php
				if ( is_category() ) :
					single_cat_title();
				elseif ( is_tag() ) :
					single_tag_title();
				elseif ( is_author() ) :
					echo 'Author: ' . get_the_author();
				else :
					echo 'Our Insights';
				endif;
				?>
			</h1>
			<div class="accent-line mx-auto mb-4" style="width: 80px; height: 4px; background: var(--gold);"></div>
		</header>

		<div class="row g-4">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				the_posts_navigation( array(
					'prev_text' => '<i class="fas fa-arrow-left me-2"></i> Older Posts',
					'next_text' => 'Newer Posts <i class="fas fa-arrow-right ms-2"></i>',
					'class' => 'posts-navigation d-flex justify-content-center gap-4 mt-5'
				) );

			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
