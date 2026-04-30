<article id="post-<?php the_ID(); ?>" <?php post_class('animate-up'); ?>>
	<header class="entry-header mb-phi text-center">
		<div class="entry-meta text-accent text-uppercase fw-bold letter-spacing-1 mb-phi-s">
			<?php the_category(' &bull; '); ?>
		</div>
		<?php the_title( '<h1 class="entry-title display-2 fw-bold mb-phi-l">', '</h1>' ); ?>
		<div class="entry-meta text-muted mb-phi d-flex align-items-center justify-content-center gap-3">
			<span class="author-vcard"><i class="far fa-user me-1"></i> <?php echo esc_html(get_theme_mod('blog_by_text', 'By')); ?> <?php the_author(); ?></span>
			<span class="sep">|</span>
			<span class="posted-on"><i class="far fa-calendar-alt me-1"></i> <?php echo esc_html(get_theme_mod('blog_posted_on_text', 'Posted on')); ?> <?php the_date(); ?></span>
			<span class="sep">|</span>
			<span class="reading-time"><i class="far fa-clock me-1"></i> <?php echo layunin_reading_time(); ?> <?php echo esc_html(get_theme_mod('blog_min_read_text', 'min read')); ?></span>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail mb-phi rounded-4 overflow-hidden shadow-lg">
				<?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid w-100' ) ); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry-content px-lg-5">
		<?php
		the_content();
		wp_link_pages();
		?>
	</div>

	<footer class="entry-footer mt-phi pt-5 border-top">
		<?php if ( get_theme_mod( 'show_author_box', true ) ) : ?>
		<div class="author-box d-md-flex align-items-center p-5 bg-white shadow-sm rounded-4 mb-phi border">
			<div class="author-avatar me-md-5 mb-phi-l mb-md-0 text-center">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 120, '', '', array( 'class' => 'rounded-circle border border-4 border-light' ) ); ?>
			</div>
			<div class="author-info">
				<span class="text-accent small text-uppercase fw-bold mb-2 d-block author-box-title"><?php echo esc_html(get_theme_mod('author_box_title', 'The Strategist Behind The Words')); ?></span>
				<h3 class="author-name h4 fw-bold text-navy mb-phi-s"><?php the_author(); ?></h3>
				<p class="author-bio mb-phi-l text-muted"><?php the_author_meta( 'description' ); ?></p>
				<div class="author-socials d-flex gap-3">
					<?php if(get_the_author_meta('facebook')) : ?><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>" class="btn btn-navy btn-sm px-3"><i class="fab fa-facebook-f me-2"></i> Facebook</a><?php endif; ?>
					<?php if(get_the_author_meta('twitter')) : ?><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>" class="btn btn-navy btn-sm px-3"><i class="fab fa-twitter me-2"></i> Twitter</a><?php endif; ?>
					<?php if(get_the_author_meta('linkedin')) : ?><a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>" class="btn btn-navy btn-sm px-3"><i class="fab fa-linkedin-in me-2"></i> LinkedIn</a><?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="related-posts">
			<h3 class="h4 fw-bold text-navy mb-phi text-center related-posts-title"><?php echo esc_html(get_theme_mod('related_posts_title', 'Continue Your Mastery Journey')); ?></h3>
			<div class="row g-4">
				<?php
				$related = new WP_Query( array(
					'category__in'   => wp_get_post_categories( get_the_ID() ),
					'posts_per_page' => 3,
					'post__not_in'   => array( get_the_ID() ),
				) );
				if ( $related->have_posts() ) :
					while ( $related->have_posts() ) : $related->the_post();
						?>
						<div class="col-md-4">
							<div class="related-card card h-100 border-0 shadow-sm transition-all hover-lift overflow-hidden">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large', array( 'class' => 'card-img-top' ) ); ?></a>
								<?php endif; ?>
								<div class="card-body p-4">
									<h4 class="h6 fw-bold mb-0"><a href="<?php the_permalink(); ?>" class="text-navy text-decoration-none"><?php the_title(); ?></a></h4>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>

        <?php
        $nav_prev_label = get_theme_mod('nav_prev_label', 'Previous Insight');
        $nav_next_label = get_theme_mod('nav_next_label', 'Next Level Insight');
        the_post_navigation( array(
            'prev_text' => '<span class="text-muted small nav-prev-label">' . esc_html($nav_prev_label) . '</span><br><span class="h6 fw-bold">%title</span>',
            'next_text' => '<span class="text-muted small nav-next-label">' . esc_html($nav_next_label) . '</span><br><span class="h6 fw-bold">%title</span>',
            'class'     => 'post-navigation my-phi d-flex justify-content-between p-4 bg-light rounded-4'
        ) );
        ?>
	</footer>
</article>
