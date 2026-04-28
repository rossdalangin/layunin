<section class="final-cta-section bg-navy text-white text-center py-5 border-top border-white-10">
	<div class="container py-5 animate-up">
		<h2 class="display-4 mb-4"><?php echo esc_html( get_theme_mod('final_cta_title', 'Your future starts with one decision.') ); ?></h2>
		<p class="lead mb-5 opacity-75"><?php echo esc_html( get_theme_mod('final_cta_desc', 'Stop dreaming about your goals and start building them. We are here to guide you every step of the way.') ); ?></p>
		<div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
			<a href="#" class="btn btn-gold btn-lg shadow-lg px-5 final-cta-1"><?php echo esc_html(get_theme_mod('final_cta_1_text', 'Join the Community')); ?></a>
			<a href="<?php echo esc_url( home_url( '/free-resources/' ) ); ?>" class="btn btn-outline-light btn-lg px-5 final-cta-2"><?php echo esc_html(get_theme_mod('final_cta_2_text', 'Explore Resources')); ?></a>
		</div>
	</div>
</section>
