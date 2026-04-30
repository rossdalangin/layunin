<?php if ( get_theme_mod( 'show_home_testimonials', true ) ) : ?>
<section class="testimonials-section py-phi bg-white overflow-hidden">
	<div class="container">
		<div class="row align-items-center g-6">
			<div class="col-lg-5 animate-up">
				<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block testimonials-badge-text"><?php echo esc_html(get_theme_mod('testimonials_badge_text', 'Elite Validation')); ?></span>
				<h2 class="display-4 fw-black text-navy mb-phi-l testimonials-home-title"><?php echo esc_html(get_theme_mod('testimonials_home_title', 'Proof of Impact')); ?></h2>
				<p class="lead text-muted mb-phi testimonials-home-lead"><?php echo esc_html(get_theme_mod('testimonials_home_lead', 'Our framework has been battle-tested by thousands of Filipinos across the globe. Here is one of our most recent success stories.')); ?></p>
				<a href="<?php echo esc_url( get_theme_mod('testimonials_home_btn_link', home_url('/testimonials/')) ); ?>" class="btn btn-outline-navy btn-lg px-5 fw-bold border-2 testimonials-home-btn-text"><?php echo esc_html(get_theme_mod('testimonials_home_btn_text', 'See Wall of Impact')); ?></a>
			</div>
			<div class="col-lg-7 animate-up" style="animation-delay: 0.2s;">
				<?php
				$quote = get_theme_mod('testimonial_quote', 'The systems I learned through Layunin didn\'t just increase my income; they gave me my life back. I finally feel like I\'m living my true "Layunin".');
				$author = get_theme_mod('testimonial_author', 'Dr. Katrina Reyes');
				$role = get_theme_mod('testimonial_role', 'Global Entrepreneur');
				$image = get_theme_mod('testimonial_image', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=300');
				?>
				<div class="testimonial-card-main p-6 bg-light rounded-4 shadow-sm position-relative" style="border-radius: 40px !important;">
					<div class="quote-icon position-absolute top-0 start-0 m-5 opacity-10 z-index-0"><i class="fas fa-quote-left fa-6x text-gold"></i></div>
					<div class="position-relative z-index-1">
						<p class="fs-3 fw-bold text-navy mb-phi quote-text italic">"<?php echo esc_html($quote); ?>"</p>
						<div class="d-flex align-items-center gap-4">
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($author); ?>" class="rounded-circle shadow-sm author-img" style="width: 80px; height: 80px; object-fit: cover;">
							<div>
								<h4 class="h5 fw-bold text-navy mb-1 author-name"><?php echo esc_html($author); ?></h4>
								<span class="small text-muted author-role"><?php echo esc_html($role); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
