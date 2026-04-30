<?php if ( get_theme_mod( 'show_home_process', true ) ) : ?>
<section class="process-section py-phi bg-light overflow-hidden position-relative">
    <div class="bg-accent-blob position-absolute top-0 start-0 w-100 h-100 opacity-05" style="background: radial-gradient(circle, var(--gold) 0%, transparent 70%); transform: translate(-50%, -50%);"></div>

	<div class="container position-relative z-index-1">
		<h2 class="display-4 mb-phi process-title text-center fw-black text-navy"><?php echo esc_html( get_theme_mod('process_title', 'The Layunin Elite Protocol') ); ?></h2>

		<div class="row g-4">
            <?php
            $steps = array(
                1 => array('title' => 'Audit & Align', 'desc' => 'Identify the "noise" and align your daily actions with your core purpose.'),
                2 => array('title' => 'Systematize Growth', 'desc' => 'Deploy modular productivity frameworks and AI tools to 3X your output.'),
                3 => array('title' => 'Scale Impact', 'desc' => 'Convert your increased efficiency into diversified, scalable income streams.')
            );
            for($i = 1; $i <= 3; $i++) : ?>
			<div class="col-lg-4 animate-up process-step-<?php echo $i; ?>" style="animation-delay: <?php echo $i * 0.1; ?>s;">
				<div class="process-card card p-5 border-0 shadow-sm h-100 transition-all hover-lift" style="border-radius: 30px !important;">
					<div class="step-number display-1 fw-black text-gold opacity-10 mb-phi-l"><?php echo $i; ?></div>
					<h3 class="h4 fw-bold mb-phi-s step-title"><?php echo esc_html( get_theme_mod("process_step_{$i}_title", $steps[$i]['title']) ); ?></h3>
					<p class="text-muted mb-0 step-desc"><?php echo esc_html( get_theme_mod("process_step_{$i}_desc", $steps[$i]['desc']) ); ?></p>
				</div>
			</div>
            <?php endfor; ?>
		</div>
	</div>
</section>
<?php endif; ?>
