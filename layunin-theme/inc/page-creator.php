<?php
/**
 * Elite Site Ecosystem - v9.6 Refinement
 */

function layunin_create_recommended_pages() {
    $is_trigger = get_theme_mod( 'recreate_pages_trigger', false );

    if ( ! $is_trigger && get_option( 'layunin_pages_created' ) ) {
        return;
    }

    $pages = array(
        'Home' => array(
            'template' => 'front-page.php',
            'content'  => ''
        ),
        'About' => array(
            'template' => 'templates/about-page.php',
            'content'  => '<!-- wp:paragraph --><p>Our journey began with a simple observation: Filipinos are among the most hard-working people on the planet, yet many are trapped in systems that don\'t scale. Layunin is the antidote to that friction.</p><!-- /wp:paragraph -->'
        ),
        'Services' => array(
            'template' => 'templates/services-page.php',
            'content'  => '<!-- wp:paragraph --><p>Select the level of implementation that aligns with your current growth trajectory. Each protocol is designed for maximum strategic impact.</p><!-- /wp:paragraph -->'
        ),
        'Contact' => array(
            'template' => 'templates/contact-page.php',
            'content'  => '<!-- wp:paragraph --><p>Ready to architect your journey? Connect with our team of specialists today to initiate your protocol.</p><!-- /wp:paragraph -->'
        ),
        'Shop' => array(
            'template' => 'templates/shop-page.php',
            'content'  => '<!-- wp:paragraph --><p>Explore our high-performance digital assets and architectural frameworks designed for the modern Filipino achiever.</p><!-- /wp:paragraph -->'
        ),
        'Free Resources' => array(
            'template' => 'templates/free-resources-page.php',
            'content'  => '<!-- wp:paragraph --><p>Access the knowledge vault and accelerate your path to mastery with our complimentary high-output guides.</p><!-- /wp:paragraph -->'
        ),
        'Testimonials' => array(
            'template' => 'templates/testimonials-page.php',
            'content'  => '<!-- wp:paragraph --><p>Proof of the Layunin transformation framework in action. See how others have architected their lives.</p><!-- /wp:paragraph -->'
        ),
        'Lead Magnet' => array(
            'template' => 'templates/lead-magnet-landing.php',
            'content'  => '<!-- wp:paragraph --><p>Download the Elite 7-Day Goal Reset Protocol and reclaim your time today. Join 25,000+ others.</p><!-- /wp:paragraph -->'
        ),
        'Thank You' => array(
            'template' => 'templates/thank-you.php',
            'content'  => '<!-- wp:paragraph --><p>Your transformation has begun. Check your inbox for the protocol and next-phase instructions.</p><!-- /wp:paragraph -->'
        ),
        'Affiliate Disclosure' => array(
            'template' => 'templates/affiliate-disclosure.php',
            'content'  => '<!-- wp:paragraph --><p>Transparency is a core value. We only recommend elite tools we use ourselves in our own mastery journeys.</p><!-- /wp:paragraph -->'
        ),
        'Privacy Policy' => array(
            'template' => 'templates/privacy-policy.php',
            'content'  => '<!-- wp:paragraph --><p>Your data security is paramount. We use industry-standard encryption to protect the community.</p><!-- /wp:paragraph -->'
        ),
        'Terms' => array(
            'template' => 'templates/terms.php',
            'content'  => '<!-- wp:paragraph --><p>The standards of excellence for the Layunin community. Excellence is our only baseline.</p><!-- /wp:paragraph -->'
        ),
        'Blog' => array(
            'template' => '',
            'content'  => '<!-- wp:paragraph --><p>Strategic insights and case studies for the pursuit of mastery.</p><!-- /wp:paragraph -->'
        ),
        'FAQs' => array(
            'template' => '',
            'content'  => '[faq_page][faq_item question="What is the Layunin Framework?"]It is a modular system for life re-engineering and output optimization.[/faq_item][faq_item question="How do I join the Elite Network?"]Start with the 7-Day Protocol and join our mailing list.[/faq_item][/faq_page]'
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

            // Set Home and Blog pages
            if($title == 'Home') update_option('show_on_front', 'page');
            if($title == 'Home') update_option('page_on_front', $page_id);
            if($title == 'Blog') update_option('page_for_posts', $page_id);
        }
    }

    layunin_seed_sample_cpts();

    if ( $is_trigger ) {
        set_theme_mod( 'recreate_pages_trigger', false );
    }
    update_option( 'layunin_pages_created', true );
}
add_action( 'admin_init', 'layunin_create_recommended_pages' );

function layunin_seed_sample_cpts() {
    $testimonials = array(
        array('title' => 'Dr. Katrina Reyes', 'content' => 'The systems I learned through Layunin didn\'t just increase my income; they gave me my life back. I finally feel like I\'m living my true "Layunin".', 'role' => 'Global Entrepreneur'),
        array('title' => 'Mark Dizon', 'content' => 'I tripled my output in 30 days. The AI integration protocols are absolute game-changers for my agency.', 'role' => 'Tech Founder'),
    );
    foreach($testimonials as $t) {
        if(!get_page_by_title($t['title'], OBJECT, 'testimonial')) {
            $tid = wp_insert_post(array('post_title' => $t['title'], 'post_content' => $t['content'], 'post_type' => 'testimonial', 'post_status' => 'publish'));
            update_post_meta($tid, '_testimonial_role', $t['role']);
        }
    }

    $resources = array(
        array('title' => 'The Master Planner', 'desc' => 'High-output excel framework for life audit.', 'type' => 'Elite Protocol'),
        array('title' => 'AI Prompt Vault', 'desc' => '200+ prompts for creative productivity.', 'type' => 'Strategic Tool'),
    );
    foreach($resources as $r) {
        if(!get_page_by_title($r['title'], OBJECT, 'resource')) {
            $rid = wp_insert_post(array('post_title' => $r['title'], 'post_content' => $r['desc'], 'post_type' => 'resource', 'post_status' => 'publish'));
            update_post_meta($rid, '_resource_type', $r['type']);
        }
    }
}
