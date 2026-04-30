<section class="lead-magnet-section py-phi bg-white position-relative overflow-hidden">
    <div class="bg-pattern position-absolute top-0 start-0 w-100 h-100 opacity-05" style="background-image: radial-gradient(var(--gold) 1px, transparent 1px); background-size: 30px 30px;"></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-6">
			<div class="col-lg-6 animate-up">
				<h2 class="display-3 fw-black text-navy mb-phi-l"><?php echo esc_html( get_theme_mod( 'lm_title', 'The Elite 7-Day Goal Reset Protocol' ) ); ?></h2>
				<p class="fs-5 text-muted mb-phi"><?php echo esc_html( get_theme_mod( 'lm_subtitle', 'Stop existing. Start executing. This is the exact audit used by top CEOs to reclaim 20+ hours per week.' ) ); ?></p>

				<ul class="list-unstyled mb-phi">
					<?php
                    $default_list = "The 'Layunin' Alignment Map (10-Min Audit)\nTop 5 AI Tools for 300% More Output\nDay-by-Day Life Re-Engineering Framework";
					$items = explode("\n", get_theme_mod('lm_list', $default_list));
					foreach($items as $item) :
						if(trim($item)) :
					?>
					<li class="mb-phi-s d-flex align-items-center gap-3 fs-5"><i class="fas fa-check-circle text-gold"></i> <?php echo esc_html($item); ?></li>
					<?php endif; endforeach; ?>
				</ul>

				<form class="lead-magnet-form d-flex flex-column flex-sm-row gap-3" action="<?php echo esc_url(get_theme_mod('lead_magnet_form_action')); ?>" method="POST">
					<input type="email" name="EMAIL" placeholder="<?php echo esc_attr(get_theme_mod('lm_newsletter_ph', 'Enter your business email')); ?>" class="form-control form-control-lg bg-light border-0 shadow-sm" style="min-width: 300px;" required>
					<button type="submit" class="btn btn-gold btn-lg px-5 shadow-lg fw-bold lm-btn-text"><?php echo esc_html(get_theme_mod('lm_btn_text', 'Get the Protocol')); ?></button>
				</form>
				<p class="small text-muted mt-phi-l lm-social-proof"><i class="fas fa-lock me-2 text-gold"></i> <?php echo esc_html(get_theme_mod('lm_social_proof', 'Join 25,000+ others pursuing their absolute mastery. Your data is 100% secure.')); ?></p>
			</div>
			<div class="col-lg-6 d-none d-lg-block animate-up" style="animation-delay: 0.2s;">
				<div class="lm-visual-wrapper p-3 bg-white-10 rounded-4 shadow-lg rotate-3">
					<?php
					$lm_image = get_theme_mod('lm_image', 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=800');
					?>
					<img src="<?php echo esc_url($lm_image); ?>" alt="Guide Cover" class="img-fluid rounded-4">
				</div>
			</div>
		</div>
	</div>
</section>
