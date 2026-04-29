<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>
<main id="primary" class="site-main py-6">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block contact-badge"><?php echo esc_html(get_theme_mod('contact_badge', "Initiate Protocol")); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'contact_title', 'Contact Page' ) ); ?></h1>
			<p class="lead text-muted mx-auto" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'contact_content', 'Ready to architect your high-impact reality? Our team is standing by to assist with your growth journey.' ) ); ?></p>
		</header>

		<div class="row g-5">
			<div class="col-lg-4 animate-up" style="animation-delay: 0.1s;">
				<div class="contact-info-wrapper pe-lg-4">
					<h2 class="h4 fw-bold text-navy mb-4">Contact Information</h2>

					<div class="contact-item d-flex mb-4">
						<div class="icon-box bg-gold text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; flex-shrink: 0;">
							<i class="fas fa-envelope"></i>
						</div>
						<div>
							<h3 class="h6 fw-bold mb-1">Email Us</h3>
							<p class="text-muted small mb-0 contact-email"><?php echo esc_html(get_theme_mod('contact_email', 'elite@layunin.com')); ?></p>
						</div>
					</div>

					<div class="contact-item d-flex mb-4">
						<div class="icon-box bg-gold text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; flex-shrink: 0;">
							<i class="fas fa-phone"></i>
						</div>
						<div>
							<h3 class="h6 fw-bold mb-1">Call Us</h3>
							<p class="text-muted small mb-0 contact-phone"><?php echo esc_html(get_theme_mod('contact_phone', '+63 917 123 4567')); ?></p>
						</div>
					</div>

					<div class="contact-item d-flex mb-4">
						<div class="icon-box bg-gold text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 50px; height: 50px; flex-shrink: 0;">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div>
							<h3 class="h6 fw-bold mb-1">Visit Us</h3>
							<p class="text-muted small mb-0 contact-address"><?php echo esc_html(get_theme_mod('contact_address', 'BGC, Taguig, Philippines')); ?></p>
						</div>
					</div>

					<div class="social-box mt-5 p-4 bg-light rounded-4">
						<h3 class="h6 fw-bold mb-3">Follow Our Journey</h3>
						<div class="d-flex gap-3">
							<?php
							$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
							foreach ( $socials as $social ) :
								$link = get_theme_mod( "social_{$social}", '#' );
								if ( $link ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" class="btn btn-navy btn-sm rounded-circle shadow-sm" style="width: 35px; height: 35px; padding: 0; line-height: 35px;"><i class="fab fa-<?php echo $social; ?>"></i></a>
								<?php endif;
							endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-8 animate-up" style="animation-delay: 0.2s;">
				<div class="contact-form-card card border-0 shadow-lg p-5 rounded-4">
					<h2 class="h4 fw-bold text-navy mb-4">Send a Message</h2>
					<form class="row g-4">
						<div class="col-md-6">
							<label class="form-label small fw-bold">Full Name</label>
							<input type="text" class="form-control bg-light border-0" placeholder="John Doe">
						</div>
						<div class="col-md-6">
							<label class="form-label small fw-bold">Email Address</label>
							<input type="email" class="form-control bg-light border-0" placeholder="john@example.com">
						</div>
						<div class="col-12">
							<label class="form-label small fw-bold">Subject</label>
							<input type="text" class="form-control bg-light border-0" placeholder="Coaching Inquiry">
						</div>
						<div class="col-12">
							<label class="form-label small fw-bold">Your Message</label>
							<textarea class="form-control bg-light border-0" rows="5" placeholder="How can we help you achieve your goals?"></textarea>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-gold btn-lg px-5 py-3 fw-bold shadow">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php if(get_theme_mod('contact_map_url')) : ?>
			<div class="mt-6 animate-up rounded-4 overflow-hidden shadow-sm contact-map">
				<iframe src="<?php echo esc_url(get_theme_mod('contact_map_url')); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
