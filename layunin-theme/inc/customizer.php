<?php
/**
 * Layunin Theme Customizer - Full Implementation
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

	// 2. Global Elements
	$wp_customize->add_section( 'layunin_global_elements', array( 'title' => 'Global Elements', 'priority' => 20 ) );
	$wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_global_elements', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'Exclusive: Get the 7-Day Goal Reset Guide Free Today!', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_global_elements', 'type' => 'text' ) );

	// 3. Homepage Content Panel
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );

	// Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => 'Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Your Goals Deserve More Than Just Dreams', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Hero Title', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Layunin helps you turn your goals into clear action, real income, and a meaningful life.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Hero Subtitle', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );

	// Problem Section
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => 'Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Feeling Stuck and Without Direction?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Problem Section Title', 'section' => 'layunin_home_problem' ) );

	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "problem_item_{$i}_title", array( 'default' => 'Problem Item ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_title", array( 'label' => "Item {$i} Title", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_desc", array( 'default' => 'Description for problem item ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_desc", array( 'label' => "Item {$i} Description", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_icon", array( 'default' => 'fas fa-exclamation-circle', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_icon", array( 'label' => "Item {$i} Icon (FontAwesome class)", 'section' => 'layunin_home_problem' ) );
	}

	// Solution Section
	$wp_customize->add_section( 'layunin_home_solution', array( 'title' => 'Solution Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'solution_title', array( 'default' => 'How Layunin Transforms Your Life', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'solution_title', array( 'label' => 'Solution Section Title', 'section' => 'layunin_home_solution' ) );

	// Categories Section
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => 'Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Focus Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Categories Title', 'section' => 'layunin_home_categories' ) );

	for($i = 1; $i <= 6; $i++) {
		$wp_customize->add_setting( "category_item_{$i}_title", array( 'default' => 'Category ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_title", array( 'label' => "Category {$i} Title", 'section' => 'layunin_home_categories' ) );
		$wp_customize->add_setting( "category_item_{$i}_icon", array( 'default' => 'fas fa-star', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "category_item_{$i}_icon", array( 'label' => "Category {$i} Icon", 'section' => 'layunin_home_categories' ) );
	}

	// Products Section
	$wp_customize->add_section( 'layunin_home_products', array( 'title' => 'Products Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'products_title', array( 'default' => 'Premium Resources to Accelerate Your Success', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'products_title', array( 'label' => 'Products Title', 'section' => 'layunin_home_products' ) );

	// Services Section
	$wp_customize->add_section( 'layunin_home_services', array( 'title' => 'Services Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'services_home_title', array( 'default' => 'Work With Us', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'services_home_title', array( 'label' => 'Services Title', 'section' => 'layunin_home_services' ) );

	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "service_item_{$i}_title", array( 'default' => 'Service ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_item_{$i}_title", array( 'label' => "Service {$i} Title", 'section' => 'layunin_home_services' ) );
		$wp_customize->add_setting( "service_item_{$i}_desc", array( 'default' => 'Description for service ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_item_{$i}_desc", array( 'label' => "Service {$i} Description", 'section' => 'layunin_home_services' ) );
		$wp_customize->add_setting( "service_item_{$i}_icon", array( 'default' => 'fas fa-cog', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "service_item_{$i}_icon", array( 'label' => "Service {$i} Icon", 'section' => 'layunin_home_services' ) );
	}

	// 4. Page Content Control Panel
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
		'privacy' => 'Privacy Policy',
		'terms' => 'Terms of Service',
		'affiliate' => 'Affiliate Disclosure'
	);
	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
		$wp_customize->add_setting( "{$id}_content", array( 'default' => 'Content for ' . $label, 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
	}

	// 5. Sidebar Options
	$wp_customize->add_section( 'layunin_sidebar_options', array( 'title' => 'Sidebar & Widgets', 'priority' => 45 ) );
	$wp_customize->add_setting( 'sidebar_bio_text', array( 'default' => 'Dedicated to helping Filipinos achieve their greatest Layunin.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'sidebar_bio_text', array( 'label' => 'Sidebar Bio Text', 'section' => 'layunin_sidebar_options', 'type' => 'textarea' ) );

	// 6. SEO & Social
	$wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 50 ) );
	$wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin - Empowering Filipinos to transform goals into action.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );
	$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}

	// 6. Popup Options
	$wp_customize->add_section( 'layunin_popup_options', array( 'title' => 'Lead Popup', 'priority' => 60 ) );
	$wp_customize->add_setting( 'show_popup', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_popup', array( 'label' => 'Enable Popup', 'section' => 'layunin_popup_options', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'popup_title', array( 'default' => "Wait! Don't Miss Out", 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'popup_title', array( 'label' => 'Popup Title', 'section' => 'layunin_popup_options' ) );

	// 7. Site Automation
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Recreate Missing Recommended Pages', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
