<?php get_header(); ?>
<div class="reading-progress-bar"></div>
<?php get_template_part( 'template-parts/social-share' ); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-single', get_post_type() );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				get_template_part( 'template-parts/monetization-blocks' );
			endwhile;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
