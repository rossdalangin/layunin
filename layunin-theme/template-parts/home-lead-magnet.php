<section class="lead-magnet-section py-6 animate-up">
	<div class="container">
		<div class="card bg-navy border-0 overflow-hidden rounded-4 shadow-lg p-5">
			<div class="row align-items-center g-5">
				<div class="col-lg-6">
					<div class="lm-content text-white">
						<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-2 d-block">Free Training</span>
						<h2 class="display-5 fw-bold mb-4"><?php echo esc_html(get_theme_mod('lm_title', 'The 7-Day Goal Reset Guide')); ?></h2>
						<p class="text-white-50 mb-4 fs-5"><?php echo esc_html(get_theme_mod('lm_subtitle', 'Ready to stop procrastinating and start producing? Get the exact roadmap used by over 10,000+ Filipinos to reclaim their time and achieve clarity.')); ?></p>
						<ul class="list-unstyled mb-5">
                            <?php
                            $list = get_theme_mod('lm_list', "How to define your 'Layunin' in 10 minutes\nThe AI tools for 3x productivity\n3 daily habits of high achievers");
                            $items = explode("\n", $list);
                            foreach($items as $item) : if(trim($item)) : ?>
							    <li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> <?php echo esc_html(trim($item)); ?></li>
                            <?php endif; endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="lm-form-card bg-white p-5 rounded-4 shadow-sm text-center">
						<div class="icon mb-4 text-navy fs-1"><i class="fas fa-envelope-open-text"></i></div>
						<h3 class="h4 fw-bold text-navy mb-4">Get Instant Access</h3>
						<form>
							<div class="mb-3">
								<input type="text" class="form-control form-control-lg bg-light border-0" placeholder="Your Name" required>
							</div>
							<div class="mb-4">
								<input type="email" class="form-control form-control-lg bg-light border-0" placeholder="Your Best Email" required>
							</div>
							<button type="submit" class="btn btn-gold btn-lg w-100 py-3 fw-bold">Send Me My Free Guide</button>
							<p class="small text-muted mt-3 mb-0">We respect your privacy. No spam, ever.</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
