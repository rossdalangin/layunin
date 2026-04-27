<?php
/**
 * Template Name: Lead Magnet Landing
 */
get_header(); ?>
<main id="primary" class="site-main py-5 bg-light min-vh-100 d-flex align-items-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 animate-up">
				<span class="badge bg-gold text-white mb-3 px-3 py-2">Free Download</span>
				<h1 class="display-4 fw-bold"><?php echo esc_html( get_theme_mod( 'lead_magnet_title', 'Free 7-Day Goal Reset Guide' ) ); ?></h1>
				<p class="lead mb-4 text-muted"><?php echo esc_html( get_theme_mod( 'lead_magnet_content', 'Stop drifting. Start achieving. This guide provides the exact framework we use to reset our goals and get back on track in just one week.' ) ); ?></p>
				<ul class="list-unstyled mb-5">
					<li class="mb-2"><i class="icon-check"></i> <strong>Day 1:</strong> The Clarity Audit</li>
					<li class="mb-2"><i class="icon-check"></i> <strong>Day 3:</strong> Systemizing Your Success</li>
					<li class="mb-2"><i class="icon-check"></i> <strong>Day 7:</strong> Long-term Momentum</li>
				</ul>
			</div>
			<div class="col-md-5 offset-md-1">
				<div class="card shadow border-0">
					<div class="card-body p-5">
						<h3 class="text-center mb-4">Get the Guide Now</h3>
						<form class="landing-optin">
							<div class="mb-3">
								<input type="text" placeholder="First Name" class="form-control form-control-lg" required>
							</div>
							<div class="mb-3">
								<input type="email" placeholder="Email Address" class="form-control form-control-lg" required>
							</div>
							<button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Send My Free Guide</button>
							<p class="text-center mt-3 small text-muted">We respect your privacy. No spam, ever.</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
