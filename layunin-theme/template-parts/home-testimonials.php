<section class="testimonials-section bg-light py-6">
	<div class="container text-center">
		<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Testimonials</span>
		<h2 class="display-4 mb-5">What Our Community Says</h2>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<?php
				$quote = get_theme_mod('testimonial_quote', "Layunin changed how I approach my career. I finally have the clarity I've been seeking for years. The systems are practical and the mindset shift is real.");
				$author = get_theme_mod('testimonial_author', 'Maria Santos');
				$role = get_theme_mod('testimonial_role', 'Digital Freelancer');
				$image = get_theme_mod('testimonial_image', 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=100');
				?>
				<div class="testimonial-card card animate-up p-5 shadow-lg border-0" style="background: var(--white); border-radius: 40px;">
					<div class="quote-icon mb-4 fs-1 text-accent opacity-25"><i class="fas fa-quote-left"></i></div>
					<blockquote class="blockquote fs-4 mb-4" style="font-family: 'Playfair Display', serif; font-style: italic;">
						"<span class="quote-text"><?php echo esc_html($quote); ?></span>"
					</blockquote>
					<cite class="d-flex align-items-center justify-content-center gap-3 mt-4">
						<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($author); ?>" class="rounded-circle testimonial-img" style="width: 60px; height: 60px; object-fit: cover;">
						<div class="text-start">
							<div class="fw-bold text-navy author-name"><?php echo esc_html($author); ?></div>
							<div class="small text-muted author-role"><?php echo esc_html($role); ?></div>
						</div>
					</cite>
				</div>
			</div>
		</div>
	</div>
</section>
