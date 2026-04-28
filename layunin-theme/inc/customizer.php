<?php
/**
 * Layunin Theme Customizer - terminal Masterpiece Elite (v6.5)
 * 100% manageable Customizer registration for every site section.
 */

function layunin_customize_register( $wp_customize ) {

	// --- 1. CORE DESIGN SYSTEM ---
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Design System', 'priority' => 10 ) );
	$wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );
	$wp_customize->add_setting( 'primary_color', array( 'default' => '#0A192F', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Navy', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Gold', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'border_radius', array( 'default' => '12', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

	// --- 2. HEADER & BRANDING ---
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header Settings', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Claim Your Success', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'Header CTA Button Text', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'header_cta_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_link', array( 'label' => 'Header CTA Button Link', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    // --- 3. GLOBAL ELEMENTS ---
	$wp_customize->add_section( 'layunin_global_elements', array( 'title' => 'Global Elements', 'priority' => 20 ) );
	$wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_global_elements', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'EXCLUSIVE: Claim Your Free 7-Day Goal Reset Guide & Transform Your Life!', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_global_elements', 'type' => 'text' ) );
	$wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_global_elements', 'type' => 'text' ) );

	// --- 4. HOMEPAGE PANELS & SECTIONS ---
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );

	// Visibility Toggle
	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('hero', 'featured_posts', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// Hero Section
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => '1. Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Turn Your Ambitions Into Clear Action', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We provide the systems, AI tools, and professional guidance to help you bridge the gap.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Start My Journey', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'Primary CTA Button Text', 'section' => 'layunin_home_hero' ) );

    // Problem Section
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => '2. Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Is Your Potential Being Held Back?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Title', 'section' => 'layunin_home_problem' ) );

    // Solution Section
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => '3. Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'How Layunin Transforms Your Life', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We provide the roadmap and the tools you need to bridge the gap between where you are and where you want to be.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: We help you define your 'Layunin' with precision.\nSystems: Proven frameworks for productivity.\nTools: Digital resources and AI assets.\nAccountability: Guidance to keep you moving.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullet Points (one per line)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );

    // Categories Section
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => '4. Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Focus Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
    $wp_customize->add_setting( 'categories_desc', array( 'default' => 'Practical guidance for every step of your journey.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Description', 'section' => 'layunin_home_categories' ) );
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => "Category $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category $i Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category $i Icon", 'section' => 'layunin_home_categories' ) );
	}

    // Lead Magnet Section
	$wp_customize->add_section( 'layunin_home_lead_magnet', array( 'title' => '5. Lead Magnet Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'lm_title', array( 'default' => 'The 7-Day Goal Reset Guide', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'lm_title', array( 'label' => 'Lead Magnet Title', 'section' => 'layunin_home_lead_magnet' ) );

    // Products Section
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => '6. Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Accelerate Your Success', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Title', 'section' => 'layunin_home_products' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "product_item_{$i}_title", array( 'default' => "Product $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_price", array( 'default' => '₱999', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => 'layunin_home_products' ) );
	}

    // Services Section
	$wp_customize->add_section( 'layunin_home_services', array( 'title' => '7. Services Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'services_home_title', array( 'default' => 'Work With Us', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_home_title', array( 'label' => 'Title', 'section' => 'layunin_home_services' ) );

    // Testimonials Section
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => '8. Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => 'Layunin changed how I approach my career. I finally have the clarity I\'ve been seeking for years.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author Name', 'section' => 'layunin_home_testimonials' ) );
	$wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Digital Freelancer', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );

    // Final CTA Section
	$wp_customize->add_section( 'layunin_home_final_cta', array( 'title' => '9. Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Your future starts with one decision.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Headline', 'section' => 'layunin_home_final_cta' ) );
	$wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'Stop dreaming about your goals and start building them.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final_cta', 'type' => 'textarea' ) );

    // Process Section
    $wp_customize->add_section( 'layunin_home_process', array( 'title' => 'Process (Internal)', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'process_title', array( 'default' => 'How Layunin Works', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Title', 'section' => 'layunin_home_process' ) );
    for($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => 'Step ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'layunin_home_process' ) );
        $wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => 'Description...', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step $i Desc", 'section' => 'layunin_home_process' ) );
    }

    // Features Section
    $wp_customize->add_section( 'layunin_home_features', array( 'title' => 'Features (Internal)', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'features_title', array( 'default' => 'Why Choose Layunin?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Title', 'section' => 'layunin_home_features' ) );
    for($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "feature_{$i}_title", array( 'default' => 'Benefit ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature $i Title", 'section' => 'layunin_home_features' ) );
        $wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => 'How this helps you...', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature $i Desc", 'section' => 'layunin_home_features' ) );
    }

    // Trust Badges Section
	$wp_customize->add_section( 'layunin_trust_badges', array( 'title' => 'Trust Badges', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'trust_badges_title', array( 'default' => 'Trusted By Forward-Thinking Filipinos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'trust_badges_title', array( 'label' => 'Title', 'section' => 'layunin_trust_badges' ) );
	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "trust_badge_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "trust_badge_{$i}", array( 'label' => "Badge $i", 'section' => 'layunin_trust_badges' ) ) );
	}

	// --- 5. PAGE CONTENT CONTROL PANEL ---
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Content Management', 'priority' => 40 ) );
	$pages = array(
		'about' => 'About Page',
		'services' => 'Services Page',
		'contact' => 'Contact Page',
		'shop' => 'Shop Page',
		'testimonials' => 'Testimonials Page',
	);
	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
	}

    // --- 6. FOOTER OPTIONS ---
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Footer Settings', 'priority' => 42 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Helping Filipinos transform their goals into action, income, and success through practical systems and AI productivity tools.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Footer Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_trust_statement', array( 'default' => 'Built with purpose for the modern Filipino achiever.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_trust_statement', array( 'label' => 'Footer Trust Statement', 'section' => 'layunin_footer_options' ) );

	// --- 7. AUTOMATION ---
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Initialize Recommended Pages', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

/**
 * Live preview JS
 */
function layunin_customize_preview_init() {
	wp_enqueue_script( 'layunin-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'layunin_customize_preview_init' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
