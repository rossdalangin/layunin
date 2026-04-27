<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>
<main id="primary" class="site-main container py-5">
	<div class="row">
		<div class="col-md-6">
			<h1>Get in Touch</h1>
			<p>Have questions about our resources or services? We're here to help.</p>
			<ul class="contact-info list-unstyled mt-4">
				<li><strong>Email:</strong> hello@layunin.com</li>
				<li><strong>Hours:</strong> Mon-Fri, 9am - 6pm PHT</li>
			</ul>
		</div>
		<div class="col-md-6">
			<form class="contact-form bg-light p-4 rounded shadow-sm">
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" id="email" class="form-control" required>
				</div>
				<div class="mb-3">
					<label for="message" class="form-label">Message</label>
					<textarea id="message" class="form-control" rows="5" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary w-100">Send Message</button>
			</form>
		</div>
	</div>
</main>
<?php get_footer(); ?>
