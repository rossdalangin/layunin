<section class="final-cta-section py-phi bg-navy text-white text-center position-relative overflow-hidden">
    <div class="bg-gradient-accent position-absolute top-0 start-0 w-100 h-100 opacity-20" style="background: radial-gradient(circle at center, var(--gold) 0%, transparent 70%);"></div>

	<div class="container position-relative z-index-1">
		<div class="row justify-content-center">
			<div class="col-lg-10 animate-up">
                <div class="cta-content-wrapper p-5 p-lg-6 rounded-5 glass-morphism shadow-2xl mb-phi-l">
				<h2 class="display-2 fw-black text-white mb-phi-l"><?php echo esc_html( get_theme_mod( 'final_cta_title', 'Master Your Path. Claim Your Layunin.' ) ); ?></h2>
				<p class="lead opacity-80 mb-phi fs-4">
					<?php echo esc_html( get_theme_mod( 'final_cta_desc', 'The difference between who you are and who you want to be is what you do today. Join the elite network.' ) ); ?>
				</p>
				<div class="d-flex flex-wrap justify-content-center gap-4">
					<a href="<?php echo esc_url( get_theme_mod('final_cta_1_link', home_url('/lead-magnet/')) ); ?>" class="btn btn-gold btn-xl px-5 py-3 fs-5 fw-black shadow-lg final-cta-1"><?php echo esc_html( get_theme_mod('final_cta_1_text', 'Access the Elite Network') ); ?></a>
					<a href="<?php echo esc_url( get_theme_mod('final_cta_2_link', home_url('/free-resources/')) ); ?>" class="btn btn-outline-navy btn-xl px-5 py-3 fs-5 fw-bold border-2 final-cta-2"><?php echo esc_html( get_theme_mod('final_cta_2_text', 'Explore the Knowledge Library') ); ?></a>
				</div>
                </div>
                <div class="mt-phi opacity-60 small text-white-50">
                    <p class="final-cta-trust"><?php echo esc_html(get_theme_mod('final_cta_trust', 'Backed by our commitment to Filipino excellence. No commitment required to start.')); ?></p>
                </div>
			</div>
		</div>
	</div>
</section>
