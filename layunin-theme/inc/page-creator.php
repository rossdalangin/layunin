<?php
/**
 * Automated Page Creation and CPT Seeding for Layunin Theme
 */

function layunin_create_recommended_pages() {
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'customize_save_after' ) ) {
        return;
    }

    $pages = array(
        'about' => array(
            'title'    => 'Our Story',
            'template' => 'templates/about-page.php',
            'content'  => "Layunin (Tagalog for Goal/Purpose) was born from a desire to see every Filipino thrive. We believe that with the right mindset, digital tools, and actionable guidance, anyone can bridge the gap between their current reality and their ultimate goals.\n\n<!-- wp:heading --><h2>Why We Do What We Do</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our mission is to democratize success by providing world-class systems to the local market. We focus on clarity, execution, and results.</p><!-- /wp:paragraph -->\n\n[benefit_list]\n[benefit_item title='Proven Frameworks' icon='fas fa-check']Systems that have helped 10k+ Filipinos achieve clarity.[/benefit_item]\n[benefit_item title='AI-Driven' icon='fas fa-robot']Leveraging modern AI tools for 3x productivity output.[/benefit_item]\n[benefit_item title='Filipino Focus' icon='fas fa-users']Tailored specifically for the unique challenges of the local market.[/benefit_item]\n[/benefit_list]"
        ),
        'services' => array(
            'title'    => 'Elite Guidance',
            'template' => 'templates/services-page.php',
            'content'  => "<!-- wp:paragraph --><p>Transform your goals into results with our professional guidance and high-impact systems.</p><!-- /wp:paragraph -->\n\n[pricing_table]\n[pricing_item title='Starter' price='₱4,999' features='Goal Audit | 30-Day Roadmap | Email Support']\n[pricing_item title='Professional' price='₱14,999' features='Complete System | AI Workflow | 1-on-1 Strategy Call' featured='yes']\n[pricing_item title='Elite' price='₱49,999' features='Bespoke Branding | Lifetime Resource Access | Partner Network']\n[/pricing_table]\n\n<!-- wp:heading --><h2>Frequently Asked Questions</h2><!-- /wp:heading -->\n[faq_page]\n[faq_item question='What results can I expect?']A clear, actionable roadmap and a functioning productivity system within 30 days.[/faq_item]\n[faq_item question='Is there a money-back guarantee?']Yes, we provide a 14-day satisfaction guarantee on all digital guidance packages.[/faq_item]\n[faq_item question='How do I start?']Simply choose a tier and book your introductory audit through the contact form.[/faq_item]\n[/faq_page]"
        ),
        'contact' => array(
            'title'    => 'Connect With Us',
            'template' => 'templates/contact-page.php',
            'content'  => "<!-- wp:paragraph --><p>Have questions about our resources, services, or your own growth journey? We are here to help. Reach out to the Layunin team today.</p><!-- /wp:paragraph -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\">\n<div class=\"wp-block-column\">\n<h3>Business Hours</h3>\n<p>Monday - Friday: 9:00 AM - 6:00 PM (PHT)<br>Saturday: 10:00 AM - 2:00 PM</p>\n</div>\n<div class=\"wp-block-column\">\n<h3>Inquiries</h3>\n<p>hello@layunin.com<br>+63 912 345 6789</p>\n</div>\n</div>\n<!-- /wp:columns -->"
        ),
        'free-resources' => array(
            'title'    => 'Success Library',
            'template' => 'templates/free-resources-page.php',
            'content'  => "<!-- wp:paragraph --><p>Knowledge is only power when applied. Download these free tools to accelerate your progress.</p><!-- /wp:paragraph -->"
        ),
        'shop' => array(
            'title'    => 'Premium Tools',
            'template' => 'templates/shop-page.php',
            'content'  => "<!-- wp:paragraph --><p>Invest in your future. Browse our curated collection of digital products and asset packs designed for peak performance.</p><!-- /wp:paragraph -->"
        ),
        'testimonials' => array(
            'title'    => 'Wall of Love',
            'template' => 'templates/testimonials-page.php',
            'content'  => "<!-- wp:paragraph --><p>See how members of the Layunin community have transformed their lives using our practical systems and strategies.</p><!-- /wp:paragraph -->"
        ),
        'lead-magnet' => array(
            'title'    => 'Free 7-Day Goal Reset',
            'template' => 'templates/lead-magnet-landing.php',
            'content'  => "<!-- wp:paragraph --><p>Feeling stuck? Reclaim your momentum with our most popular resource. A step-by-step framework to audit your life and achieve clarity.</p><!-- /wp:paragraph -->"
        ),
        'thank-you' => array(
            'title'    => 'Welcome To The Community',
            'template' => 'templates/thank-you.php',
            'content'  => "<!-- wp:paragraph --><p>Thank you for trusting Layunin. Your journey to a more purposeful life is officially underway. Check your email for your resources.</p><!-- /wp:paragraph -->"
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

    layunin_seed_sample_cpts();

    if ( $trigger ) {
        set_theme_mod( 'recreate_pages_trigger', false );
    }
}

function layunin_seed_sample_cpts() {
    $testimonials = array(
        array('title' => 'Maria Santos', 'content' => 'Layunin changed how I approach my career. I finally have the clarity I\'ve been seeking for years.', 'role' => 'Digital Freelancer'),
        array('title' => 'Juan Dela Cruz', 'content' => 'The systems are practical and the mindset shift is real. Best investment for my productivity.', 'role' => 'Business Owner'),
        array('title' => 'Elena Gomez', 'content' => 'I doubled my online income within 6 months of using the Layunin frameworks. Highly recommended!', 'role' => 'VA Specialist'),
    );

    foreach ($testimonials as $t) {
        $query = new WP_Query( array( 'post_type' => 'testimonial', 'title' => $t['title'], 'post_status' => 'publish' ) );
        if ( ! $query->have_posts() ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $t['title'],
                'post_content' => $t['content'],
                'post_status'  => 'publish',
                'post_type'    => 'testimonial',
            ) );
            if ($post_id) {
                update_post_meta( $post_id, '_testimonial_role', $t['role'] );
            }
        }
    }

    $resources = array(
        array('title' => 'Ultimate Goal Planner', 'content' => 'A comprehensive 50-page PDF planner to map your goals.', 'link' => '#', 'type' => 'PDF Guide'),
        array('title' => 'AI Prompt Directory', 'content' => 'Curated directory of prompts for business automation.', 'link' => '#', 'type' => 'Google Sheet'),
        array('title' => 'Productivity Audit', 'content' => 'Quick checklist to identify your time leaks.', 'link' => '#', 'type' => 'Checklist'),
    );

    foreach ($resources as $r) {
        $query = new WP_Query( array( 'post_type' => 'resource', 'title' => $r['title'], 'post_status' => 'publish' ) );
        if ( ! $query->have_posts() ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $r['title'],
                'post_content' => $r['content'],
                'post_status'  => 'publish',
                'post_type'    => 'resource',
            ) );
            if ($post_id) {
                update_post_meta( $post_id, '_resource_link', $r['link'] );
                update_post_meta( $post_id, '_resource_type', $r['type'] );
            }
        }
    }
}

add_action( 'after_switch_theme', 'layunin_create_recommended_pages' );
add_action( 'customize_save_after', 'layunin_create_recommended_pages' );
