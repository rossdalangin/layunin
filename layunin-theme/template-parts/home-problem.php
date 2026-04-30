<?php if ( get_theme_mod( 'show_home_problem', true ) ) : ?>
<section class="problem-section py-phi bg-white position-relative overflow-hidden">
    <div class="position-absolute top-0 end-0 opacity-05"><i class="fas fa-lock fa-20x text-navy" style="transform: translate(30%, -30%);"></i></div>

	<div class="container position-relative z-index-1">
		<div class="row align-items-center g-5">
			<div class="col-lg-5 animate-up">
				<span class="text-gold text-uppercase fw-bold mb-3 d-block letter-spacing-2"><?php echo esc_html(get_theme_mod('problem_badge', 'The Friction')); ?></span>
				<h2 class="display-4 fw-black text-navy mb-4"><?php echo esc_html( get_theme_mod( 'problem_title', 'The Ceiling on Filipino Potential' ) ); ?></h2>
				<p class="lead text-muted mb-0"><?php echo esc_html(get_theme_mod('problem_lead', 'Ambition is plentiful, but world-class execution systems are rare. We identified the primary barriers holding high-achievers back.')); ?></p>
			</div>
			<div class="col-lg-7">
				<div class="row g-4">
                    <?php
                    $problems = array(
                        1 => array('title' => 'Information Overload', 'desc' => 'Endless global advice that doesn\'t translate to the local context.'),
                        2 => array('title' => 'The Hustle Trap', 'desc' => 'Working 80 hours a week with zero scalability or "Layunin" alignment.'),
                        3 => array('title' => 'Technical Friction', 'desc' => 'Struggling to implement modern tools and AI into existing workflows.'),
                        4 => array('title' => 'Income Plateau', 'desc' => 'Trading time for money without a system to build digital assets.')
                    );
                    for($i = 1; $i <= 4; $i++) :
                        $title = get_theme_mod("problem_item_{$i}_title", $problems[$i]['title']);
                        $desc = get_theme_mod("problem_item_{$i}_desc", $problems[$i]['desc']);
                        $icon = get_theme_mod("problem_item_{$i}_icon", "fas fa-lock");
                        if($title) :
                    ?>
					<div class="col-md-6 animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
						<div class="problem-item p-5 bg-light rounded-4 h-100 border shadow-sm hover-lift">
							<div class="text-gold mb-3"><i class="<?php echo esc_attr($icon); ?> fa-2x"></i></div>
							<h3 class="h5 fw-bold text-navy mb-2"><?php echo esc_html($title); ?></h3>
							<p class="small text-muted mb-0"><?php echo esc_html($desc); ?></p>
						</div>
					</div>
                    <?php endif; endfor; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
