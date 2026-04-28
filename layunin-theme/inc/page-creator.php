<?php
/**
 * terminal Supreme Page Creator and CPT Seeding (v9.0)
 */

function layunin_create_recommended_pages() {
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'after_switch_theme' ) === 0 ) {
        if ( !isset($_POST['customized']) ) return;
    }

    $pages = array(
        'home' => array(
            'title' => 'Home',
            'template' => 'front-page.php',
            'content' => ''
        ),
        'about' => array(
            'title' => 'The Mastery Mission',
            'template' => 'templates/about-page.php',
            'content' => '<!-- wp:heading {"level":2} --><h2>Our Core Philosophy</h2><!-- /wp:heading --><!-- wp:paragraph --><p>At Layunin, we believe that true success is built on the intersection of clarity and precision. Most people fail not because they lack ambition, but because they lack a system. We provide the architectural blueprints for your life and business.</p><!-- /wp:paragraph --><!-- wp:shortcode -->[benefit_list][benefit_item title="Unwavering Clarity"]Defining your life mission with surgical precision.[/benefit_item][benefit_item title="High-Output Systems"]Frameworks that prioritize execution over planning.[/benefit_item][/benefit_list]<!-- /wp:shortcode -->'
        ),
        'services' => array(
            'title' => 'Elite Guidance Systems',
            'template' => 'templates/services-page.php',
            'content' => '<!-- wp:heading {"level":2, "textAlign":"center"} --><h2 class="has-text-align-center">Choose Your Transformation Tier</h2><!-- /wp:heading --><!-- wp:shortcode -->[pricing_table][pricing_item title="Strategy Audit" price="₱4,999" features="1-Hour Session|Gap Analysis|Custom Action Plan" button="Book Audit"][pricing_item title="Mastery Coaching" price="₱14,999" features="Monthly Access|System Design|Weekly Check-ins" featured="yes" button="Apply Now"][pricing_item title="Elite Partnership" price="Custom" features="Done-for-you Setup|Brand Architecture|Full Implementation" button="Inquire"][/pricing_table]<!-- /wp:shortcode -->'
        ),
        'contact' => array(
            'title' => 'Strategic Connection',
            'template' => 'templates/contact-page.php',
            'content' => '<!-- wp:paragraph --><p>Ready to bridge the execution gap? Our team of strategists is standing by to help you take the next precise step in your journey. Fill out the form below or reach out directly.</p><!-- /wp:paragraph -->'
        ),
        'shop' => array(
            'title' => 'The Asset Library',
            'template' => 'templates/shop-page.php',
            'content' => '<!-- wp:heading {"level":2} --><h2>Accelerate Your Progress</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Invest in proven tools that save you years of trial and error. Our asset library contains the exact systems we use to run high-output digital businesses.</p><!-- /wp:paragraph -->'
        ),
        'free-resources' => array(
            'title' => 'Success Accelerator',
            'template' => 'templates/free-resources-page.php',
            'content' => '<!-- wp:heading {"level":2} --><h2>Foundational Mastery</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Every journey starts with a single step. These free resources are designed to provide immediate value and help you begin your transformation today.</p><!-- /wp:paragraph -->'
        ),
        'testimonials' => array(
            'title' => 'Wall of Mastery',
            'template' => 'templates/testimonials-page.php',
            'content' => '<!-- wp:paragraph --><p>Real results from real achievers. See how the Layunin systems have transformed businesses and lives across the Philippines.</p><!-- /wp:paragraph -->'
        ),
        'lead-magnet' => array(
            'title' => 'The 7-Day Reset',
            'template' => 'templates/lead-magnet-landing.php',
            'content' => ''
        ),
        'thank-you' => array(
            'title' => 'Success Confirmed',
            'template' => 'templates/thank-you.php',
            'content' => ''
        ),
        'affiliate-disclosure' => array(
            'title' => 'Transparency',
            'template' => 'templates/affiliate-disclosure.php',
            'content' => ''
        ),
        'privacy-policy' => array(
            'title' => 'Privacy Protocol',
            'template' => 'templates/privacy-policy.php',
            'content' => ''
        ),
        'terms-and-conditions' => array(
            'title' => 'Rules of Engagement',
            'template' => 'templates/terms.php',
            'content' => ''
        ),
        'faq' => array(
            'title' => 'Clarity Center',
            'template' => 'templates/full-width.php',
            'content' => '<!-- wp:heading {"level":2, "textAlign":"center"} --><h2 class="has-text-align-center">Frequently Asked Questions</h2><!-- /wp:heading --><!-- wp:shortcode -->[faq_page][faq_item question="How long does it take to see results?"]Most community members report a shift in clarity within 48 hours and tangible productivity gains within the first 7 days.[/faq_item][faq_item question="Is this suitable for beginners?"]Absolutely. Our systems are modular, allowing you to start simple and scale as you grow.[/faq_item][/faq_page]<!-- /wp:shortcode -->'
        )
    );

    foreach ( $pages as $slug => $data ) {
        $query = new WP_Query( array( 'post_type' => 'page', 'name' => $slug, 'post_status' => 'any' ) );
        if ( ! $query->have_posts() ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => $data['content'] ?: '<!-- wp:paragraph --><p>Welcome to ' . $data['title'] . '. Elite content is being prepared for your growth journey.</p><!-- /wp:paragraph -->',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
            if ( $page_id ) update_post_meta( $page_id, '_wp_page_template', $data['template'] );
        }
    }

    layunin_seed_sample_cpts();

    if ( $trigger ) set_theme_mod( 'recreate_pages_trigger', false );
}

function layunin_seed_sample_cpts() {
    $testimonials = array(
        array('title' => 'Maria Santos', 'content' => 'Transitioned from freelance burnout to a high-output agency in 4 months using the Layunin framework.', 'role' => 'Founder, Digital Elite'),
        array('title' => 'Juan Dela Cruz', 'content' => 'The AI productivity systems doubled my income while reducing my work hours by half.', 'role' => 'Tech Entrepreneur'),
        array('title' => 'Elena Reyes', 'content' => 'Finally a system that understands the Filipino context. My productivity has never been higher.', 'role' => 'Creative Director'),
    );
    foreach ($testimonials as $t) {
        $query = new WP_Query( array( 'post_type' => 'testimonial', 'title' => $t['title'], 'post_status' => 'any' ) );
        if ( ! $query->have_posts() ) {
            $id = wp_insert_post( array( 'post_title' => $t['title'], 'post_content' => $t['content'], 'post_status' => 'publish', 'post_type' => 'testimonial' ) );
            if ($id) update_post_meta( $id, '_testimonial_role', $t['role'] );
        }
    }
}

add_action( 'after_switch_theme', 'layunin_create_recommended_pages' );
add_action( 'customize_save_after', 'layunin_create_recommended_pages' );
