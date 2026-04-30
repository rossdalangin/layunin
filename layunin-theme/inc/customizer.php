<?php
/**
 * Layunin Theme Customizer - Absolute Masterpiece (v9.6)
 * Total Content Coverage & Section Refinement
 */

function layunin_customize_register( $wp_customize ) {

	// --- 1. CORE DESIGN SYSTEM ---
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Elite Design System', 'priority' => 10 ) );

    $wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );

    $wp_customize->add_setting( 'heading_font', array( 'default' => 'Playfair Display', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'heading_font', array( 'label' => 'Heading Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Playfair Display' => 'Playfair Display', 'Inter' => 'Inter', 'Montserrat' => 'Montserrat') ) );

    $wp_customize->add_setting( 'primary_color', array( 'default' => '#050A18', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Midnight', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#C5A02B', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Elite Gold', 'section' => 'colors' ) ) );

    $wp_customize->add_setting( 'border_radius', array( 'default' => '16', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

    // Category Colors
    $wp_customize->add_section( 'layunin_category_colors', array( 'title' => 'Category Colors', 'priority' => 12 ) );
	$cats = array(
        'Goal Setting'    => '#4A90E2',
        'Online Income'   => '#27AE60',
        'Productivity'    => '#F2994A',
        'AI Tools'        => '#9B51E0',
        'Mindset'         => '#EB5757',
        'Business'        => '#2D9CDB',
        'Success Stories' => '#C5A02B'
    );
	foreach($cats as $cat => $default_color) {
		$cat_id = sanitize_title($cat);
		$wp_customize->add_setting( "color_cat_{$cat_id}", array( 'default' => $default_color, 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "color_cat_{$cat_id}", array( 'label' => $cat . ' Color', 'section' => 'layunin_category_colors' ) ) );
	}

	// --- 2. HEADER & ANNOUNCEMENT ---
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header & Navigation', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Elite Community', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'header_dark_mode_title', array( 'default' => 'Switch Mode', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'header_dark_mode_title', array( 'label' => 'Dark Mode Toggle Title', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'header_cta_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_link', array( 'label' => 'CTA Button Link', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'logo_width', array( 'default' => '200', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    $wp_customize->add_section( 'layunin_announcement', array( 'title' => 'Announcement Bar', 'priority' => 20 ) );
    $wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_announcement', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'LIMITED: Secure Your Free "Elite Productivity Vault" – Over 15,000+ Downloads!', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
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
    $wp_customize->add_setting( 'hero_badge', array( 'default' => 'Elite Success Systems for Filipinos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_badge', array( 'label' => 'Top Badge Text', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Manifest Your "Layunin" Into A High-Impact Reality', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Main Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Bridging the gap between Filipino ambition and world-class execution through elite systems, AI productivity, and financial mastery.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Start Your Transformation', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'Primary Button Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_cta_1_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_link', array( 'label' => 'Primary Button Link', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'Browse Elite Systems', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'Secondary Button Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_cta_2_link', array( 'default' => '/about/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_2_link', array( 'label' => 'Secondary Button Link', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_social_proof', array( 'default' => 'Trusted by 25,000+ Filipino High-Achievers & Entrepreneurs', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_social_proof', array( 'label' => 'Social Proof Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_card_title', array( 'default' => 'Clarity Engine', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_card_title', array( 'label' => 'Status Card Title', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_card_status', array( 'default' => 'Active Success Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_card_status', array( 'label' => 'Status Card Subtitle', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_card_rate', array( 'default' => 'Optimization Rate: 95%', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_card_rate', array( 'label' => 'Status Card Rate Text', 'section' => 'layunin_home_hero' ) );
    $wp_customize->add_setting( 'hero_card_percent', array( 'default' => '95', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_card_percent', array( 'label' => 'Status Card Percentage', 'section' => 'layunin_home_hero', 'type' => 'number' ) );
    $wp_customize->add_setting( 'hero_card_icon', array( 'default' => 'fas fa-bolt', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_card_icon', array( 'label' => 'Status Card Icon', 'section' => 'layunin_home_hero' ) );

    // 1.5 Featured Posts
    $wp_customize->add_section( 'layunin_home_featured_posts', array( 'title' => '1.5 Featured Posts', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'featured_posts_title', array( 'default' => "Strategic Insights & Case Studies", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'featured_posts_title', array( 'label' => 'Title', 'section' => 'layunin_home_featured_posts' ) );

	// 2. Trust Badges
	$wp_customize->add_section( 'layunin_home_trust', array( 'title' => '2. Trust Badges', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'trust_badges_title', array( 'default' => 'The Standard for Modern Filipino Excellence', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'trust_badges_title', array( 'label' => 'Title', 'section' => 'layunin_home_trust' ) );
    $wp_customize->add_setting( 'trust_badge_fallback', array( 'default' => 'PARTNER', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'trust_badge_fallback', array( 'label' => 'Fallback Text (if no image)', 'section' => 'layunin_home_trust' ) );
	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "trust_badge_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "trust_badge_{$i}", array( 'label' => "Badge $i", 'section' => 'layunin_home_trust' ) ) );
	}

	// 3. Process
	$wp_customize->add_section( 'layunin_home_process', array( 'title' => '3. Process Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'process_title', array( 'default' => 'The Layunin Elite Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Title', 'section' => 'layunin_home_process' ) );
    $steps = array(
        1 => array('title' => 'Audit & Align', 'desc' => 'Identify the "noise" and align your daily actions with your core purpose.'),
        2 => array('title' => 'Systematize Growth', 'desc' => 'Deploy modular productivity frameworks and AI tools to 3X your output.'),
        3 => array('title' => 'Scale Impact', 'desc' => 'Convert your increased efficiency into diversified, scalable income streams.')
    );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => $steps[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step $i Title", 'section' => 'layunin_home_process' ) );
		$wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => $steps[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step $i Description", 'section' => 'layunin_home_process' ) );
	}

	// 4. Features
	$wp_customize->add_section( 'layunin_home_features', array( 'title' => '4. Features Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'features_title', array( 'default' => 'Why High-Achievers Choose Us', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Title', 'section' => 'layunin_home_features' ) );
    $features = array(
        1 => array('title' => 'Localized Expertise', 'desc' => 'Frameworks built specifically for the Philippine professional landscape.'),
        2 => array('title' => 'Future-Ready Systems', 'desc' => 'Cutting-edge AI and productivity tools integrated for immediate use.'),
        3 => array('title' => 'Community of Mastery', 'desc' => 'Direct access to a network of like-minded Filipino entrepreneurs.')
    );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "feature_{$i}_title", array( 'default' => $features[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature $i Title", 'section' => 'layunin_home_features' ) );
		$wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => $features[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature $i Description", 'section' => 'layunin_home_features' ) );
		$wp_customize->add_setting( "feature_{$i}_icon", array( 'default' => ($i == 1) ? 'fa-map-marker-alt' : (($i == 2) ? 'fa-microchip' : 'fa-users'), 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "feature_{$i}_icon", array( 'label' => "Feature $i Icon (FA class)", 'section' => 'layunin_home_features' ) );
	}

	// 5. Problem
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => '5. Problem Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'problem_badge', array( 'default' => 'The Friction', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'problem_badge', array( 'label' => 'Section Badge', 'section' => 'layunin_home_problem' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'The Ceiling on Filipino Potential', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Title', 'section' => 'layunin_home_problem' ) );
    $wp_customize->add_setting( 'problem_lead', array( 'default' => 'Ambition is plentiful, but world-class execution systems are rare. We identified the primary barriers holding high-achievers back.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'problem_lead', array( 'label' => 'Section Lead', 'section' => 'layunin_home_problem', 'type' => 'textarea' ) );
    $problems = array(
        1 => array('title' => 'Information Overload', 'desc' => 'Endless global advice that doesn\'t translate to the local context.'),
        2 => array('title' => 'The Hustle Trap', 'desc' => 'Working 80 hours a week with zero scalability or "Layunin" alignment.'),
        3 => array('title' => 'Technical Friction', 'desc' => 'Struggling to implement modern tools and AI into existing workflows.'),
        4 => array('title' => 'Income Plateau', 'desc' => 'Trading time for money without a system to build digital assets.')
    );
    for($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting( "problem_item_{$i}_title", array( 'default' => $problems[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "problem_item_{$i}_title", array( 'label' => "Problem $i Title", 'section' => 'layunin_home_problem' ) );
        $wp_customize->add_setting( "problem_item_{$i}_desc", array( 'default' => $problems[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "problem_item_{$i}_desc", array( 'label' => "Problem $i Description", 'section' => 'layunin_home_problem', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "problem_item_{$i}_icon", array( 'default' => "fas fa-lock", 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "problem_item_{$i}_icon", array( 'label' => "Problem $i Icon (FontAwesome)", 'section' => 'layunin_home_problem' ) );
    }

	// 6. Solution
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => '6. Solution Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'solution_badge_text', array( 'default' => 'The Framework', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_badge_text', array( 'label' => 'Section Badge', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'The Master Blueprint for High-Output Success', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We don\'t just give you "tips". We provide the architectural frameworks and modular systems that allow you to build a life of purpose, profit, and pure impact.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity Over Chaos: The deep-work protocol.\nSystematic Scalability: Built-for-purpose AI workflows.\nDigital Mastery: Frameworks for online asset creation.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullets (one per line)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'solution_cert_title', array( 'default' => 'Elite', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_cert_title', array( 'label' => 'Badge Title', 'section' => 'layunin_home_solution' ) );
    $wp_customize->add_setting( 'solution_cert_desc', array( 'default' => 'Certified Framework', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'solution_cert_desc', array( 'label' => 'Badge Subtitle', 'section' => 'layunin_home_solution' ) );
    $wp_customize->add_setting( 'solution_cert_icon', array( 'default' => 'fas fa-shield-check', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_cert_icon', array( 'label' => 'Badge Icon', 'section' => 'layunin_home_solution' ) );
    $wp_customize->add_setting( 'solution_image', array( 'default' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=1200', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'solution_image', array( 'label' => 'Image', 'section' => 'layunin_home_solution' ) ) );

	// 7. Categories
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => '7. Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'The Pillars of Your Purpose', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
    $wp_customize->add_setting( 'categories_desc', array( 'default' => 'Deep-dive into the strategies that move the needle.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Description', 'section' => 'layunin_home_categories' ) );
    $cat_titles = array('Goal Setting', 'Online Income', 'Productivity', 'AI Mastery', 'Elite Mindset', 'Scalable Business');
    $cat_icons = array('fas fa-bullseye', 'fas fa-wallet', 'fas fa-bolt', 'fas fa-robot', 'fas fa-brain', 'fas fa-chart-line');
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => $cat_titles[$i-1], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category $i Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => $cat_icons[$i-1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category $i Icon", 'section' => 'layunin_home_categories' ) );
	}

    // 8. Lead Magnet
    $wp_customize->add_section( 'layunin_home_lm', array( 'title' => '8. Lead Magnet Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'lm_title', array( 'default' => 'The Elite 7-Day Goal Reset Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_title', array( 'label' => 'Title', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_subtitle', array( 'default' => 'Stop existing. Start executing. This is the exact audit used by top CEOs to reclaim 20+ hours per week.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_subtitle', array( 'label' => 'Subtitle', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_list', array( 'default' => "The 'Layunin' Alignment Map (10-Min Audit)\nTop 5 AI Tools for 300% More Output\nDay-by-Day Life Re-Engineering Framework", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_list', array( 'label' => 'Benefit List (one per line)', 'section' => 'layunin_home_lm', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'lm_newsletter_ph', array( 'default' => 'Enter your business email', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_newsletter_ph', array( 'label' => 'Email Placeholder', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_btn_text', array( 'default' => 'Get the Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_btn_text', array( 'label' => 'Button Text', 'section' => 'layunin_home_lm' ) );
    $wp_customize->add_setting( 'lm_image', array( 'default' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=800', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lm_image', array( 'label' => 'Guide Image', 'section' => 'layunin_home_lm' ) ) );
    $wp_customize->add_setting( 'lm_social_proof', array( 'default' => 'Join 25,000+ others pursuing their absolute mastery. Your data is 100% secure.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'lm_social_proof', array( 'label' => 'Social Proof Text', 'section' => 'layunin_home_lm' ) );

	// 9. Products
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => '9. Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Elite Assets & Accelerators', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Title', 'section' => 'layunin_home_products' ) );
    $wp_customize->add_setting( 'products_desc', array( 'default' => 'Precision-engineered tools to compress your learning curve and amplify your results.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'products_desc', array( 'label' => 'Description', 'section' => 'layunin_home_products' ) );
    $prods = array(
        1 => array('title' => 'The Master Planner', 'price' => '&#8369;1,499'),
        2 => array('title' => 'AI Prompt Vault', 'price' => '&#8369;2,999'),
        3 => array('title' => 'The Creator System', 'price' => '&#8369;4,999')
    );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "product_item_{$i}_title", array( 'default' => $prods[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "product_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_price", array( 'default' => $prods[$i]['price'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "product_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => 'layunin_home_products' ) );
        $wp_customize->add_setting( "product_item_{$i}_image", array( 'default' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=400', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "product_item_{$i}_image", array( 'label' => "Product $i Image", 'section' => 'layunin_home_products' ) ) );
        $wp_customize->add_setting( "product_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "product_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => 'layunin_home_products' ) );
	}
    $wp_customize->add_setting( 'products_btn_text', array( 'default' => 'View Asset', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'products_btn_text', array( 'label' => 'Button Text', 'section' => 'layunin_home_products' ) );

    // 10. Services
    $wp_customize->add_section( 'layunin_home_services', array( 'title' => '10. Services Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'services_home_title', array( 'default' => 'Strategic Implementation Systems', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'services_home_title', array( 'label' => 'Title', 'section' => 'layunin_home_services' ) );
    $servs = array(
        1 => array('title' => 'Executive Mentorship', 'desc' => '1-on-1 strategic alignment for high-net-worth founders.', 'icon' => 'fas fa-chess-king'),
        2 => array('title' => 'Business Optimization', 'desc' => 'Custom systems and AI workflows for your existing team.', 'icon' => 'fas fa-gears'),
        3 => array('title' => 'Wealth Architecture', 'desc' => 'Building diversified, scalable digital asset portfolios.', 'icon' => 'fas fa-vault')
    );
    for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "service_item_{$i}_title", array( 'default' => $servs[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "service_item_{$i}_title", array( 'label' => "Service $i Title", 'section' => 'layunin_home_services' ) );
        $wp_customize->add_setting( "service_item_{$i}_desc", array( 'default' => $servs[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		$wp_customize->add_control( "service_item_{$i}_desc", array( 'label' => "Service $i Description", 'section' => 'layunin_home_services', 'type' => 'textarea' ) );
		$wp_customize->add_setting( "service_item_{$i}_icon", array( 'default' => $servs[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_item_{$i}_icon", array( 'label' => "Service $i Icon", 'section' => 'layunin_home_services' ) );
	}
    $wp_customize->add_setting( 'services_home_btn_text', array( 'default' => 'Explore Service', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'services_home_btn_text', array( 'label' => 'Button Text', 'section' => 'layunin_home_services' ) );

	// 11. Testimonials
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => '11. Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'testimonials_badge_text', array( 'default' => 'Elite Validation', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonials_badge_text', array( 'label' => 'Section Badge', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonials_home_title', array( 'default' => 'Proof of Impact', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonials_home_title', array( 'label' => 'Title', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonials_home_lead', array( 'default' => 'Our framework has been battle-tested by thousands of Filipinos across the globe. Here is one of our most recent success stories.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonials_home_lead', array( 'label' => 'Section Lead', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => 'The systems I learned through Layunin didn\'t just increase my income; they gave me my life back. I finally feel like I\'m living my true "Layunin".', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Main Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Dr. Katrina Reyes', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author Name', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Global Entrepreneur', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_image', array( 'default' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=300', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_image', array( 'label' => 'Author Image', 'section' => 'layunin_home_testimonials' ) ) );
    $wp_customize->add_setting( 'testimonials_home_btn_text', array( 'default' => 'See Wall of Impact', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'testimonials_home_btn_text', array( 'label' => 'Button Text', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonials_home_btn_link', array( 'default' => '/testimonials/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonials_home_btn_link', array( 'label' => 'Button Link', 'section' => 'layunin_home_testimonials' ) );

    // 12. Final CTA
    $wp_customize->add_section( 'layunin_home_final', array( 'title' => '12. Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Master Your Path. Claim Your Layunin.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Title', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'The difference between who you are and who you want to be is what you do today. Join the elite network.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'final_cta_trust', array( 'default' => 'Backed by our commitment to Filipino excellence. No commitment required to start.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_trust', array( 'label' => 'Trust Text', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_1_text', array( 'default' => 'Access the Elite Network', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_1_text', array( 'label' => 'Button 1 Text', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_1_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_1_link', array( 'label' => 'Button 1 Link', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_2_text', array( 'default' => 'Explore the Knowledge Library', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'final_cta_2_text', array( 'label' => 'Button 2 Text', 'section' => 'layunin_home_final' ) );
    $wp_customize->add_setting( 'final_cta_2_link', array( 'default' => '/free-resources/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_2_link', array( 'label' => 'Button 2 Link', 'section' => 'layunin_home_final' ) );

    // --- 3.5 LEAD POPUP ---
    $wp_customize->add_section( 'layunin_lead_popup', array( 'title' => 'Lead Popup', 'priority' => 35 ) );
    $wp_customize->add_setting( 'show_popup', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_popup', array( 'label' => 'Enable Exit-Intent Popup', 'section' => 'layunin_lead_popup', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'popup_title', array( 'default' => "STOP! Your Purpose is Calling.", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_title', array( 'label' => 'Popup Title', 'section' => 'layunin_lead_popup' ) );
    $wp_customize->add_setting( 'popup_desc', array( 'default' => 'Don\'t leave without the "Elite 7-Day Goal Reset Protocol". This guide has transformed over 15,000+ Filipino lives.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_desc', array( 'label' => 'Popup Description', 'section' => 'layunin_lead_popup', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'popup_social_proof', array( 'default' => 'Join 25,000+ others pursuing their absolute mastery.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_social_proof', array( 'label' => 'Popup Social Proof', 'section' => 'layunin_lead_popup' ) );
    $wp_customize->add_setting( 'popup_btn_text', array( 'default' => 'Send Me The Guide', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_btn_text', array( 'label' => 'Button Text', 'section' => 'layunin_lead_popup' ) );
    $wp_customize->add_setting( 'popup_ph', array( 'default' => 'Your Email Address', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'popup_ph', array( 'label' => 'Email Placeholder', 'section' => 'layunin_lead_popup' ) );

	// --- 4. SIDEBAR & AUTHOR ---
    $wp_customize->add_section( 'layunin_sidebar_author', array( 'title' => 'Sidebar & Author', 'priority' => 42 ) );
    $wp_customize->add_setting( 'sidebar_bio_text', array( 'default' => 'Strategist, Mentor, and Founder of Layunin. Dedicated to architecting the next generation of Filipino high-achievers.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_bio_text', array( 'label' => 'Sidebar Bio', 'section' => 'layunin_sidebar_author', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'sidebar_author_image', array( 'default' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=300', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sidebar_author_image', array( 'label' => 'Sidebar Author Photo', 'section' => 'layunin_sidebar_author' ) ) );
    $wp_customize->add_setting( 'author_facebook', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_facebook', array( 'label' => 'Author Facebook', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'author_twitter', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_twitter', array( 'label' => 'Author Twitter', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'author_linkedin', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'author_linkedin', array( 'label' => 'Author LinkedIn', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'show_sidebar_newsletter', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_sidebar_newsletter', array( 'label' => 'Show Sidebar Newsletter', 'section' => 'layunin_sidebar_author', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_ph', array( 'default' => 'Email Address', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_ph', array( 'label' => 'Newsletter Placeholder', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_title', array( 'default' => 'Elite Growth Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_title', array( 'label' => 'Sidebar Newsletter Title', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_desc', array( 'default' => 'Architect your life and reclaim your purpose in just 7 days.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_desc', array( 'label' => 'Sidebar Newsletter Desc', 'section' => 'layunin_sidebar_author' ) );
    $wp_customize->add_setting( 'sidebar_newsletter_btn', array( 'default' => 'Download Free', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_newsletter_btn', array( 'label' => 'Sidebar Newsletter Button', 'section' => 'layunin_sidebar_author' ) );

    // --- 4.3 MONETIZATION ---
    $wp_customize->add_section( 'layunin_monetization', array( 'title' => 'Monetization & Ads', 'priority' => 43 ) );
    $wp_customize->add_setting( 'banner_above_content', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_above_content', array( 'label' => 'Banner Above Post Content', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'banner_below_content', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_below_content', array( 'label' => 'Banner Below Post Content', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'affiliate_banner_url', array( 'default' => 'https://images.unsplash.com/photo-1512428559083-a40ea9013f01?auto=format&fit=crop&q=80&w=800', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'affiliate_banner_url', array( 'label' => 'Global Affiliate Banner', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'affiliate_banner_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'affiliate_banner_link', array( 'label' => 'Global Affiliate Link', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'affiliate_banner_alt', array( 'default' => 'Partner Offer', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'affiliate_banner_alt', array( 'label' => 'Global Affiliate Alt Text', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_newsletter_title', array( 'default' => 'Join the Elite Network', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_title', array( 'label' => 'Widget Newsletter Title', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_newsletter_desc', array( 'default' => 'Strategic insights on personal growth and scalable income.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_desc', array( 'label' => 'Widget Newsletter Desc', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_newsletter_ph', array( 'default' => 'Email', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_ph', array( 'label' => 'Newsletter Placeholder', 'section' => 'layunin_monetization' ) );

    $wp_customize->add_setting( 'product_item_1_title', array( 'default' => 'The Ultimate Goal Planner', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'product_item_1_title', array( 'label' => 'Offer Title', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'product_item_1_price', array( 'default' => '&#8369;999', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'product_item_1_price', array( 'label' => 'Offer Price', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'product_item_1_image', array( 'default' => 'https://images.unsplash.com/photo-1506784919141-93584869786a?auto=format&fit=crop&q=80&w=400', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'product_item_1_image', array( 'label' => 'Offer Image', 'section' => 'layunin_monetization' ) ) );
    $wp_customize->add_setting( 'product_item_1_link', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'product_item_1_link', array( 'label' => 'Offer Link', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_product_desc', array( 'default' => 'The exact blueprint used to 10X our digital asset portfolio.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_product_desc', array( 'label' => 'Widget Product Desc', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_newsletter_btn', array( 'default' => 'Subscribe', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_newsletter_btn', array( 'label' => 'Newsletter Button', 'section' => 'layunin_monetization' ) );
    $wp_customize->add_setting( 'monetization_product_btn', array( 'default' => 'Buy Now', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'monetization_product_btn', array( 'label' => 'Product Button', 'section' => 'layunin_monetization' ) );

    $wp_customize->add_setting( 'newsletter_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'newsletter_form_action', array( 'label' => 'Newsletter Form Action URL', 'section' => 'layunin_monetization', 'description' => 'Integration URL for your email provider (e.g. Mailchimp, ConvertKit).' ) );
    $wp_customize->add_setting( 'lead_magnet_form_action', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'lead_magnet_form_action', array( 'label' => 'Lead Magnet Form Action URL', 'section' => 'layunin_monetization' ) );

    // --- 4.5 BLOG SETTINGS ---
    $wp_customize->add_section( 'layunin_blog_settings', array( 'title' => 'Blog & Post Details', 'priority' => 44 ) );
    $wp_customize->add_setting( 'show_author_box', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_author_box', array( 'label' => 'Show Author Box on Single Posts', 'section' => 'layunin_blog_settings', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'author_box_title', array( 'default' => 'The Strategist Behind The Words', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'author_box_title', array( 'label' => 'Author Box Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'related_posts_title', array( 'default' => 'Continue Your Mastery Journey', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'related_posts_title', array( 'label' => 'Related Posts Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'read_more_text', array( 'default' => 'Unlock Full Strategy', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'read_more_text', array( 'label' => 'Read More Button Text', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nothing_found_title', array( 'default' => 'Strategy Not Found', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nothing_found_title', array( 'label' => 'No Results Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nothing_found_desc', array( 'default' => 'Even high achievers take wrong turns. Use the search below to find your specific "Layunin".', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nothing_found_desc', array( 'label' => 'No Results Description', 'section' => 'layunin_blog_settings', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'toc_title', array( 'default' => 'Strategic Overview', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'toc_title', array( 'label' => 'Table of Contents Title', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'breadcrumb_home_label', array( 'default' => 'Launchpad', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'breadcrumb_home_label', array( 'label' => 'Breadcrumb Home Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nav_prev_label', array( 'default' => 'Previous Insight', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nav_prev_label', array( 'label' => 'Post Nav Previous Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'nav_next_label', array( 'default' => 'Next Level Insight', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'nav_next_label', array( 'label' => 'Post Nav Next Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'archive_older_label', array( 'default' => 'Previous Strategies', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'archive_older_label', array( 'label' => 'Pagination Older Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'archive_newer_label', array( 'default' => 'Recent Strategics', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'archive_newer_label', array( 'label' => 'Pagination Newer Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_layout', array( 'default' => 'grid', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'blog_layout', array( 'label' => 'Blog Layout', 'section' => 'layunin_blog_settings', 'type' => 'select', 'choices' => array('grid' => 'Grid', 'list' => 'List') ) );
    $wp_customize->add_setting( 'blog_by_text', array( 'default' => 'By', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_by_text', array( 'label' => '"By" Author Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_min_text', array( 'default' => 'min', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_min_text', array( 'label' => '"min" Read Time Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_min_read_text', array( 'default' => 'min read', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_min_read_text', array( 'label' => '"min read" Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_posted_on_text', array( 'default' => 'Posted on', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_posted_on_text', array( 'label' => '"Posted on" Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_search_btn_text', array( 'default' => 'Read Strategy', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_search_btn_text', array( 'label' => 'Search Result Button', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_share_text', array( 'default' => 'Share this strategy:', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_share_text', array( 'label' => 'Social Share Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_share_on_text', array( 'default' => 'Share on', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'blog_share_on_text', array( 'label' => 'Social Share Aria Label', 'section' => 'layunin_blog_settings' ) );
    $wp_customize->add_setting( 'blog_wpm', array( 'default' => '200', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'blog_wpm', array( 'label' => 'Words Per Minute (Reading Time)', 'section' => 'layunin_blog_settings', 'type' => 'number' ) );

	// --- 5. SOCIAL & SEO ---
    $wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 45 ) );
    $socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}
    $wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin is the premier platform for Filipino high-achievers seeking elite productivity, online income systems, and absolute life mastery.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );

    // --- 6. PAGE CONTENT MANAGEMENT ---
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Management', 'priority' => 40 ) );
	$pages = array( 'about', 'services', 'contact', 'shop', 'free_resources', 'testimonials', 'lead_magnet_landing', 'thank_you', 'affiliate_disclosure', 'privacy_policy', 'terms', 'search_404', 'faq' );
	foreach ( $pages as $id ) {
		$label = ucfirst(str_replace('_', ' ', $id)) . ' Page';
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );

        if($id == 'search_404') {
            $wp_customize->add_setting( 'error_404_title', array( 'default' => 'Even Masters Get Lost.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_title', array( 'label' => '404 Headline', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'error_404_desc', array( 'default' => "We couldn't find the page you're looking for. But don't worry, every wrong turn is a chance to re-audit your direction. Let's get you back on course.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_desc', array( 'label' => '404 Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'error_404_btn1', array( 'default' => 'Back to Launchpad', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_btn1', array( 'label' => '404 Button 1 Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'error_404_btn2', array( 'default' => 'Contact Support', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'error_404_btn2', array( 'label' => '404 Button 2 Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'error_404_btn1_link', array( 'default' => '/', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( 'error_404_btn1_link', array( 'label' => '404 Button 1 Link', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'error_404_btn2_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( 'error_404_btn2_link', array( 'label' => '404 Button 2 Link', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'search_results_title', array( 'default' => 'Strategic Results for:', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'search_results_title', array( 'label' => 'Search Title Prefix', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'archive_title_prefix', array( 'default' => 'Mastering:', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'archive_title_prefix', array( 'label' => 'Archive Title Prefix', 'section' => "layunin_page_{$id}" ) );
        } else {
            $title_default = ($id == 'testimonials') ? 'Testimonials Page' : (($id == 'thank_you') ? 'Thank You Page' : $label);
            $wp_customize->add_setting( "{$id}_title", array( 'default' => $title_default, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'about') {
            $wp_customize->add_setting( 'about_badge', array( 'default' => 'The Pursuit of Absolute Mastery', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'about_lead', array( 'default' => 'Layunin was built on a single, uncompromising principle: that every Filipino has the potential to achieve world-class excellence when equipped with the right systems.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_lead', array( 'label' => 'Lead Paragraph', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'about_mission_content', array( 'default' => 'Layunin is the premier platform for Filipino high-achievers seeking life mastery. We provide the systems and tools to bridge the gap between ambition and execution.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_mission_content', array( 'label' => 'Our Elite Mission Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'about_visual', array( 'default' => 'https://images.unsplash.com/photo-1522071823991-b9671f30c46f?auto=format&fit=crop&q=80&w=1200', 'sanitize_callback' => 'esc_url_raw' ) );
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_visual', array( 'label' => 'Main Visual', 'section' => "layunin_page_{$id}" ) ) );
            $wp_customize->add_setting( 'about_team_title', array( 'default' => 'The Architects of Excellence', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'about_team_title', array( 'label' => 'Team Section Title', 'section' => "layunin_page_{$id}" ) );
    $wp_customize->add_setting( 'about_mission_title', array( 'default' => 'Our Elite Mission', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'about_mission_title', array( 'label' => 'Mission Section Title', 'section' => "layunin_page_{$id}" ) );
    $wp_customize->add_setting( 'about_stat_number', array( 'default' => '25k+', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'about_stat_number', array( 'label' => 'Stat Number', 'section' => "layunin_page_{$id}" ) );
    $wp_customize->add_setting( 'about_stat_text', array( 'default' => 'High Achievers', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'about_stat_text', array( 'label' => 'Stat Label', 'section' => "layunin_page_{$id}" ) );

            for($i=1; $i<=3; $i++) {
                $wp_customize->add_setting( "team_member_{$i}_name", array( 'default' => "Strategist $i", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "team_member_{$i}_name", array( 'label' => "Member $i Name", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_role", array( 'default' => 'Systems Architect', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "team_member_{$i}_role", array( 'label' => "Member $i Role", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_image", array( 'default' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=300', 'sanitize_callback' => 'esc_url_raw' ) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "team_member_{$i}_image", array( 'label' => "Member $i Photo", 'section' => "layunin_page_{$id}" ) ) );
                $wp_customize->add_setting( "team_member_{$i}_linkedin", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "team_member_{$i}_linkedin", array( 'label' => "Member $i LinkedIn", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_twitter", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "team_member_{$i}_twitter", array( 'label' => "Member $i Twitter", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'services') {
            $wp_customize->add_setting( 'services_badge', array( 'default' => 'Strategic Implementation', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'services_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );

            $serv_tiers = array(
                1 => array('title' => 'Strategy', 'price' => '&#8369;4,999', 'features' => 'Protocol Audit|Alignment Map|Base Systems'),
                2 => array('title' => 'Mastery', 'price' => '&#8369;14,999', 'features' => '1-on-1 Mentorship|AI Implementation|Wealth Architecture'),
                3 => array('title' => 'Architect', 'price' => '&#8369;49,999', 'features' => 'Global Expansion|Scale Frameworks|Legacy Building')
            );
            for($i = 1; $i <= 3; $i++) {
                $wp_customize->add_setting( "services_tier_{$i}_title", array( 'default' => $serv_tiers[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "services_tier_{$i}_title", array( 'label' => "Tier $i Title", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "services_tier_{$i}_price", array( 'default' => $serv_tiers[$i]['price'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "services_tier_{$i}_price", array( 'label' => "Tier $i Price", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "services_tier_{$i}_features", array( 'default' => $serv_tiers[$i]['features'], 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "services_tier_{$i}_features", array( 'label' => "Tier $i Features (pipe separated)", 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
                $wp_customize->add_setting( "services_tier_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "services_tier_{$i}_link", array( 'label' => "Tier $i Link", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "services_tier_{$i}_btn", array( 'default' => 'Get Started', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "services_tier_{$i}_btn", array( 'label' => "Tier $i Button Text", 'section' => "layunin_page_{$id}" ) );
            }

        $wp_customize->add_setting( 'services_custom_title', array( 'default' => 'Need a Custom Solution?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( 'services_custom_title', array( 'label' => 'Custom Solution Title', 'section' => "layunin_page_{$id}" ) );
        $wp_customize->add_setting( 'services_custom_desc', array( 'default' => 'For large scale operations and international firms, we offer bespoke architectural consulting tailored to your specific mastery goals.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( 'services_custom_desc', array( 'label' => 'Custom Solution Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        $wp_customize->add_setting( 'services_custom_btn', array( 'default' => 'Initiate Consultation', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( 'services_custom_btn', array( 'label' => 'Custom Solution Button', 'section' => "layunin_page_{$id}" ) );
    }
        }
        if($id == 'contact') {
            $wp_customize->add_setting( 'contact_badge', array( 'default' => "Initiate Protocol", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_content', array( 'default' => 'Ready to architect your high-impact reality? Our team is standing by to assist with your growth journey.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_content', array( 'label' => 'Description Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'contact_email', array( 'default' => 'elite@layunin.com', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_email', array( 'label' => 'Contact Email', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_phone', array( 'default' => '+63 917 123 4567', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_phone', array( 'label' => 'Contact Phone', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_address', array( 'default' => 'BGC, Taguig, Philippines', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_address', array( 'label' => 'Contact Address', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_map_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
            $wp_customize->add_control( 'contact_map_url', array( 'label' => 'Google Maps Embed URL', 'section' => "layunin_page_{$id}" ) );

            $wp_customize->add_setting( 'contact_info_title', array( 'default' => 'Contact Information', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_info_title', array( 'label' => 'Info Section Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_email_label', array( 'default' => 'Email Us', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_email_label', array( 'label' => 'Email Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_phone_label', array( 'default' => 'Call Us', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_phone_label', array( 'label' => 'Phone Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_address_label', array( 'default' => 'Visit Us', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_address_label', array( 'label' => 'Address Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_name_ph', array( 'default' => 'John Doe', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_name_ph', array( 'label' => 'Name Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_email_ph', array( 'default' => 'john@example.com', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_email_ph', array( 'label' => 'Email Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_subject_ph', array( 'default' => 'Coaching Inquiry', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_subject_ph', array( 'label' => 'Subject Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_msg_ph', array( 'default' => 'How can we help you achieve your goals?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_msg_ph', array( 'label' => 'Message Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_social_title', array( 'default' => 'Follow Our Journey', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_social_title', array( 'label' => 'Social Section Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_title', array( 'default' => 'Send a Message', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_title', array( 'label' => 'Form Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_name_label', array( 'default' => 'Full Name', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_name_label', array( 'label' => 'Name Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_email_label', array( 'default' => 'Email Address', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_email_label', array( 'label' => 'Email Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_subject_label', array( 'default' => 'Subject', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_subject_label', array( 'label' => 'Subject Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_msg_label', array( 'default' => 'Your Message', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_msg_label', array( 'label' => 'Message Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_form_btn', array( 'default' => 'Send Message', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'contact_form_btn', array( 'label' => 'Submit Button Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'contact_cf7_shortcode', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
            $wp_customize->add_control( 'contact_cf7_shortcode', array( 'label' => 'Contact Form 7 Shortcode (Optional)', 'section' => "layunin_page_{$id}", 'description' => 'If provided, this will replace the default theme form.' ) );
        }

        if($id == 'shop') {
            $wp_customize->add_setting( 'shop_badge', array( 'default' => 'The Mastery Collection', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_content', array( 'default' => 'Invest in the precision-engineered digital assets that drive world-class execution.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_content', array( 'label' => 'Shop Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'shop_item_badge', array( 'default' => 'Digital Resource', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_item_badge', array( 'label' => 'Product Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_btn_text', array( 'default' => 'Add to Cart', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_btn_text', array( 'label' => 'Add to Cart Button Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_view_btn', array( 'default' => 'View Details', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_view_btn', array( 'label' => 'View Details Button Text', 'section' => "layunin_page_{$id}" ) );

            $wp_customize->add_setting( 'shop_newsletter_title', array( 'default' => 'Want Exclusive Discounts?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_newsletter_desc', array( 'default' => 'Join our community and get 20% off your first digital product purchase.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_newsletter_desc', array( 'label' => 'Newsletter Description', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_newsletter_ph', array( 'default' => 'Enter your email', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_newsletter_ph', array( 'label' => 'Newsletter Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'shop_newsletter_btn', array( 'default' => 'Join Now', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'shop_newsletter_btn', array( 'label' => 'Newsletter Button Text', 'section' => "layunin_page_{$id}" ) );
    $wp_customize->add_setting( 'sidebar_author_title', array( 'default' => 'About the Author', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'sidebar_author_title', array( 'label' => 'Sidebar Author Title', 'section' => 'layunin_sidebar_author' ) );

            for($i = 1; $i <= 6; $i++) {
                $wp_customize->add_setting( "shop_item_{$i}_title", array( 'default' => 'Elite Framework ' . $i, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "shop_item_{$i}_title", array( 'label' => "Product $i Title", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "shop_item_{$i}_price", array( 'default' => '&#8369;2,499', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "shop_item_{$i}_price", array( 'label' => "Product $i Price", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "shop_item_{$i}_image", array( 'default' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&q=80&w=400', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "shop_item_{$i}_image", array( 'label' => "Product $i Image", 'section' => "layunin_page_{$id}" ) ) );
                $wp_customize->add_setting( "shop_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "shop_item_{$i}_link", array( 'label' => "Product $i Link", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'free_resources') {
            $wp_customize->add_setting( 'free_resources_badge', array( 'default' => 'The Knowledge Vault', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'free_resources_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'free_resources_content', array( 'default' => 'Start your journey with our complimentary high-output guides and frameworks.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'free_resources_content', array( 'label' => 'Resources Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );

            $wp_customize->add_setting( 'resources_cta_title', array( 'default' => 'Looking for more?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'resources_cta_title', array( 'label' => 'CTA Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'resources_cta_desc', array( 'default' => 'Our Success Library is updated monthly with new tools for the community. Subscribe to be the first to know when we release new high-value resources.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'resources_cta_desc', array( 'label' => 'CTA Description', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'resources_cta_btn', array( 'default' => 'Join the VIP List', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'resources_cta_btn', array( 'label' => 'CTA Button Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'resources_btn_text', array( 'default' => 'Download Free', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'resources_btn_text', array( 'label' => 'Download Button Text', 'section' => "layunin_page_{$id}" ) );

            for($i = 1; $i <= 4; $i++) {
                $wp_customize->add_setting( "resource_{$i}_title", array( 'default' => 'Mastery Guide ' . $i, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "resource_{$i}_title", array( 'label' => "Resource $i Title", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_type", array( 'default' => 'Elite Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "resource_{$i}_type", array( 'label' => "Resource $i Type", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
                $wp_customize->add_control( "resource_{$i}_link", array( 'label' => "Resource $i Link", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "resource_{$i}_icon", array( 'default' => 'fas fa-shield-halved', 'sanitize_callback' => 'sanitize_text_field' ) );
                $wp_customize->add_control( "resource_{$i}_icon", array( 'label' => "Resource $i Icon", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'testimonials') {
            $wp_customize->add_setting( 'testimonials_badge', array( 'default' => 'Proof of Impact', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'testimonials_content', array( 'default' => 'Hear from the high-achievers who have architected their lives using the Layunin framework.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_content', array( 'label' => 'Testimonials Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'testimonials_cta_title', array( 'default' => 'Ready To Be Our Next Success Story?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_cta_title', array( 'label' => 'CTA Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'testimonials_cta_desc', array( 'default' => 'Join thousands of Filipinos who have transformed their lives.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_cta_desc', array( 'label' => 'CTA Description', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'testimonials_cta_btn', array( 'default' => 'Get Started Today', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_cta_btn', array( 'label' => 'CTA Button Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'testimonials_fallback_quote', array( 'default' => 'Layunin has completely changed my mindset toward goal setting. I finally have the tools to succeed.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_fallback_quote', array( 'label' => 'Fallback Quote (if no CPTs)', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'testimonials_fallback_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'testimonials_fallback_author', array( 'label' => 'Fallback Author', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'lead_magnet_landing') {
            $wp_customize->add_setting( 'lead_magnet_landing_title', array( 'default' => 'Elite 7-Day Goal Reset Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lead_magnet_landing_title', array( 'label' => 'Landing Headline', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lead_magnet_content', array( 'default' => 'Stop existing on autopilot. This is the exact audit used by high-output leaders to reclaim their time and refocus their absolute purpose.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'lead_magnet_content', array( 'label' => 'Landing Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'lm_badge_text', array( 'default' => 'Free Digital Resource', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_badge_text', array( 'label' => 'Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_title', array( 'default' => 'Get the Reset Guide', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_title', array( 'label' => 'Form Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_desc', array( 'default' => 'Enter your details below for instant access.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_desc', array( 'label' => 'Form Description', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_btn', array( 'default' => 'Download My Copy Now', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_btn', array( 'label' => 'Form Button Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_trust', array( 'default' => 'Your data is safe. We hate spam too.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_trust', array( 'label' => 'Form Trust Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_name_label', array( 'default' => 'Your First Name', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_name_label', array( 'label' => 'Name Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_name_ph', array( 'default' => 'e.g. Maria', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_name_ph', array( 'label' => 'Name Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_email_label', array( 'default' => 'Your Primary Email', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_email_label', array( 'label' => 'Email Field Label', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_form_email_ph', array( 'default' => 'e.g. maria@example.com', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_form_email_ph', array( 'label' => 'Email Placeholder', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_trust_pill', array( 'default' => 'Joined by 25,000+ Filipinos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_trust_pill', array( 'label' => 'Trust Pill Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_quote_text', array( 'default' => 'This guide was exactly what I needed to get my career back on track. I finally have a clear plan!', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_quote_text', array( 'label' => 'Testimonial Quote', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_quote_author', array( 'default' => 'Juan Dela Cruz', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_quote_author', array( 'label' => 'Testimonial Author', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'lm_quote_role', array( 'default' => 'High-Output Leader', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_quote_role', array( 'label' => 'Testimonial Role', 'section' => "layunin_page_{$id}" ) );

            $wp_customize->add_setting( 'lm_benefit_title', array( 'default' => "The Architecture of the Protocol:", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'lm_benefit_title', array( 'label' => 'Benefit Section Title', 'section' => "layunin_page_{$id}" ) );
            for($i = 1; $i <= 3; $i++) {
                $wp_customize->add_setting( "lm_benefit_{$i}", array( 'default' => "Strategic Level {$i} Optimization", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
                $wp_customize->add_control( "lm_benefit_{$i}", array( 'label' => "Benefit $i", 'section' => "layunin_page_{$id}" ) );
            }
        }

        if($id == 'thank_you') {
            $wp_customize->add_setting( 'thank_you_content', array( 'default' => 'Your protocol is being delivered. Stand by for transformation.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'thank_you_content', array( 'label' => 'Success Message', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'thank_you_next_title', array( 'default' => "The Next Phase", 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'thank_you_next_title', array( 'label' => 'Next Steps Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'thank_you_next_desc', array( 'default' => 'While your guide arrives, immerse yourself in our most impactful case studies.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'thank_you_next_desc', array( 'label' => 'Next Steps Desc', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'thank_you_btn_text', array( 'default' => 'Return to Launchpad', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
		    $wp_customize->add_control( 'thank_you_btn_text', array( 'label' => 'Return Button Text', 'section' => "layunin_page_{$id}" ) );
        }

        if($id == 'affiliate_disclosure') {
            $wp_customize->add_setting( 'affiliate_disclosure_content', array( 'default' => "Transparency is a core value of the Layunin community. Please assume that links on this site may be affiliate links. We only recommend elite tools we use ourselves.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'affiliate_disclosure_content', array( 'label' => 'Disclosure Text', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'privacy_policy') {
            $wp_customize->add_setting( 'privacy_policy_content', array( 'default' => 'Your data security is paramount in the pursuit of mastery. We use industry-standard encryption.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'privacy_policy_content', array( 'label' => 'Privacy Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'terms') {
            $wp_customize->add_setting( 'terms_content', array( 'default' => 'The standards of excellence for the Layunin community. By using this site, you agree to our elite protocols.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'terms_content', array( 'label' => 'Terms Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
        }

        if($id == 'faq') {
            $wp_customize->add_setting( 'faq_badge', array( 'default' => 'Common Inquiries', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'faq_badge', array( 'label' => 'Top Badge Text', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'faq_lead', array( 'default' => 'Find answers to the most frequent questions about the Layunin framework and elite protocols.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'faq_lead', array( 'label' => 'Lead Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'faq_cta_title', array( 'default' => 'Still have questions?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'faq_cta_title', array( 'label' => 'CTA Title', 'section' => "layunin_page_{$id}" ) );
            $wp_customize->add_setting( 'faq_cta_desc', array( 'default' => "Can't find the answer you're looking for? Reach out to our strategy team.", 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'faq_cta_desc', array( 'label' => 'CTA Description', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
            $wp_customize->add_setting( 'faq_cta_btn', array( 'default' => 'Contact Support', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
            $wp_customize->add_control( 'faq_cta_btn', array( 'label' => 'CTA Button Text', 'section' => "layunin_page_{$id}" ) );
        }
	}

    // --- 7. FOOTER OPTIONS ---
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Elite Footer Settings', 'priority' => 50 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Architecting the next generation of Filipino excellence.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'footer_col2_title', array( 'default' => 'Mastery Areas', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_col2_title', array( 'label' => 'Column 2 Title', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_col3_title', array( 'default' => 'Elite Vault', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_col3_title', array( 'label' => 'Column 3 Title', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_title', array( 'default' => 'The Growth Protocol', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_desc', array( 'default' => 'Join 25,000+ subscribers for weekly high-output insights.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_desc', array( 'label' => 'Newsletter Desc', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_ph', array( 'default' => 'Enter your best email', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_ph', array( 'label' => 'Newsletter Placeholder', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_btn', array( 'default' => 'Join', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_btn', array( 'label' => 'Newsletter Button', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_newsletter_trust', array( 'default' => 'No spam. Only purpose.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_newsletter_trust', array( 'label' => 'Newsletter Trust', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_privacy_label', array( 'default' => 'Privacy', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_privacy_label', array( 'label' => 'Privacy Link Label', 'section' => 'layunin_footer_options' ) );
    $wp_customize->add_setting( 'footer_terms_label', array( 'default' => 'Terms', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'footer_terms_label', array( 'label' => 'Terms Link Label', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved. Architected in the Philippines.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
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
