<?php
/**
 * Layunin Theme Customizer - Advanced Granular Control
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

	// 3. Homepage Content
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Sections', 'priority' => 30 ) );

	// Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => 'Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Your Goals Deserve More Than Just Dreams', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Headline', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Layunin helps you turn your goals into clear action, real income, and a meaningful life.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Subheadline', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'hero_bg_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_bg_image', array( 'label' => 'Background Image', 'section' => 'layunin_home_hero' ) ) );

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
		'privacy' => 'Privacy Policy Page',
		'terms' => 'Terms Page',
		'affiliate' => 'Affiliate Disclosure Page'
	);

	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );

		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );

		$wp_customize->add_setting( "{$id}_content", array( 'default' => 'Professional content for ' . $label, 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );

		if ( $id == 'contact' ) {
			$wp_customize->add_setting( 'contact_email', array( 'default' => 'hello@layunin.com', 'sanitize_callback' => 'sanitize_email' ) );
			$wp_customize->add_control( 'contact_email', array( 'label' => 'Contact Email', 'section' => "layunin_page_{$id}" ) );
		}
	}

	// 5. SEO & Social
	$wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 50 ) );
	$wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin - Empowering Filipinos to transform goals into action.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );

	// Social Links
	$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}

	// 6. Automation Toggle
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Recreate Missing Recommended Pages', 'description' => 'Save to trigger creation.', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
