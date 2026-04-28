<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>
<main id="primary" class="site-main py-6 text-center animate-up">
	<div class="container">
		<div class="error-404-content py-5">
			<div class="display-1 fw-black text-accent mb-4" style="font-size: 150px; opacity: 0.1; position: absolute; left: 50%; transform: translateX(-50%); z-index: -1;">404</div>
			<div class="icon-box text-navy mb-5 mt-5">
				<i class="fas fa-compass fa-5x animate-float"></i>
			</div>
			<h1 class="display-4 fw-bold text-navy mb-4">Are You Lost In Your Journey?</h1>
			<p class="lead text-muted mx-auto mb-5" style="max-width: 600px;">We couldn't find the page you're looking for. But don't worry, even high achievers sometimes take a wrong turn. Let's get you back on track.</p>

			<div class="d-flex flex-wrap justify-content-center gap-3">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-gold btn-lg px-5 py-3 fw-bold shadow-lg">Return to Home</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-primary btn-lg px-5 py-3 fw-bold">Contact Support</a>
			</div>

			<div class="featured-categories mt-6 pt-5">
				<h2 class="h5 text-uppercase fw-bold text-muted letter-spacing-1 mb-4">Or Explore Our Core Focus Areas</h2>
				<div class="row g-3 justify-content-center">
					<?php
					$cats = array('Goal Setting', 'Online Income', 'Productivity');
					foreach($cats as $cat) : ?>
					<div class="col-md-3">
						<div class="card p-4 border-0 shadow-sm bg-light hover-lift">
							<h3 class="h6 mb-0 text-navy"><?php echo $cat; ?></h3>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
