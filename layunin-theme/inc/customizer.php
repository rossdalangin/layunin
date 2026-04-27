<?php
/**
 * Layunin Theme Customizer
 */

function layunin_customize_register( $wp_customize ) {
	// Brand Identity Section
	$wp_customize->add_section( 'layunin_theme_options', array(
		'title'    => __( 'Theme Options', 'layunin' ),
		'priority' => 30,
	) );

	// Typography
	$wp_customize->add_setting( 'body_font', array( 'default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'body_font', array(
		'label'   => __( 'Body Font', 'layunin' ),
		'section' => 'layunin_theme_options',
		'type'    => 'select',
		'choices' => array(
			'Inter' => 'Inter',
			'Roboto' => 'Roboto',
			'Open Sans' => 'Open Sans',
		),
	) );

	// Colors
	$wp_customize->add_setting( 'primary_color', array( 'default' => '#001f3f', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array( 'label' => __( 'Primary Color (Deep Navy)', 'layunin' ), 'section' => 'colors' ) ) );

	$wp_customize->add_setting( 'accent_color', array( 'default' => '#D4AF37', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array( 'label' => __( 'Accent Color (Warm Gold)', 'layunin' ), 'section' => 'colors' ) ) );

	$wp_customize->add_setting( 'cat_goal_color', array( 'default' => '#001f3f', 'sanitize_callback' => 'sanitize_hex_color' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cat_goal_color', array( 'label' => __( 'Goal Setting Color', 'layunin' ), 'section' => 'colors' ) ) );

	// Announcement Bar
	$wp_customize->add_section( 'layunin_announcement', array( 'title' => __( 'Announcement Bar', 'layunin' ), 'priority' => 35 ) );
	$wp_customize->add_setting( 'show_announcement', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => __( 'Show Announcement Bar', 'layunin' ), 'section' => 'layunin_announcement', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'Check out our new Goal Planner!', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => __( 'Announcement Text', 'layunin' ), 'section' => 'layunin_announcement', 'type' => 'text' ) );

	// Homepage Hero
	$wp_customize->add_section( 'layunin_hero_section', array( 'title' => __( 'Homepage Hero', 'layunin' ), 'priority' => 40 ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Your Goals Deserve More Than Just Dreams', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => __( 'Hero Headline', 'layunin' ), 'section' => 'layunin_hero_section', 'type' => 'text' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Layunin helps you turn your goals into clear action, real income, and a meaningful life.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => __( 'Hero Subheadline', 'layunin' ), 'section' => 'layunin_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'hero_bg_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_bg_image', array( 'label' => __( 'Hero Background Image', 'layunin' ), 'section' => 'layunin_hero_section' ) ) );

	// Social Links
	$wp_customize->add_section( 'layunin_social_links', array( 'title' => __( 'Social Links', 'layunin' ), 'priority' => 50 ) );
	$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ), 'section' => 'layunin_social_links', 'type' => 'url' ) );
	}

    // Toggle for Homepage Sections
    $sections = array('problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
    foreach ($sections as $section) {
        $wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
        $wp_customize->add_control( "show_home_{$section}", array(
            'label' => __( 'Show ' . str_replace('_', ' ', ucfirst($section)) . ' Section', 'layunin' ),
            'section' => 'layunin_theme_options',
            'type' => 'checkbox'
        ) );
    }

	// Monetization
	$wp_customize->add_section( 'layunin_monetization', array( 'title' => __( 'Monetization & Ads', 'layunin' ), 'priority' => 60 ) );
	$wp_customize->add_setting( 'affiliate_banner_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'affiliate_banner_url', array( 'label' => __( 'Sidebar Affiliate Banner', 'layunin' ), 'section' => 'layunin_monetization' ) ) );

	// Blog Options
	$wp_customize->add_section( 'layunin_blog_options', array( 'title' => __( 'Blog Options', 'layunin' ), 'priority' => 70 ) );
	$wp_customize->add_setting( 'show_author_box', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_author_box', array( 'label' => __( 'Show Author Box', 'layunin' ), 'section' => 'layunin_blog_options', 'type' => 'checkbox' ) );

	// Popup Options
	$wp_customize->add_section( 'layunin_popup_options', array( 'title' => __( 'Popup Options', 'layunin' ), 'priority' => 80 ) );
	$wp_customize->add_setting( 'show_popup', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_popup', array( 'label' => __( 'Enable Popup', 'layunin' ), 'section' => 'layunin_popup_options', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'popup_title', array( 'default' => "Wait! Don't Miss Out", 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'popup_title', array( 'label' => __( 'Popup Title', 'layunin' ), 'section' => 'layunin_popup_options', 'type' => 'text' ) );

	// Footer Options
	$wp_customize->add_setting( 'footer_text', array( 'default' => 'Your Goals Deserve More Than Just Dreams.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_text', array( 'label' => __( 'Footer Text', 'layunin' ), 'section' => 'layunin_theme_options', 'type' => 'text' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
