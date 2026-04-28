<section class="problem-section py-6 animate-up">
	<div class="container">
		<div class="section-header text-center mb-6">
			<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-2 d-block">The Foundation</span>
			<h2 class="display-4 fw-black text-navy mb-3"><?php echo esc_html( get_theme_mod( 'problem_title', 'Is Your Potential Being Held Back?' ) ); ?></h2>
			<p class="text-muted mx-auto" style="max-width: 700px;">Without the right systems, even the greatest ambitions remain as dreams. We help you solve the core obstacles of modern achievement.</p>
		</div>
		<div class="row g-5">
			<?php
            $problem_items = array(
                1 => array('title' => 'The Clarity Gap', 'desc' => 'Having many ideas but no specific, measurable roadmap for execution.', 'icon' => 'fas fa-map-marked-alt'),
                2 => array('title' => 'Financial Stagnation', 'desc' => 'Working hard but not seeing your income grow proportionally to your effort.', 'icon' => 'fas fa-money-bill-wave'),
                3 => array('title' => 'Systemic Overwhelm', 'desc' => 'Drowning in tasks and notifications with no focus on what truly moves the needle.', 'icon' => 'fas fa-brain'),
                4 => array('title' => 'Outdated Tools', 'desc' => 'Using yesterday\'s methods for today\'s digital-first economy and AI world.', 'icon' => 'fas fa-robot'),
            );
            for($i = 1; $i <= 4; $i++) : ?>
			<div class="col-lg-3 col-md-6">
				<div class="card h-100 p-5 border-0 shadow-sm text-center transition-all hover-lift bg-white">
					<div class="icon-circle bg-light text-gold rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; transition: var(--transition);">
						<i class="<?php echo $problem_items[$i]['icon']; ?> fa-2x"></i>
					</div>
					<h3 class="h5 fw-bold text-navy mb-3"><?php echo $problem_items[$i]['title']; ?></h3>
					<p class="text-muted small mb-0 lh-lg"><?php echo $problem_items[$i]['desc']; ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
