<?php if ( get_theme_mod( 'show_home_trust_badges', true ) ) : ?>
<section class="trust-badges-section py-phi bg-white border-bottom border-light" >
	<div class="container">
		<h2 class="h6 text-center text-uppercase fw-bold text-muted mb-5 letter-spacing-2 trust-badges-title"><?php echo esc_html( get_theme_mod( 'trust_badges_title', 'The Standard for Modern Filipino Excellence' ) ); ?></h2>
		<div class="row align-items-center justify-content-center g-5 opacity-50">
			<?php for($i = 1; $i <= 4; $i++) :
				$badge = get_theme_mod("trust_badge_{$i}");
				if($badge) :
				?>
				<div class="col-6 col-md-3 text-center">
					<img src="<?php echo esc_url($badge); ?>" alt="Trust Badge <?php echo $i; ?>" class="img-fluid" style="max-height: 40px; filter: grayscale(100%);">
				</div>
				<?php else: ?>
				<div class="col-6 col-md-3 text-center">
					<span class="h4 fw-bold text-muted"><?php echo esc_html(get_theme_mod('trust_badge_fallback', 'PARTNER')); ?> <?php echo $i; ?></span>
				</div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
