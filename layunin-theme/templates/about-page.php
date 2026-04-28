<?php
/**
 * Template Name: About Page
 */
get_header(); ?>
<main id="primary" class="site-main py-6">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-3 d-block">The Journey</span>
			<h1 class="entry-title display-3 fw-bold text-navy"><?php echo esc_html( get_theme_mod( 'about_title', 'Our Story' ) ); ?></h1>
		</header>

		<div class="row g-5 align-items-center mb-6">
            <div class="col-lg-6 animate-up">
                <div class="entry-content fs-5">
                    <?php
                    // Show standard WordPress content (Gutenberg)
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="col-lg-6 animate-up">
                <div class="about-hero-image rounded-4 shadow-lg overflow-hidden" style="height: 400px; background: #eee;">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800" class="w-100 h-100 object-fit-cover" alt="Team">
                </div>
            </div>
        </div>

        <div class="team-section mt-6">
            <h2 class="text-center display-5 fw-bold mb-5">Meet the Strategists</h2>
            <div class="row g-4">
                <?php for($i = 1; $i <= 3; $i++) :
                    $name = get_theme_mod("team_member_{$i}_name", 'Expert ' . $i);
                    $role = get_theme_mod("team_member_{$i}_role", 'Success Specialist');
                    $image = get_theme_mod("team_member_{$i}_image");
                ?>
                <div class="col-md-4 text-center animate-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
                    <div class="team-card p-4">
                        <div class="mb-4 mx-auto rounded-circle overflow-hidden shadow" style="width: 150px; height: 150px; background: #eee;">
                            <?php if($image) : ?>
                                <img src="<?php echo esc_url($image); ?>" class="w-100 h-100 object-fit-cover" alt="<?php echo esc_attr($name); ?>">
                            <?php else: ?>
                                <i class="fas fa-user fa-4x text-muted mt-4"></i>
                            <?php endif; ?>
                        </div>
                        <h3 class="h5 fw-bold mb-1"><?php echo esc_html($name); ?></h3>
                        <p class="text-accent small text-uppercase fw-bold"><?php echo esc_html($role); ?></p>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
	</div>
</main>
<?php get_footer(); ?>
