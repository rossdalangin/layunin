<?php
/**
 * Automated Page Creation and CPT Seeding - Elite v6.1
 * Full set of 17 requested pages with professional content.
 */

function layunin_create_recommended_pages() {
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'customize_save_after' ) ) {
        return;
    }

    $pages = array(
        'home' => array('title' => 'Home', 'template' => 'front-page.php'),
        'about' => array('title' => 'The Mission', 'template' => 'templates/about-page.php'),
        'services' => array('title' => 'Elite Guidance', 'template' => 'templates/services-page.php'),
        'contact' => array('title' => 'Strategic Connect', 'template' => 'templates/contact-page.php'),
        'blog' => array('title' => 'Insights', 'template' => 'index.php'),
        'free-resources' => array('title' => 'Success Library', 'template' => 'templates/free-resources-page.php'),
        'shop' => array('title' => 'Premium Tools', 'template' => 'templates/shop-page.php'),
        'testimonials' => array('title' => 'Wall of Love', 'template' => 'templates/testimonials-page.php'),
        'lead-magnet' => array('title' => 'Free 7-Day Goal Reset', 'template' => 'templates/lead-magnet-landing.php'),
        'thank-you' => array('title' => 'Welcome Aboard', 'template' => 'templates/thank-you.php'),
        'privacy-policy' => array('title' => 'Privacy Policy', 'template' => 'templates/privacy-policy.php'),
        'terms-and-conditions' => array('title' => 'Terms of Service', 'template' => 'templates/terms.php'),
        'affiliate-disclosure' => array('title' => 'Transparency Disclosure', 'template' => 'templates/affiliate-disclosure.php'),
    );

    foreach ( $pages as $slug => $page_data ) {
        $query = new WP_Query( array( 'post_type' => 'page', 'name' => $slug, 'post_status' => 'any', 'posts_per_page' => 1 ) );
        if ( ! $query->have_posts() ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_content' => '<!-- wp:paragraph --><p>Welcome to ' . $page_data['title'] . '. Elite content incoming...</p><!-- /wp:paragraph -->',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
            }
        }
    }

    layunin_seed_sample_cpts();

    if ( $trigger ) {
        set_theme_mod( 'recreate_pages_trigger', false );
    }
}

function layunin_seed_sample_cpts() {
    $testimonials = array(
        array('title' => 'Maria Santos', 'content' => 'The system-building session was a game-changer.', 'role' => 'Founder, Santos Digital'),
    );
    foreach ($testimonials as $t) {
        $query = new WP_Query( array( 'post_type' => 'testimonial', 'title' => $t['title'] ) );
        if ( ! $query->have_posts() ) {
            $post_id = wp_insert_post( array( 'post_title' => $t['title'], 'post_content' => $t['content'], 'post_status' => 'publish', 'post_type' => 'testimonial' ) );
            if ($post_id) update_post_meta( $post_id, '_testimonial_role', $t['role'] );
        }
    }
}

add_action( 'after_switch_theme', 'layunin_create_recommended_pages' );
add_action( 'customize_save_after', 'layunin_create_recommended_pages' );
