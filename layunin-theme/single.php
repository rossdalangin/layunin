<?php get_header(); ?>
<div class="reading-progress-bar"></div>
<?php get_template_part( 'template-parts/social-share' ); ?>
<?php layunin_breadcrumbs(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<?php if(get_theme_mod('banner_above_content')) : ?>
				<div class="ad-banner-above mb-5">
					<img src="<?php echo esc_url(get_theme_mod('banner_above_content')); ?>" class="img-fluid rounded-4 shadow-sm w-100" alt="Advertisement">
				</div>
			<?php endif; ?>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-single', get_post_type() );

				// Post Navigation
				the_post_navigation( array(
					'prev_text' => '<span class="text-muted small">Previous Post</span><br><span class="h6 fw-bold">%title</span>',
					'next_text' => '<span class="text-muted small">Next Post</span><br><span class="h6 fw-bold">%title</span>',
					'class'     => 'post-navigation my-5 d-flex justify-content-between p-4 bg-light rounded-4'
				) );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				if(get_theme_mod('banner_below_content')) : ?>
					<div class="ad-banner-below mt-5 mb-5">
						<img src="<?php echo esc_url(get_theme_mod('banner_below_content')); ?>" class="img-fluid rounded-4 shadow-sm w-100" alt="Advertisement">
					</div>
				<?php endif;

				get_template_part( 'template-parts/monetization-blocks' );
			endwhile;
			?>
		</div>
	</div>
</main>
<?php get_footer(); ?>
