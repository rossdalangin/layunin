<section class="final-cta-section py-7 bg-navy text-white text-center position-relative overflow-hidden">
    <div class="bg-gradient-accent position-absolute top-0 start-0 w-100 h-100 opacity-10" style="background: radial-gradient(circle at center, var(--gold) 0%, transparent 70%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row justify-content-center">
			<div class="col-lg-8 animate-up">
				<h2 class="display-2 fw-black text-white mb-4"><?php echo esc_html( get_theme_mod( 'final_cta_title', 'Master Your Path. Claim Your Layunin.' ) ); ?></h2>
				<p class="lead opacity-75 mb-6 fs-4">
					<?php echo esc_html( get_theme_mod( 'final_cta_desc', 'The difference between who you are and who you want to be is what you do today. Join the elite network.' ) ); ?>
				</p>
				<div class="d-flex flex-wrap justify-content-center gap-4">
					<a href="<?php echo esc_url( home_url('/lead-magnet/') ); ?>" class="btn btn-gold btn-xl px-5 py-3 fs-5 fw-black shadow-lg final-cta-1"><?php echo esc_html( get_theme_mod('final_cta_1_text', 'Access the Elite Network') ); ?></a>
					<a href="<?php echo esc_url( home_url('/free-resources/') ); ?>" class="btn btn-outline-white btn-xl px-5 py-3 fs-5 fw-bold border-2 final-cta-2"><?php echo esc_html( get_theme_mod('final_cta_2_text', 'Explore the Knowledge Library') ); ?></a>
				</div>
                <div class="mt-6 pt-5 opacity-50 small">
                    <p>Backed by our commitment to Filipino excellence. No commitment required to start.</p>
                </div>
			</div>
		</div>
	</div>
</section>
