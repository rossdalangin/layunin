<?php
/**
 * Layunin Theme Customizer - Absolute Masterpiece (v9.2)
 * 100% manageable Customizer registration for every single site section.
 */

function layunin_customize_register( $wp_customize ) {

	// --- 1. CORE DESIGN SYSTEM ---
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Elite Design System', 'priority' => 10 ) );

    $wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );

    $wp_customize->add_setting( 'primary_color', array( 'default' => '#0A192F', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Navy', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Gold', 'section' => 'colors' ) ) );

    $wp_customize->add_setting( 'border_radius', array( 'default' => '12', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

    // Category Colors
    $wp_customize->add_section( 'layunin_category_colors', array( 'title' => 'Category Colors', 'priority' => 12 ) );
	$cats = array('Goal Setting', 'Online Income', 'Productivity', 'AI Tools', 'Mindset', 'Business', 'Success Stories');
	foreach($cats as $cat) {
		$cat_id = sanitize_title($cat);
		$wp_customize->add_setting( "color_cat_{$cat_id}", array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "color_cat_{$cat_id}", array( 'label' => $cat . ' Color', 'section' => 'layunin_category_colors' ) ) );
	}

	// --- 2. HEADER & ANNOUNCEMENT ---
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header & Navigation', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Elite', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    $wp_customize->add_section( 'layunin_announcement', array( 'title' => 'Announcement Bar', 'priority' => 20 ) );
    $wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_announcement', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'EXCLUSIVE: Claim Your Free 7-Day Goal Reset Guide & Transform Your Life!', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_announcement', 'type' => 'text' ) );
    $wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_announcement', 'type' => 'text' ) );

    // --- 3. HOMEPAGE MASTER ENGINE ---
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );

	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('hero', 'featured_posts', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// 1. Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => '1. Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Turn Your Ambitions Into Precise Action', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Main Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We provide the systems, AI productivity tools, and elite guidance to help Filipinos bridge the gap.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Start My Journey', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'Primary Button Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'Explore Our Methods', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'Secondary Button Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_social_proof', array( 'default' => 'Joined by 10,000+ Filipino High-Achievers', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_social_proof', array( 'label' => 'Social Proof Text', 'section' => 'layunin_home_hero' ) );

    // 1.5 Featured Posts
    $wp_customize->add_section( 'layunin_home_featured_posts', array( 'title' => '1.5 Featured Posts', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'featured_posts_title', array( 'default' => "Editor's Picks", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'featured_posts_title', array( 'label' => 'Title', 'section' => 'layunin_home_featured_posts' ) );

	// 2. Trust Badges
	$wp_customize->add_section( 'layunin_home_trust', array( 'title' => '2. Trust Badges', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'trust_badges_title', array( 'default' => 'Trusted By Forward-Thinking Filipinos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'trust_badges_title', array( 'label' => 'Title', 'section' => 'layunin_home_trust' ) );
	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "trust_badge_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "trust_badge_{$i}", array( 'label' => "Badge $i", 'section' => 'layunin_home_trust' ) ) );
	}

	// 3. Process
	$wp_customize->add_section( 'layunin_home_process', array( 'title' => '3. Process Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'process_title', array( 'default' => 'How Layunin Works', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Title', 'section' => 'layunin_home_process' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => "Step $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'layunin_home_process' ) );
		$wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => "Description of step $i...", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'layunin_home_process' ) );
	}

	// 4. Features
	$wp_customize->add_section( 'layunin_home_features', array( 'title' => '4. Features Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'features_title', array( 'default' => 'Why Choose Layunin?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Title', 'section' => 'layunin_home_features' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "feature_{$i}_title", array( 'default' => "Feature $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature $i Title", 'section' => 'layunin_home_features' ) );
		$wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => "Benefit description...", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature $i Description", 'section' => 'layunin_home_features' ) );
	}

	// 5. Problem
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => '5. Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Why Most Potential Stays Locked', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Title', 'section' => 'layunin_home_problem' ) );
    for($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "problem_item_{$i}_title", array( 'default' => "Problem $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "problem_item_{$i}_title", array( 'label' => "Problem $i Title", 'section' => 'layunin_home_problem' ) );
        $wp_customize->add_setting( "problem_item_{$i}_desc", array( 'default' => "Problem description...", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "problem_item_{$i}_desc", array( 'label' => "Problem $i Description", 'section' => 'layunin_home_problem', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "problem_item_{$i}_icon", array( 'default' => "fas fa-exclamation-triangle", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "problem_item_{$i}_icon", array( 'label' => "Problem $i Icon (FontAwesome)", 'section' => 'layunin_home_problem' ) );
    }

	// 6. Solution
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => '6. Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'The Layunin Transformation Framework', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We provide the roadmap and tools...', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: Defining your 'Layunin'.\nSystems: Modular frameworks.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullets (Key: Value)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'solution_image', array( 'label' => 'Image', 'section' => 'layunin_home_solution' ) ) );

	// 7. Categories
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => '7. Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Mastery Areas', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
    $wp_customize->add_setting( 'categories_desc', array( 'default' => 'Practical guidance for every step.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Description', 'section' => 'layunin_home_categories' ) );
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => "Category $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category $i Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category $i Icon", 'section' => 'layunin_home_categories' ) );
	}

    // 8. Lead Magnet
    $wp_customize->add_section( 'layunin_home_lm', array( 'title' => '8. Lead Magnet Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'lm_title', array( 'default' => 'The 7-Day Goal Reset Guide', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_title', array( 'label' => 'Title', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_subtitle', array( 'default' => 'Ready to stop procrastinating and start producing?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_subtitle', array( 'label' => 'Subtitle', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_list', array( 'default' => "How to define your 'Layunin' in 10 minutes\nThe AI tools for 3x productivity\n3 daily habits of high achievers", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_list', array( 'label' => 'Benefit List (one per line)', 'section' => 'layunin_home_lm', 'type' => 'textarea' ) );

	// 9. Products
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => '9. Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Accelerate Your Success', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Title', 'section' => 'layunin_home_products' ) );
    $wp_customize->add_setting( 'products_desc', array( 'default' => 'Tools designed for the modern Filipino achiever.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'products_desc', array( 'label' => 'Description', 'section' => 'layunin_home_products' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "product_item_{$i}_title", array( 'default' => "Product $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "product_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_price", array( 'default' => '₱999', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "product_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => 'layunin_home_products' ) );
        $wp_customize->add_setting( "product_item_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "product_item_{$i}_image", array( 'label' => "Product $i Image", 'section' => 'layunin_home_products' ) ) );
        $wp_customize->add_setting( "product_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "product_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => 'layunin_home_products' ) );
	}

    // 10. Services
    $wp_customize->add_section( 'layunin_home_services', array( 'title' => '10. Services Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'services_home_title', array( 'default' => 'Elite Guidance Systems', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'services_home_title', array( 'label' => 'Title', 'section' => 'layunin_home_services' ) );
    for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "service_item_{$i}_title", array( 'default' => "Service $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "service_item_{$i}_title", array( 'label' => "Service $i Title", 'section' => 'layunin_home_services' ) );
        $wp_customize->add_setting( "service_item_{$i}_desc", array( 'default' => "Service description...", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "service_item_{$i}_desc", array( 'label' => "Service $i Description", 'section' => 'layunin_home_services', 'type' => 'textarea' ) );
		$wp_customize->add_setting( "service_item_{$i}_icon", array( 'default' => 'fas fa-briefcase', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_item_{$i}_icon", array( 'label' => "Service $i Icon", 'section' => 'layunin_home_services' ) );
	}

	// 11. Testimonials
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => '11. Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => 'Layunin changed how I approach my career...', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Main Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author Name', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Founder', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_image', array( 'label' => 'Author Image', 'section' => 'layunin_home_testimonials' ) ) );

    // 12. Final CTA
    $wp_customize->add_section( 'layunin_home_final', array( 'title' => '12. Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Your future starts with one decision.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Title', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'Stop dreaming and start building.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'final_cta_1_text', array( 'default' => 'Join the Community', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_1_text', array( 'label' => 'Button 1 Text', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_2_text', array( 'default' => 'Explore Resources', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_2_text', array( 'label' => 'Button 2 Text', 'section' => 'layunin_home_final' ) );

    // --- 3.5 LEAD POPUP ---
    $wp_customize->add_section( 'layunin_lead_popup', array( 'title' => 'Lead Popup', 'priority' => 35 ) );
    $wp_customize->add_setting( 'show_popup', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_popup', array( 'label' => 'Enable Exit-Intent Popup', 'section' => 'layunin_lead_popup', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'popup_title', array( 'default' => "Wait! Don't Miss Out", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_title', array( 'label' => 'Popup Title', 'section' => 'layunin_lead_popup' ) );
    $wp_customize->add_setting( 'popup_desc', array( 'default' => 'Get our "Free 7-Day Goal Reset Guide" and start taking action today.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_desc', array( 'label' => 'Popup Description', 'section' => 'layunin_lead_popup', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'popup_social_proof', array( 'default' => 'Join 5,000+ others pursuing their purpose.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_social_proof', array( 'label' => 'Popup Social Proof', 'section' => 'layunin_lead_popup' ) );

	// --- 4. SIDEBAR & MONETIZATION ---
    $wp_customize->add_section( 'layunin_sidebar_author', array( 'title' => 'Sidebar & Author', 'priority' => 42 ) );
    $wp_customize->add_setting( 'sidebar_bio_text', array( 'default' => 'Dedicated to helping Filipinos achieve their greatest Layunin.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_bio_text', array( 'label' => 'Sidebar Bio', 'section' => 'layunin_sidebar_author', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'sidebar_author_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sidebar_author_image', array( 'label' => 'Sidebar Author Photo', 'section' => 'layunin_sidebar_author' ) ) );
    $wp_customize->add_setting( 'author_facebook', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_facebook', array( 'label' => 'Author Facebook', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'author_twitter', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_twitter', array( 'label' => 'Author Twitter', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'author_linkedin', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_linkedin', array( 'label' => 'Author LinkedIn', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_title', array( 'default' => 'Goal Reset Guide', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_title', array( 'label' => 'Sidebar Newsletter Title', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_desc', array( 'default' => 'Reset your life and reclaim your purpose in just 7 days.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_desc', array( 'label' => 'Sidebar Newsletter Desc', 'section' => 'layunin_sidebar_author' ) );

    $wp_customize->add_section( 'layunin_monetization', array( 'title' => 'Monetization & Ads', 'priority' => 43 ) );
    $wp_customize->add_setting( 'banner_above_content', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_above_content', array( 'label' => 'Banner Above Post Content', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'banner_below_content', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_below_content', array( 'label' => 'Banner Below Post Content', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'affiliate_banner_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'affiliate_banner_url', array( 'label' => 'Global Affiliate Banner', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'monetization_newsletter_title', array( 'default' => 'Join the Layunin Community', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_title', array( 'label' => 'Widget Newsletter Title', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_newsletter_desc', array( 'default' => 'Get our weekly tips on personal growth and income delivered to your inbox.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_desc', array( 'label' => 'Widget Newsletter Desc', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_product_desc', array( 'default' => 'Take control of your life with our best-selling digital planner.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_product_desc', array( 'label' => 'Widget Product Desc', 'section' => 'layunin_monetization' ) );

    // --- 4.5 BLOG SETTINGS ---
    $wp_customize->add_section( 'layunin_blog_settings', array( 'title' => 'Blog & Post Details', 'priority' => 44 ) );
    $wp_customize->add_setting( 'show_author_box', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_author_box', array( 'label' => 'Show Author Box on Single Posts', 'section' => 'layunin_blog_settings', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'author_box_title', array( 'default' => 'About The Author', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'author_box_title', array( 'label' => 'Author Box Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'related_posts_title', array( 'default' => 'You Might Also Like', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'related_posts_title', array( 'label' => 'Related Posts Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'read_more_text', array( 'default' => 'Read More', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'read_more_text', array( 'label' => 'Read More Button Text', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nothing_found_title', array( 'default' => 'Nothing Found', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nothing_found_title', array( 'label' => 'No Results Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nothing_found_desc', array( 'default' => 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nothing_found_desc', array( 'label' => 'No Results Description', 'section' => 'layunin_blog_settings', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'toc_title', array( 'default' => 'Table of Contents', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'toc_title', array( 'label' => 'Table of Contents Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'breadcrumb_home_label', array( 'default' => 'Home', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'breadcrumb_home_label', array( 'label' => 'Breadcrumb Home Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nav_prev_label', array( 'default' => 'Previous Post', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nav_prev_label', array( 'label' => 'Post Nav Previous Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nav_next_label', array( 'default' => 'Next Post', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nav_next_label', array( 'label' => 'Post Nav Next Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'archive_older_label', array( 'default' => 'Older Posts', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'archive_older_label', array( 'label' => 'Pagination Older Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'archive_newer_label', array( 'default' => 'Newer Posts', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'archive_newer_label', array( 'label' => 'Pagination Newer Label', 'section' => 'layunin_blog_settings' ) );

	// --- 5. SOCIAL & SEO ---
    $wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 45 ) );
    $socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}
    $wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin helps Filipinos achieve their goals.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );

    // --- 6. PAGE CONTENT MANAGEMENT ---
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Management', 'priority' => 40 ) );
	$pages = array( 'about', 'services', 'contact', 'shop', 'free_resources', 'testimonials', 'lead_magnet_landing', 'thank_you', 'affiliate_disclosure', 'privacy_policy', 'terms', 'search_404' );
	foreach ( $pages as $id ) {
		$label = ucfirst(str_replace('_', ' ', $id)) . ' Page';
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );

        if($id == 'search_404') {
            $wp_customize->add_setting( 'error_404_title', array( 'default' => 'Are You Lost In Your Journey?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_title', array( 'label' => '404 Headline', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'error_404_desc', array( 'default' => "We couldn't find the page you're looking for. But don't worry, even high achievers sometimes take a wrong turn. Let's get you back on track.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_desc', array( 'label' => '404 Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'search_results_title', array( 'default' => 'Search Results for:', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'search_results_title', array( 'label' => 'Search Title Prefix', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'archive_title_prefix', array( 'default' => 'Exploring:', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'archive_title_prefix', array( 'label' => 'Archive Title Prefix', 'section' => "layunin_page_{$id}" ) );
        } else {
            $wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'about') {
            $wp_customize->add_setting( 'about_badge', array( 'default' => 'The Journey to Mastery', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'about_lead', array( 'default' => 'Empowering Filipinos to transform their purpose into clear action, real income, and lasting success.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_lead', array( 'label' => 'Lead Paragraph', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'about_visual', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_visual', array( 'label' => 'Main Visual', 'section' => "layunin_page_{$id}" ) ) );
            $wp_customize->add_setting( 'about_team_title', array( 'default' => 'Meet the Strategists', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_team_title', array( 'label' => 'Team Section Title', 'section' => "layunin_page_{$id}" ) );
            for($i=1; $i<=3; $i++) {
                $wp_customize->add_setting( "team_member_{$i}_name", array( 'default' => "Expert $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "team_member_{$i}_name", array( 'label' => "Member $i Name", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_role", array( 'default' => 'Mastery Specialist', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "team_member_{$i}_role", array( 'label' => "Member $i Role", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "team_member_{$i}_image", array( 'label' => "Member $i Photo", 'section' => "layunin_page_{$id}" ) ) );
            }
        }

        if($id == 'services') {
            $wp_customize->add_setting( 'services_badge', array( 'default' => 'Elite Guidance', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'services_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'contact') {
            $wp_customize->add_setting( 'contact_badge', array( 'default' => "Let's Connect", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_content', array( 'default' => 'Have questions about our resources, services, or your own growth journey? We are here to help.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_content', array( 'label' => 'Description Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'contact_email', array( 'default' => 'hello@layunin.com', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_email', array( 'label' => 'Contact Email', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_phone', array( 'default' => '+63 912 345 6789', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_phone', array( 'label' => 'Contact Phone', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_address', array( 'default' => 'Manila, Philippines', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_address', array( 'label' => 'Contact Address', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_map_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
            $wp_customize->add_control( 'contact_map_url', array( 'label' => 'Google Maps Embed URL', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'shop') {
            $wp_customize->add_setting( 'shop_badge', array( 'default' => 'Premium Assets', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_content', array( 'default' => 'Invest in your growth with our curated collection of digital products and frameworks.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_content', array( 'label' => 'Shop Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            for($i = 1; $i <= 6; $i++) {
                $wp_customize->add_setting( "shop_item_{$i}_title", array( 'default' => 'Digital Product ' . $i, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "shop_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "shop_item_{$i}_price", array( 'default' => '₱999', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "shop_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "shop_item_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "shop_item_{$i}_image", array( 'label' => "Product $i Image", 'section' => "layunin_page_{$id}" ) ) );
                $wp_customize->add_setting( "shop_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "shop_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'free_resources') {
            $wp_customize->add_setting( 'free_resources_badge', array( 'default' => 'Knowledge Library', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'free_resources_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'free_resources_content', array( 'default' => 'Free guides, planners, and templates designed to give you a head start in your personal and professional development.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'free_resources_content', array( 'label' => 'Resources Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            for($i = 1; $i <= 4; $i++) {
                $wp_customize->add_setting( "resource_{$i}_title", array( 'default' => 'Resource ' . $i, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "resource_{$i}_title", array( 'label' => "Resource $i Title", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_type", array( 'default' => 'Guide', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "resource_{$i}_type", array( 'label' => "Resource $i Type", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "resource_{$i}_link", array( 'label' => "Resource $i Link", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_icon", array( 'default' => 'fas fa-download', 'sanitize_callback' => 'sanitize_text_field' ) );
                $wp_customize->add_control( "resource_{$i}_icon", array( 'label' => "Resource $i Icon", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'testimonials') {
            $wp_customize->add_setting( 'testimonials_badge', array( 'default' => 'Wall of Love', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'testimonials_content', array( 'default' => 'See how members of the Layunin community have transformed their lives using our systems.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_content', array( 'label' => 'Testimonials Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'lead_magnet_landing') {
            $wp_customize->add_setting( 'lead_magnet_landing_title', array( 'default' => 'Free 7-Day Goal Reset', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lead_magnet_landing_title', array( 'label' => 'Landing Headline', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lead_magnet_content', array( 'default' => 'Stop dreaming about your goals and start building them. Our most popular resource provides a day-by-day framework to audit your life.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'lead_magnet_content', array( 'label' => 'Landing Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'lm_benefit_title', array( 'default' => "What's Inside This Guide:", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_benefit_title', array( 'label' => 'Benefit Section Title', 'section' => "layunin_page_{$id}" ) );
            for($i = 1; $i <= 3; $i++) {
                $wp_customize->add_setting( "lm_benefit_{$i}", array( 'default' => "Exclusive Strategy #{$i} for success", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "lm_benefit_{$i}", array( 'label' => "Benefit $i", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'thank_you') {
            $wp_customize->add_setting( 'thank_you_content', array( 'default' => 'Thank you for your interest. Please check your inbox for the link to your resource.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'thank_you_content', array( 'label' => 'Success Message', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'thank_you_next_title', array( 'default' => "What's Next?", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'thank_you_next_title', array( 'label' => 'Next Steps Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'thank_you_next_desc', array( 'default' => 'While you wait, why not check out our most popular articles?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'thank_you_next_desc', array( 'label' => 'Next Steps Desc', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'affiliate_disclosure') {
            $wp_customize->add_setting( 'affiliate_disclosure_content', array( 'default' => "In compliance with the FTC guidelines, please assume that any and all links on this website are affiliate links of which Layunin receives a small commission from sales of certain items, but the price is the same for you.\n\nLayunin is a participant in various affiliate programs designed to provide a means for sites to earn advertising fees by advertising and linking to partners.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'affiliate_disclosure_content', array( 'label' => 'Disclosure Text', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'privacy_policy') {
            $wp_customize->add_setting( 'privacy_policy_content', array( 'default' => "At Layunin, accessible from Layunin.com, one of our main priorities is the privacy of our visitors.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'privacy_policy_content', array( 'label' => 'Policy Text', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'terms') {
            $wp_customize->add_setting( 'terms_content', array( 'default' => "Welcome to Layunin! These terms and conditions outline the rules and regulations for the use of Layunin's Website.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'terms_content', array( 'label' => 'Terms Text', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }
	}

    // --- 7. FOOTER OPTIONS ---
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Elite Footer Settings', 'priority' => 50 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Empowering Filipinos with elite tools and systems.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'footer_col2_title', array( 'default' => 'Mastery', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_col2_title', array( 'label' => 'Column 2 Title', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_col3_title', array( 'default' => 'Resources', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_col3_title', array( 'label' => 'Column 3 Title', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_title', array( 'default' => 'Newsletter', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_desc', array( 'default' => 'Join 10,000+ subscribers for weekly high-output insights.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_desc', array( 'label' => 'Newsletter Desc', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'layunin_footer_options' ) );

	// --- 8. SITE AUTOMATION ---
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Master Setup', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Initialize Elite Site Ecosystem', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
