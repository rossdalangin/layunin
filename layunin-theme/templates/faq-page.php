<?php
/**
 * Template Name: FAQ Page
 */
get_header(); ?>
<main id="primary" class="site-main py-phi">
	<div class="container">
		<header class="entry-header text-center mb-phi animate-up">
			<span class="text-accent text-uppercase fw-bold letter-spacing-2 mb-phi-s d-block faq-badge"><?php echo esc_html(get_theme_mod('faq_badge', 'Common Inquiries')); ?></span>
			<h1 class="entry-title display-3 fw-bold text-navy faq-title"><?php echo esc_html( get_theme_mod( 'faq_title', 'Frequently Asked Questions' ) ); ?></h1>
			<p class="lead text-muted mx-auto faq-lead" style="max-width: 700px;"><?php echo esc_html( get_theme_mod( 'faq_lead', 'Find answers to the most frequent questions about the Layunin framework and elite protocols.' ) ); ?></p>
		</header>

		<div class="row justify-content-center">
            <div class="col-lg-8 animate-up">
                <div class="entry-content">
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>

        <div class="mt-phi p-5 bg-navy-subtle rounded-4 text-center animate-up">
            <h2 class="h4 fw-bold text-navy mb-phi-s faq-cta-title"><?php echo esc_html(get_theme_mod('faq_cta_title', 'Still have questions?')); ?></h2>
            <p class="text-muted mb-phi-l faq-cta-desc"><?php echo esc_html(get_theme_mod('faq_cta_desc', "Can't find the answer you're looking for? Reach out to our strategy team.")); ?></p>
            <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-gold px-5 py-3 fw-bold faq-cta-btn"><?php echo esc_html(get_theme_mod('faq_cta_btn', 'Contact Support')); ?></a>
        </div>
	</div>
</main>
<?php get_footer(); ?>
