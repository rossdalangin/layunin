<?php if ( get_theme_mod( 'show_popup', true ) ) : ?>
<div id="layunin-popup" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="card border-0 shadow-lg p-0">
			<div class="card-body p-5 text-center">
				<button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
				<h2 class="h3 mb-phi-s popup-title"><?php echo esc_html( get_theme_mod( 'popup_title', "Wait! Don't Miss Out" ) ); ?></h2>
				<p class="mb-phi-l popup-desc"><?php echo esc_html( get_theme_mod( 'popup_desc', 'Get our "Free 7-Day Goal Reset Guide" and start taking action today.' ) ); ?></p>
				<form class="popup-form">
					<input type="email" placeholder="<?php echo esc_attr(get_theme_mod('popup_ph', 'Your Email Address')); ?>" class="form-control mb-phi-s" required>
					<button type="submit" class="btn btn-gold w-100 popup-btn-text"><?php echo esc_html(get_theme_mod('popup_btn_text', 'Send Me The Guide')); ?></button>
				</form>
				<p class="small text-muted mt-phi-s popup-social-proof"><?php echo esc_html(get_theme_mod('popup_social_proof', 'Join 25,000+ others pursuing their absolute mastery.')); ?></p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
