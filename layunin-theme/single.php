<?php get_header(); ?>
<div class="reading-progress-bar"></div>
<?php get_template_part( 'template-parts/social-share' ); ?>
<?php layunin_breadcrumbs(); ?>
<main id="primary" class="site-main container py-phi">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<?php if(get_theme_mod('banner_above_content')) : ?>
				<div class="ad-banner-above mb-phi">
					<img src="<?php echo esc_url(get_theme_mod('banner_above_content')); ?>" class="img-fluid rounded-4 shadow-sm w-100" alt="Advertisement">
				</div>
			<?php endif; ?>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-single', get_post_type() );

				// Post Navigation
                $nav_prev = get_theme_mod('nav_prev_label', 'Previous Insight');
                $nav_next = get_theme_mod('nav_next_label', 'Next Level Insight');
				the_post_navigation( array(
					'prev_text' => '<span class="text-muted small">' . esc_html($nav_prev) . '</span><br><span class="h6 fw-bold">%title</span>',
					'next_text' => '<span class="text-muted small">' . esc_html($nav_next) . '</span><br><span class="h6 fw-bold">%title</span>',
					'class'     => 'post-navigation my-phi d-flex justify-content-between p-4 bg-light rounded-4'
				) );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				if(get_theme_mod('banner_below_content')) : ?>
					<div class="ad-banner-below mt-phi mb-phi">
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
