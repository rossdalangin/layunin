<?php
/**
 * Layunin Theme Customizer - Definitive Ultimate (v8.5)
 * 100% manageable Customizer registration for every single site section and page content.
 */

function layunin_customize_register( $wp_customize ) {

	// --- 1. CORE DESIGN SYSTEM ---
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Elite Design System', 'priority' => 10 ) );
    $wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );
    $wp_customize->add_setting( 'primary_color', array( 'default' => '#0A192F', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Navy', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Gold', 'section' => 'colors' ) ) );
    $wp_customize->add_setting( 'border_radius', array( 'default' => '12', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

	// --- 2. HEADER & NAVIGATION ---
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header & Navigation', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Elite', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    // --- 3. HOMEPAGE MASTER ENGINE ---
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Mastery', 'priority' => 30 ) );

	// Visibility
	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('hero', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// Sections registration
	// 1. Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => '1. Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Turn Your Ambitions Into Precise Action', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Main Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We help Filipinos transform their purpose into clear action, real income, and lasting success.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );

    // 2. Trust Badges
	$wp_customize->add_section( 'layunin_home_trust', array( 'title' => '2. Trust Badges', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'trust_badges_title', array( 'default' => 'Trusted By Forward-Thinking Filipinos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'trust_badges_title', array( 'label' => 'Title', 'section' => 'layunin_home_trust' ) );
	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "trust_badge_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "trust_badge_{$i}", array( 'label' => "Badge $i", 'section' => 'layunin_home_trust' ) ) );
	}

    // 3. Process
	$wp_customize->add_section( 'layunin_home_process', array( 'title' => '3. Process Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'process_title', array( 'default' => 'The Layunin Method', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Title', 'section' => 'layunin_home_process' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => "Step $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'layunin_home_process' ) );
		$wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => "Strategic phase details...", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'layunin_home_process' ) );
	}

    // 4. Features
	$wp_customize->add_section( 'layunin_home_features', array( 'title' => '4. Features Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'features_title', array( 'default' => 'Why Choose Layunin?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Title', 'section' => 'layunin_home_features' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "feature_{$i}_title", array( 'default' => "Feature $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature $i Title", 'section' => 'layunin_home_features' ) );
		$wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => "Elite benefit details...", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature $i Description", 'section' => 'layunin_home_features' ) );
	}

    // 5. Problem
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => '5. Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Why Most Potential Stays Locked', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Title', 'section' => 'layunin_home_problem' ) );

	// 6. Solution
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => '6. Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'The Layunin Transformation Framework', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We provide the roadmap and tools...', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: Defining your 'Layunin'.\nSystems: Modular frameworks.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullets (Key: Value)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'solution_image', array( 'label' => 'Image', 'section' => 'layunin_home_solution' ) ) );

	// 7. Categories
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => '7. Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Mastery Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
    $wp_customize->add_setting( 'categories_desc', array( 'default' => 'Practical guidance for every step of your journey.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Description', 'section' => 'layunin_home_categories' ) );
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => "Focus Area $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category $i Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category $i Icon", 'section' => 'layunin_home_categories' ) );
	}

    // 8. Lead Magnet
    $wp_customize->add_section( 'layunin_home_lm', array( 'title' => '8. Lead Magnet Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'lm_title', array( 'default' => 'The 7-Day Goal Reset Guide', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'lm_title', array( 'label' => 'Title', 'section' => 'layunin_home_lm' ) );

	// 9. Products
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => '9. Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Accelerate Your Success', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Title', 'section' => 'layunin_home_products' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "product_item_{$i}_title", array( 'default' => "Product $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_price", array( 'default' => '₱999', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => 'layunin_home_products' ) );
        $wp_customize->add_setting( "product_item_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "product_item_{$i}_image", array( 'label' => "Product $i Image", 'section' => 'layunin_home_products' ) ) );
        $wp_customize->add_setting( "product_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "product_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => 'layunin_home_products' ) );
	}

    // 10. Services
    $wp_customize->add_section( 'layunin_home_services', array( 'title' => '10. Services Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'services_home_title', array( 'default' => 'Elite Guidance Systems', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_home_title', array( 'label' => 'Title', 'section' => 'layunin_home_services' ) );

	// 11. Testimonials
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => '11. Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => 'Layunin changed how I approach my career. I finally have the clarity I\'ve been seeking for years.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Main Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author Name', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Founder', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_image', array( 'label' => 'Author Image', 'section' => 'layunin_home_testimonials' ) ) );

    // 12. Final CTA
    $wp_customize->add_section( 'layunin_home_final', array( 'title' => '12. Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Your future starts with one decision.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Title', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'Stop dreaming and start building.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final', 'type' => 'textarea' ) );

    // --- 4. PAGE CONTENT MANAGEMENT ---
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Content Management', 'priority' => 40 ) );
	$pages = array(
        'about' => 'About', 'services' => 'Services', 'contact' => 'Contact',
        'shop' => 'Shop', 'free_resources' => 'Free Resources', 'testimonials' => 'Testimonials'
    );
	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label . ' Page', 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
        $wp_customize->add_setting( "{$id}_content", array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        if($id == 'about') {
            for($i=1; $i<=3; $i++) {
                $wp_customize->add_setting( "team_member_{$i}_name", array( 'default' => "Expert $i", 'sanitize_callback' => 'sanitize_text_field' ) );
                $wp_customize->add_control( "team_member_{$i}_name", array( 'label' => "Member $i Name", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_role", array( 'default' => 'Mastery Specialist', 'sanitize_callback' => 'sanitize_text_field' ) );
                $wp_customize->add_control( "team_member_{$i}_role", array( 'label' => "Member $i Role", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "team_member_{$i}_image", array( 'label' => "Member $i Photo", 'section' => "layunin_page_{$id}" ) ) );
            }
        }
	}

    // --- 5. FOOTER OPTIONS ---
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Footer Mastery', 'priority' => 50 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Empowering Filipinos with elite tools and systems.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright', 'section' => 'layunin_footer_options' ) );

	// --- 6. SITE AUTOMATION ---
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Master Setup', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Initialize Elite Site Ecosystem', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
