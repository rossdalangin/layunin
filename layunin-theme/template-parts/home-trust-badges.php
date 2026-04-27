<?php if ( get_theme_mod( 'show_trust_badges', true ) ) : ?>
<section class="trust-badges-section py-5 border-top border-bottom bg-white">
	<div class="container">
		<h2 class="h6 text-center text-uppercase fw-bold text-muted mb-5 letter-spacing-2"><?php echo esc_html( get_theme_mod( 'trust_badges_title', 'Trusted By Forward-Thinking Filipinos' ) ); ?></h2>
		<div class="d-flex flex-wrap justify-content-center align-items-center gap-5 opacity-50 grayscale">
			<?php for($i = 1; $i <= 4; $i++) :
				$badge = get_theme_mod("trust_badge_{$i}");
				if($badge) :
			?>
				<img src="<?php echo esc_url($badge); ?>" alt="Partner <?php echo $i; ?>" style="height: 30px; object-fit: contain;">
			<?php else : ?>
				<img src="https://via.placeholder.com/150x50?text=PARTNER+<?php echo $i; ?>" alt="Partner <?php echo $i; ?>" style="height: 30px;">
			<?php endif; endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
