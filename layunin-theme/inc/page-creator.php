<?php
/**
 * terminal Supreme Page Creator and CPT Seeding (v7.0)
 */

function layunin_create_recommended_pages() {
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'customize_save_after' ) ) {
        return;
    }

    $pages = array(
        'home' => array('title' => 'Home', 'template' => 'front-page.php'),
        'about' => array('title' => 'The Mastery Mission', 'template' => 'templates/about-page.php'),
        'services' => array('title' => 'Elite Guidance Systems', 'template' => 'templates/services-page.php'),
        'contact' => array('title' => 'Strategic Connection', 'template' => 'templates/contact-page.php'),
        'shop' => array('title' => 'The Asset Library', 'template' => 'templates/shop-page.php'),
        'free-resources' => array('title' => 'Success Accelerator', 'template' => 'templates/free-resources-page.php'),
        'testimonials' => array('title' => 'Wall of Mastery', 'template' => 'templates/testimonials-page.php'),
    );

    foreach ( $pages as $slug => $data ) {
        $query = new WP_Query( array( 'post_type' => 'page', 'name' => $slug ) );
        if ( ! $query->have_posts() ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => '<!-- wp:paragraph --><p>Welcome to ' . $data['title'] . '. Elite content is being prepared for your growth journey.</p><!-- /wp:paragraph -->',
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
    );
    foreach ($testimonials as $t) {
        $query = new WP_Query( array( 'post_type' => 'testimonial', 'title' => $t['title'] ) );
        if ( ! $query->have_posts() ) {
            $id = wp_insert_post( array( 'post_title' => $t['title'], 'post_content' => $t['content'], 'post_status' => 'publish', 'post_type' => 'testimonial' ) );
            if ($id) update_post_meta( $id, '_testimonial_role', $t['role'] );
        }
    }
}

add_action( 'after_switch_theme', 'layunin_create_recommended_pages' );
add_action( 'customize_save_after', 'layunin_create_recommended_pages' );
