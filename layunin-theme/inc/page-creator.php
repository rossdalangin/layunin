<?php
/**
 * Elite Site Ecosystem - v9.3 Refinement
 */

function layunin_create_recommended_pages() {
    // Only run on theme activation or via customizer trigger
    $is_trigger = get_theme_mod( 'recreate_pages_trigger', false );

    // We use a flag to only run once per activation, or when triggered manually
    if ( ! $is_trigger && did_action( 'after_switch_theme' ) === 0 && get_option( 'layunin_pages_created' ) ) {
        return;
    }

    $pages = array(
        'About' => array(
            'template' => 'templates/about-page.php',
            'content'  => '<!-- wp:heading {"level":2} --><h2>Our Elite Mission</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Layunin is the premier platform for Filipino high-achievers seeking life mastery.</p><!-- /wp:paragraph -->'
        ),
        'Services' => array(
            'template' => 'templates/services-page.php',
            'content'  => '[pricing_table][pricing_item title="Strategy" price="₱4,999" features="Audit|Map|Systems" link="#"][pricing_item title="Mastery" price="₱14,999" features="Mentorship|AI|Wealth" featured="yes" link="#"][pricing_item title="Architect" price="₱49,999" features="Global|Scale|Legacy" link="#"][/pricing_table]'
        ),
        'Contact' => array(
            'template' => 'templates/contact-page.php',
            'content'  => '<!-- wp:paragraph --><p>Ready to architect your journey? Connect with our team of specialists today.</p><!-- /wp:paragraph -->'
        ),
        'Shop' => array(
            'template' => 'templates/shop-page.php',
            'content'  => '<!-- wp:paragraph --><p>Explore our high-performance digital assets and architectural frameworks.</p><!-- /wp:paragraph -->'
        ),
        'Free Resources' => array(
            'template' => 'templates/free-resources-page.php',
            'content'  => '<!-- wp:paragraph --><p>Access the knowledge vault and accelerate your path to mastery.</p><!-- /wp:paragraph -->'
        ),
        'Testimonials' => array(
            'template' => 'templates/testimonials-page.php',
            'content'  => '<!-- wp:paragraph --><p>Proof of the Layunin transformation framework in action.</p><!-- /wp:paragraph -->'
        ),
        'Lead Magnet' => array(
            'template' => 'templates/lead-magnet-landing.php',
            'content'  => '<!-- wp:paragraph --><p>Download the Elite 7-Day Goal Reset Protocol and reclaim your time.</p><!-- /wp:paragraph -->'
        ),
        'Thank You' => array(
            'template' => 'templates/thank-you-page.php',
            'content'  => '<!-- wp:paragraph --><p>Your transformation has begun. Check your inbox for the protocol.</p><!-- /wp:paragraph -->'
        ),
        'Affiliate Disclosure' => array(
            'template' => 'templates/affiliate-disclosure.php',
            'content'  => '<!-- wp:paragraph --><p>Our commitment to transparency and elite tool recommendations.</p><!-- /wp:paragraph -->'
        ),
        'Privacy Policy' => array(
            'template' => 'templates/privacy-policy.php',
            'content'  => '<!-- wp:paragraph --><p>Your data security is paramount in the pursuit of mastery.</p><!-- /wp:paragraph -->'
        ),
        'Terms' => array(
            'template' => 'templates/terms.php',
            'content'  => '<!-- wp:paragraph --><p>The standards of excellence for the Layunin community.</p><!-- /wp:paragraph -->'
        ),
        'FAQs' => array(
            'template' => '',
            'content'  => '[faq_page][faq_item question="What is the Layunin Framework?"]It is a modular system for life re-engineering.[/faq_item][faq_item question="How do I join the Elite Network?"]Start with the 7-Day Protocol.[/faq_item][/faq_page]'
        )
    );

    foreach ( $pages as $title => $data ) {
        $check = get_page_by_title( $title );
        if ( ! $check || $is_trigger ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $title,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'page_template' => $data['template']
            ) );
        }
    }

    // Seed sample CPT data
    layunin_seed_sample_cpts();

    // Reset trigger
    if ( $is_trigger ) {
        set_theme_mod( 'recreate_pages_trigger', false );
    }
    update_option( 'layunin_pages_created', true );
}
add_action( 'admin_init', 'layunin_create_recommended_pages' );

function layunin_seed_sample_cpts() {
    // Seed Testimonials
    $testimonials = array(
        array('title' => 'Katrina Reyes', 'content' => 'The systems gave me my life back.', 'role' => 'Founder'),
        array('title' => 'Mark Dizon', 'content' => 'I tripled my output in 30 days.', 'role' => 'Executive'),
    );
    foreach($testimonials as $t) {
        if(!get_page_by_title($t['title'], OBJECT, 'testimonial')) {
            $tid = wp_insert_post(array('post_title' => $t['title'], 'post_content' => $t['content'], 'post_type' => 'testimonial', 'post_status' => 'publish'));
            update_post_meta($tid, '_testimonial_role', $t['role']);
        }
    }

    // Seed Resources
    $resources = array(
        array('title' => 'Elite Goal Tracker', 'desc' => 'High-output excel framework', 'type' => 'Planner'),
        array('title' => 'AI Prompt Bible', 'desc' => '200+ prompts for productivity', 'type' => 'Vault'),
    );
    foreach($resources as $r) {
        if(!get_page_by_title($r['title'], OBJECT, 'resource')) {
            $rid = wp_insert_post(array('post_title' => $r['title'], 'post_content' => $r['desc'], 'post_type' => 'resource', 'post_status' => 'publish'));
            update_post_meta($rid, '_resource_type', $r['type']);
        }
    }
}
