<?php
/**
 * Layunin Theme Customizer - terminal Masterpiece (v5.9)
 */

function layunin_customize_register( $wp_customize ) {
	// 1. Core Design System
	$wp_customize->add_section( 'layunin_design_system', array( 'title' => 'Design System', 'priority' => 10 ) );
	$wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array( 'label' => 'Body Font', 'section' => 'layunin_design_system', 'type' => 'select', 'choices' => array('Inter' => 'Inter', 'Roboto' => 'Roboto', 'Open Sans' => 'Open Sans') ) );
	$wp_customize->add_setting( 'primary_color', array( 'default' => '#001f3f', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => 'Primary Color', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'accent_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => 'Accent Color', 'section' => 'colors' ) ) );
	$wp_customize->add_setting( 'border_radius', array( 'default' => '12', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

	// 2. Header Settings
	$wp_customize->add_section( 'layunin_header_settings', array( 'title' => 'Header Settings', 'priority' => 18 ) );
	$wp_customize->add_setting( 'header_sticky', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'header_sticky', array( 'label' => 'Enable Sticky Header', 'section' => 'layunin_header_settings', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Join the Community', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'Header CTA Button Text', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'header_cta_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_link', array( 'label' => 'Header CTA Button Link', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

	// 3. Global Elements
	$wp_customize->add_section( 'layunin_global_elements', array( 'title' => 'Global Elements', 'priority' => 20 ) );
	$wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_global_elements', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'FREE TRAINING: The exact system to achieve your first big goal in 30 days.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_global_elements', 'type' => 'text' ) );
	$wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_global_elements', 'type' => 'text' ) );

	// 4. Homepage Content Panel
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );

	// Visibility
	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('featured_posts', 'trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst(str_replace('_', ' ', $section)), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

	// Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => 'Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Your Goals Deserve More Than Just Dreams', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Hero Title', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'We help Filipinos transform their purpose into clear action, real income, and lasting success.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Hero Subtitle', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'hero_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array( 'label' => 'Hero Background Image', 'section' => 'layunin_home_hero' ) ) );
	$wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Get the Success Plan', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'CTA 1 Text', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'View Services', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'CTA 2 Text', 'section' => 'layunin_home_hero' ) );

	// Problem Section
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => 'Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Why Most Filipinos Stay Stuck', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Problem Section Title', 'section' => 'layunin_home_problem' ) );
	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "problem_item_{$i}_title", array( 'default' => 'Problem ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_title", array( 'label' => "Item {$i} Title", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_desc", array( 'default' => 'Description...', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_desc", array( 'label' => "Item {$i} Description", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_icon", array( 'default' => 'fas fa-exclamation-circle', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_icon", array( 'label' => "Item {$i} Icon", 'section' => 'layunin_home_problem' ) );
	}

	// Solution Section
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => 'Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'How Layunin Transforms Your Life', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Title', 'section' => 'layunin_home_solution' ) );
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We provide the roadmap and the tools...', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: We help you define...\nSystems: Proven frameworks...", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullets (Title: Desc per line)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'solution_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'solution_image', array( 'label' => 'Image', 'section' => 'layunin_home_solution' ) ) );

    // Process Section
    $wp_customize->add_section( 'layunin_home_process', array( 'title' => 'Process Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'process_title', array( 'default' => 'How Layunin Works', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Title', 'section' => 'layunin_home_process' ) );
    for($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => 'Step ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step {$i} Title", 'section' => 'layunin_home_process' ) );
        $wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => 'Process details...', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step {$i} Description", 'section' => 'layunin_home_process' ) );
    }

    // Features Section
    $wp_customize->add_section( 'layunin_home_features', array( 'title' => 'Features Section', 'panel' => 'layunin_homepage_panel' ) );
    $wp_customize->add_setting( 'features_title', array( 'default' => 'Why Choose Layunin?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Title', 'section' => 'layunin_home_features' ) );
    for($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting( "feature_{$i}_title", array( 'default' => 'Feature ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature {$i} Title", 'section' => 'layunin_home_features' ) );
        $wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => 'Benefit details...', 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature {$i} Description", 'section' => 'layunin_home_features' ) );
    }

	// Categories Section
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => 'Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Focus Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Title', 'section' => 'layunin_home_categories' ) );
	$wp_customize->add_setting( 'categories_desc', array( 'default' => 'Practical guidance for every step of your journey.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Description', 'section' => 'layunin_home_categories' ) );
	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => 'Category ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category {$i} Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category {$i} Icon", 'section' => 'layunin_home_categories' ) );
	}

	// Products Section
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => 'Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Premium Resources to Accelerate Your Success', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Title', 'section' => 'layunin_home_products' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "product_item_{$i}_title", array( 'default' => 'Product ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_title", array( 'label' => "Product {$i} Title", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_price", array( 'default' => '₱999', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "product_item_{$i}_price", array( 'label' => "Product {$i} Price", 'section' => 'layunin_home_products' ) );
		$wp_customize->add_setting( "product_item_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "product_item_{$i}_image", array( 'label' => "Product {$i} Image", 'section' => 'layunin_home_products' ) ) );
		$wp_customize->add_setting( "product_item_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "product_item_{$i}_link", array( 'label' => "Product {$i} Link", 'section' => 'layunin_home_products' ) );
	}

	// Testimonials Section
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => 'Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => 'Layunin changed how I approach my career...', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author', 'section' => 'layunin_home_testimonials' ) );
    $wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Digital Freelancer', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );
	$wp_customize->add_setting( 'testimonial_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_image', array( 'label' => 'Author Image', 'section' => 'layunin_home_testimonials' ) ) );

	// Final CTA
	$wp_customize->add_section( 'layunin_home_final_cta', array( 'title' => 'Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Your future starts with one decision.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Title', 'section' => 'layunin_home_final_cta' ) );
	$wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'Stop dreaming and start building...', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final_cta', 'type' => 'textarea' ) );

	// 5. Page Content Control Panel
	$wp_customize->add_panel( 'layunin_pages_panel', array( 'title' => 'Page Content Management', 'priority' => 40 ) );
	$pages = array(
		'about' => 'About Page',
		'services' => 'Services Page',
		'contact' => 'Contact Page',
		'free_resources' => 'Free Resources Page',
		'shop' => 'Shop Page',
		'testimonials' => 'Testimonials Page',
		'lead_magnet' => 'Lead Magnet Page',
		'thank_you' => 'Thank You Page',
	);
	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
		$wp_customize->add_setting( "{$id}_content", array( 'default' => 'Empowering Filipino high-achievers with clarity and purpose.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );

        if ( $id == 'services' ) {
			for($i = 1; $i <= 3; $i++) {
				$wp_customize->add_setting( "page_service_{$i}_title", array( 'default' => 'Tier ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "page_service_{$i}_title", array( 'label' => "Service {$i} Title", 'section' => "layunin_page_{$id}" ) );
				$wp_customize->add_setting( "page_service_{$i}_price", array( 'default' => '₱' . ($i * 5000), 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "page_service_{$i}_price", array( 'label' => "Service {$i} Price", 'section' => "layunin_page_{$id}" ) );
				$wp_customize->add_setting( "page_service_{$i}_features", array( 'default' => "Feature 1\nFeature 2", 'sanitize_callback' => 'sanitize_textarea_field' ) );
				$wp_customize->add_control( "page_service_{$i}_features", array( 'label' => "Service {$i} Features", 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
			}
		}
        if ( $id == 'about' ) {
            for($i = 1; $i <= 3; $i++) {
				$wp_customize->add_setting( "team_member_{$i}_name", array( 'default' => 'Expert ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "team_member_{$i}_name", array( 'label' => "Member {$i} Name", 'section' => "layunin_page_{$id}" ) );
				$wp_customize->add_setting( "team_member_{$i}_role", array( 'default' => 'Specialist', 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "team_member_{$i}_role", array( 'label' => "Member {$i} Role", 'section' => "layunin_page_{$id}" ) );
                $wp_customize->add_setting( "team_member_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "team_member_{$i}_image", array( 'label' => "Member {$i} Photo", 'section' => "layunin_page_{$id}" ) ) );
			}
        }
		if ( $id == 'free_resources' ) {
			for($i = 1; $i <= 4; $i++) {
				$wp_customize->add_setting( "resource_{$i}_title", array( 'default' => 'Resource ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "resource_{$i}_title", array( 'label' => "Resource {$i} Title", 'section' => "layunin_page_{$id}" ) );
				$wp_customize->add_setting( "resource_{$i}_link", array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
				$wp_customize->add_control( "resource_{$i}_link", array( 'label' => "Resource {$i} Link", 'section' => "layunin_page_{$id}" ) );
			}
		}
	}

	// 6. Footer Options
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Footer Settings', 'priority' => 42 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Transforming Filipino goals into reality...', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'footer_col2_title', array( 'default' => 'Platform', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_col2_title', array( 'label' => 'Column 2 Title', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_col3_title', array( 'default' => 'Resources', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_col3_title', array( 'label' => 'Column 3 Title', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_newsletter_title', array( 'default' => 'Daily Clarity', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => 'layunin_footer_options' ) );

    $wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_trust_statement', array( 'default' => 'Philippines\' Leading Success System.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_trust_statement', array( 'label' => 'Trust Statement', 'section' => 'layunin_footer_options' ) );

	// 7. SEO & Social
	$wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 50 ) );
	$wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin - The Goal Transformation Engine for Filipinos.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );
	$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}

	// 8. Automation
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Recreate Core Pages', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function layunin_customize_preview_init() {
	wp_enqueue_script( 'layunin-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'layunin_customize_preview_init' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
