<?php
/**
 * terminal Supreme Page Creator and CPT Seeding (v8.2)
 */

function layunin_create_recommended_pages() {
    $trigger = get_theme_mod( 'recreate_pages_trigger', false );
    if ( ! $trigger && did_action( 'customize_save_after' ) ) {
        return;
    }

    $pages = array(
        'about' => array(
            'title'    => 'The Mastery Mission',
            'template' => 'templates/about-page.php',
            'content'  => "Our mission is to provide the world-class tools and elite guidance needed to transform Filipino potential into measurable success."
        ),
        'services' => array(
            'title'    => 'Elite Guidance Systems',
            'template' => 'templates/services-page.php',
            'content'  => "[pricing_table]\n[pricing_item title='Strategic Audit' price='₱5,000' features='Deep Goal Analysis | 30-Day Action Plan']\n[/pricing_table]"
        ),
        'contact' => array('title' => 'Strategic Connection', 'template' => 'templates/contact-page.php', 'content' => 'Ready to level up?'),
        'shop' => array('title' => 'The Asset Library', 'template' => 'templates/shop-page.php', 'content' => 'Premium tools.'),
        'free-resources' => array('title' => 'Success Accelerator', 'template' => 'templates/free-resources-page.php', 'content' => 'Free tools.'),
        'testimonials' => array('title' => 'Wall of Mastery', 'template' => 'templates/testimonials-page.php', 'content' => 'Real results.'),
    );

    foreach ( $pages as $slug => $data ) {
        $query = new WP_Query( array( 'post_type' => 'page', 'name' => $slug ) );
        if ( ! $query->have_posts() ) {
            $page_id = wp_insert_post( array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_content' => $data['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ) );
            if ( $page_id ) {
                update_post_meta( $page_id, '_wp_page_template', $data['template'] );
                // Seed the Customizer setting for this page too
                set_theme_mod( str_replace('-', '_', $slug) . '_content', $data['content'] );
            }
        }
    }

    layunin_seed_sample_cpts();

    if ( $trigger ) set_theme_mod( 'recreate_pages_trigger', false );
}

function layunin_seed_sample_cpts() {
    $testimonials = array(
        array('title' => 'Maria Santos', 'content' => 'The system-building session was a game-changer.', 'role' => 'Founder, Digital Elite'),
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
