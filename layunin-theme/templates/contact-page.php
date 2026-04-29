<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>
<main id="primary" class="site-main py-xl">
	<div class="container">
		<header class="entry-header text-center mb-6 animate-up">
			<span class="text-gold text-uppercase fw-bold letter-spacing-2 mb-3 d-block">Strategic Connection</span>
			<h1 class="entry-title display-1 fw-black text-navy mb-4"><?php echo esc_html( get_theme_mod( 'contact_title', 'Connect With Us' ) ); ?></h1>
		</header>

		<div class="entry-content animate-up text-center mb-6">
			<?php
            $custom_content = get_theme_mod('contact_content');
            if($custom_content) {
                echo wpautop(do_shortcode($custom_content));
            } else {
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            }
            ?>
		</div>

        <div class="contact-methods master-grid mt-6">
            <div class="card p-5 text-center hover-lift border-0 shadow-premium">
                <i class="fas fa-envelope text-gold fa-3x mb-4"></i>
                <h3 class="h4 fw-bold mb-2">Email Us</h3>
                <p class="text-muted">Inquiries & Support</p>
                <a href="mailto:hello@layunin.com" class="text-navy fw-bold">hello@layunin.com</a>
            </div>
            <div class="card p-5 text-center hover-lift border-0 shadow-premium">
                <i class="fas fa-phone-alt text-gold fa-3x mb-4"></i>
                <h3 class="h4 fw-bold mb-2">Call Us</h3>
                <p class="text-muted">Strategic Advice</p>
                <a href="tel:+639123456789" class="text-navy fw-bold">+63 912 345 6789</a>
            </div>
        </div>
	</div>
</main>
<?php get_footer(); ?>
