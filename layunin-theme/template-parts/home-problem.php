<section class="problem-section py-xl animate-up">
	<div class="container">
		<div class="section-header text-center mb-6 pe-lg-5 ps-lg-5">
			<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">The Execution Gap</span>
			<h2 class="display-4 fw-black text-navy mb-4"><?php echo esc_html( get_theme_mod( 'problem_title', 'Why Most Potential Stays Locked' ) ); ?></h2>
			<p class="lead text-muted mx-auto" style="max-width: 800px;">Without the right systems, ambition is just noise. We identify and solve the core systemic challenges that prevent Filipinos from reaching elite success.</p>
		</div>
		<div class="master-grid">
			<?php
            $problem_items = array(
                1 => array('title' => 'Directional Paralysis', 'desc' => 'Having grand visions but lacking a granular roadmap for the next 24 hours of execution.', 'icon' => 'fas fa-map-signs'),
                2 => array('title' => 'Income Ceiling', 'desc' => 'Trading time for money in outdated models instead of leveraging digital systems.', 'icon' => 'fas fa-money-bill-wave'),
                3 => array('title' => 'Cognitive Overload', 'desc' => 'Drowning in tasks and notifications without a filter for high-impact objectives.', 'icon' => 'fas fa-brain'),
                4 => array('title' => 'Tool Obsolescence', 'desc' => 'Failing to utilize AI and modern automation while competitors move at light speed.', 'icon' => 'fas fa-robot'),
            );
            for($i = 1; $i <= 4; $i++) : ?>
			<div class="problem-item">
				<div class="card h-100 p-5 border-0 text-center hover-lift bg-white shadow-premium">
					<div class="icon-circle bg-light text-gold rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 90px; height: 90px;">
						<i class="<?php echo $problem_items[$i]['icon']; ?> fa-2x"></i>
					</div>
					<h3 class="h4 fw-bold text-navy mb-3"><?php echo $problem_items[$i]['title']; ?></h3>
					<p class="text-muted small mb-0 lh-lg"><?php echo $problem_items[$i]['desc']; ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
