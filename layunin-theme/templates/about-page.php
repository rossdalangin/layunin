<?php
/**
 * Template Name: About Page (v9.4 Masterpiece)
 */
get_header(); ?>
<main id="primary" class="site-main py-xl">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up pe-lg-5 ps-lg-5">
			<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block about-badge"><?php echo esc_html(get_theme_mod('about_badge', 'The Pursuit of Absolute Mastery')); ?></span>
			<h1 class="entry-title display-1 fw-black text-navy mb-4"><?php echo esc_html( get_theme_mod( 'about_title', 'About Page' ) ); ?></h1>
            <p class="lead text-muted mx-auto fs-4" style="max-width: 800px;"><?php echo esc_html( get_theme_mod( 'about_lead', 'Layunin was built on a single, uncompromising principle: that every Filipino has the potential to achieve world-class excellence when equipped with the right systems.' ) ); ?></p>
		</header>

		<div class="row g-5 align-items-center mb-xl">
            <div class="col-lg-6 animate-up">
                <div class="entry-content fs-5 lh-lg">
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="col-lg-6 animate-up" style="animation-delay: 0.2s;">
                <div class="about-visual position-relative">
                    <div class="rounded-4 shadow-premium overflow-hidden about-main-visual" style="height: 500px; border-radius: 60px !important;">
                        <?php
                        $visual = get_theme_mod( 'about_visual', 'https://images.unsplash.com/photo-1522071823991-b9671f30c46f?auto=format&fit=crop&q=80&w=1200' );
                        ?>
                        <img src="<?php echo esc_url($visual); ?>" class="w-100 h-100 object-fit-cover" alt="Elite Strategy Team">
                    </div>
                    <div class="floating-stat glass p-4 rounded-4 position-absolute top-0 start-0 m-4 animate-float shadow-lg">
                        <div class="h3 fw-bold text-navy mb-0">25k+</div>
                        <div class="small text-muted fw-bold">High Achievers</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="team-section mt-xl">
            <div class="section-header text-center mb-6">
                <h2 class="display-4 fw-black mb-3 text-navy about-team-title"><?php echo esc_html(get_theme_mod('about_team_title', 'The Architects of Excellence')); ?></h2>
                <div class="accent-line mx-auto" style="width: 80px; height: 5px; background: var(--gold); border-radius: 5px;"></div>
            </div>
            <div class="master-grid">
                <?php for($i = 1; $i <= 3; $i++) :
                    $name = get_theme_mod("team_member_{$i}_name", 'Strategist ' . $i);
                    $role = get_theme_mod("team_member_{$i}_role", 'Systems Architect');
                    $image = get_theme_mod("team_member_{$i}_image", 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=300');
                ?>
                <div class="team-card text-center animate-up team-member-<?php echo $i; ?>" style="animation-delay: <?php echo $i * 0.15; ?>s;">
                    <div class="card h-100 p-5 hover-lift border-0 shadow-premium">
                        <div class="mb-4 mx-auto rounded-circle overflow-hidden shadow-lg border border-5 border-light member-photo" style="width: 160px; height: 160px;">
                            <img src="<?php echo esc_url($image); ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo esc_attr($name); ?>">
                        </div>
                        <h3 class="h4 fw-bold text-navy mb-2 member-name"><?php echo esc_html($name); ?></h3>
                        <p class="text-gold small text-uppercase fw-black letter-spacing-1 mb-4 member-role"><?php echo esc_html($role); ?></p>
                        <div class="social-mini d-flex justify-content-center gap-3">
                            <a href="#" class="text-muted hover-gold"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-muted hover-gold"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
	</div>
</main>
<?php get_footer(); ?>
