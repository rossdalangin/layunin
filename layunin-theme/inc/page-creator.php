<?php
/**
 * Automated Page Creation for Layunin Theme - High Quality Content
 */

function layunin_create_recommended_pages() {
    // Only run if triggered or on theme switch (if trigger is default false)
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'customize_save_after' ) ) {
        return;
    }

    $pages = array(
        'about' => array(
            'title'    => 'Our Story',
            'template' => 'templates/about-page.php',
            'content'  => 'Layunin (Tagalog for Goal/Purpose) was born from a desire to see every Filipino thrive. We believe that with the right mindset, digital tools, and actionable guidance, anyone can bridge the gap between their current reality and their ultimate goals. Our mission is to provide the systems and strategies that turn dreams into measurable success.'
        ),
        'services' => array(
            'title'    => 'Our Solutions',
            'template' => 'templates/services-page.php',
            'content'  => "We offer a range of premium services tailored for the modern Filipino achiever.\n\n[pricing_table]\n[pricing_item title='Starter' price='₱5,000' features='Discovery Call | Personal Roadmap | Weekly Check-in']\n[pricing_item title='Premium' price='₱15,000' features='Complete Branding | AI Systems | Priority Support' featured='yes']\n[pricing_item title='Elite' price='₱50,000' features='Custom Software | 1-on-1 Mentorship | Lifetime Access']\n[/pricing_table]\n\n[faq_page]\n[faq_item question='What services do you offer?']We offer web development, coaching, and business strategy consultation.[/faq_item]\n[faq_item question='How can I get started?']Simply book a session or request a quote through our contact page.[/faq_item]\n[/faq_page]"
        ),
        'contact' => array(
            'title'    => 'Get In Touch',
            'template' => 'templates/contact-page.php',
            'content'  => 'Have questions about our resources, services, or your own growth journey? We are here to help. Reach out to the Layunin team today and let us start a conversation about your goals.'
        ),
        'free-resources' => array(
            'title'    => 'Success Library',
            'template' => 'templates/free-resources-page.php',
            'content'  => 'Knowledge is only power when applied. Our Success Library contains free guides, planners, and templates designed to give you a head start in your personal and professional development.'
        ),
        'shop' => array(
            'title'    => 'Premium Tools',
            'template' => 'templates/shop-page.php',
            'content'  => 'Invest in your growth. Browse our curated collection of digital products, including the Ultimate Goal Planner and AI-powered productivity packs, built specifically to accelerate your progress.'
        ),
        'testimonials' => array(
            'title'    => 'Success Stories',
            'template' => 'templates/testimonials-page.php',
            'content'  => 'See how members of the Layunin community have transformed their lives. Our wall of love showcases the real-world impact of our systems and strategies on Filipinos across the globe.'
        ),
        'lead-magnet' => array(
            'title'    => 'Free 7-Day Goal Reset',
            'template' => 'templates/lead-magnet-landing.php',
            'content'  => 'Feeling stuck? Our most popular resource, the 7-Day Goal Reset, provides a day-by-day framework to audit your life, clear the overwhelm, and reclaim your momentum.'
        ),
        'thank-you' => array(
            'title'    => 'Welcome To The Community',
            'template' => 'templates/thank-you.php',
            'content'  => 'Thank you for trusting Layunin. Your journey to a more purposeful and productive life is officially underway. Check your email for your resources.'
        ),
        'privacy-policy' => array(
            'title'    => 'Privacy Policy',
            'template' => 'templates/privacy-policy.php',
            'content'  => 'At Layunin, we value your trust. This policy outlines how we handle and protect your data with the highest standards of integrity.'
        ),
        'terms-and-conditions' => array(
            'title'    => 'Terms of Service',
            'template' => 'templates/terms.php',
            'content'  => 'By engaging with Layunin, you agree to our terms of service designed to ensure a fair and productive environment for all community members.'
        ),
        'affiliate-disclosure' => array(
            'title'    => 'Transparency Disclosure',
            'template' => 'templates/affiliate-disclosure.php',
            'content'  => 'To support our mission, some links on this site are affiliate links. We only recommend tools and services we truly believe in.'
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
