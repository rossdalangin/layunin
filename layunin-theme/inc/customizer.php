<?php
/**
 * Layunin Theme Customizer - Absolute Elite Masterpiece (v7.1)
 * 100% comprehensive manageable engine.
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
	$wp_customize->add_setting( 'emerald_color', array( 'default' => '#00A36C', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'emerald_color', array( 'label' => 'Trust Emerald', 'section' => 'colors' ) ) );

    $wp_customize->add_setting( 'border_radius', array( 'default' => '12', 'sanitize_callback' => 'absint' ) );
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
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Elite', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'CTA Button Text', 'section' => 'layunin_header_settings' ) );
    $wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

    $wp_customize->add_section( 'layunin_announcement', array( 'title' => 'Announcement Bar', 'priority' => 20 ) );
    $wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_announcement', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'EXCLUSIVE: Claim Your Free 7-Day Goal Reset Guide & Transform Your Life!', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_announcement', 'type' => 'text' ) );
    $wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_announcement', 'type' => 'text' ) );

    // --- 3. HOMEPAGE MASTER ENGINE ---
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Master Engine', 'priority' => 30 ) );

	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('hero', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// Sections registration (Hero, Problem, Solution, etc.)
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => '1. Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Turn Your Ambitions Into Precise Action', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Main Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We provide the systems, AI productivity tools, and elite guidance to help Filipinos bridge the gap.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Sub-headline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Start My Journey', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'Primary Button Text', 'section' => 'layunin_home_hero' ) );

	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => '2. Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Why Most Potential Stays Locked', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Title', 'section' => 'layunin_home_problem' ) );

	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => '3. Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'The Layunin Transformation Framework', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
    $wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: Defining your 'Layunin' with surgical precision.\nSystems: Modular frameworks for high-output productivity.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullets (Key: Value)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );

	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => '4. Focus Categories', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Mastery Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => "Focus Area $i", 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category $i Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category $i Icon", 'section' => 'layunin_home_categories' ) );
	}

    // --- 4. SOCIAL & SEO ---
    $wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 45 ) );
    $socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}

    // --- 5. MONETIZATION & POPUP ---
    $wp_customize->add_section( 'layunin_monetization', array( 'title' => 'Monetization & Popup', 'priority' => 48 ) );
    $wp_customize->add_setting( 'show_popup', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_popup', array( 'label' => 'Enable Lead Popup', 'section' => 'layunin_monetization', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'banner_above_content', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_above_content', array( 'label' => 'Global Ad Banner Above', 'section' => 'layunin_monetization' ) ) );

    // --- 6. PAGE MANAGEMENT ---
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Management', 'priority' => 40 ) );
	$pages = array( 'about', 'services', 'contact', 'shop', 'free_resources', 'testimonials' );
	foreach ( $pages as $id ) {
		$label = ucfirst(str_replace('_', ' ', $id)) . ' Page';
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
	}

    // --- 7. FOOTER SETTINGS ---
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Elite Footer Settings', 'priority' => 50 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Empowering Filipinos with elite tools and systems.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright', 'section' => 'layunin_footer_options' ) );

	// --- 8. SITE AUTOMATION ---
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Master Setup', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Initialize Elite Site Ecosystem', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
