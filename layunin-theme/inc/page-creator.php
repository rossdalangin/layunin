<?php
/**
 * Automated Page Creation for Layunin Theme
 */

function layunin_create_recommended_pages() {
    $pages = array(
        'about' => array(
            'title'    => 'About Us',
            'template' => 'templates/about-page.php',
            'content'  => 'Welcome to Layunin. Our goal is to help you transform your dreams into action.'
        ),
        'services' => array(
            'title'    => 'Our Services',
            'template' => 'templates/services-page.php',
            'content'  => 'Discover our premium coaching and digital services.'
        ),
        'contact' => array(
            'title'    => 'Contact Us',
            'template' => 'templates/contact-page.php',
            'content'  => 'Get in touch with us for inquiries and support.'
        ),
        'free-resources' => array(
            'title'    => 'Free Resources',
            'template' => 'templates/free-resources-page.php',
            'content'  => 'Access our library of free guides and templates.'
        ),
        'shop' => array(
            'title'    => 'Digital Shop',
            'template' => 'templates/shop-page.php',
            'content'  => 'Premium tools and planners for your success.'
        ),
        'testimonials' => array(
            'title'    => 'Testimonials',
            'template' => 'templates/testimonials-page.php',
            'content'  => 'Read success stories from our community.'
        ),
        'lead-magnet' => array(
            'title'    => '7-Day Goal Reset',
            'template' => 'templates/lead-magnet-landing.php',
            'content'  => 'Start your journey with our free 7-day guide.'
        ),
        'thank-you' => array(
            'title'    => 'Thank You',
            'template' => 'templates/thank-you.php',
            'content'  => 'Thank you for your interest in Layunin.'
        ),
        'privacy-policy' => array(
            'title'    => 'Privacy Policy',
            'template' => 'templates/privacy-policy.php',
            'content'  => 'Your privacy is important to us.'
        ),
        'terms-and-conditions' => array(
            'title'    => 'Terms and Conditions',
            'template' => 'templates/terms.php',
            'content'  => 'Please read our terms and conditions.'
        ),
        'affiliate-disclosure' => array(
            'title'    => 'Affiliate Disclosure',
            'template' => 'templates/affiliate-disclosure.php',
            'content'  => 'We value transparency in all our recommendations.'
        ),
    );

    foreach ( $pages as $slug => $page_data ) {
        $query = new WP_Query( array(
            'post_type'      => 'page',
            'name'           => $slug,
            'post_status'    => 'any',
            'posts_per_page' => 1,
        ) );

        if ( ! $query->have_posts() ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $page_data['title'],
                'post_name'    => $slug,
                'post_content' => $page_data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
            }
        }
    }
}
add_action( 'after_switch_theme', 'layunin_create_recommended_pages' );
add_action( 'customize_save_after', 'layunin_create_recommended_pages' );
