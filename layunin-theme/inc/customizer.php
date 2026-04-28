<?php
/**
 * Layunin Theme Customizer - Masterpiece Implementation (v4.0)
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
	$wp_customize->add_setting( 'header_cta_text', array( 'default' => 'Work With Us', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_text', array( 'label' => 'Header CTA Button Text', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'header_cta_link', array( 'default' => '/contact/', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'header_cta_link', array( 'label' => 'Header CTA Button Link', 'section' => 'layunin_header_settings' ) );
	$wp_customize->add_setting( 'logo_width', array( 'default' => '180', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'logo_width', array( 'label' => 'Logo Max Width (px)', 'section' => 'layunin_header_settings', 'type' => 'number' ) );

	// 3. Global Elements
	$wp_customize->add_section( 'layunin_global_elements', array( 'title' => 'Global Elements', 'priority' => 20 ) );
	$wp_customize->add_setting( 'show_announcement', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_announcement', array( 'label' => 'Show Announcement Bar', 'section' => 'layunin_global_elements', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'announcement_text', array( 'default' => 'EXCLUSIVE: Claim Your Free 7-Day Goal Reset Guide & Transform Your Life!', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'announcement_text', array( 'label' => 'Announcement Text', 'section' => 'layunin_global_elements', 'type' => 'text' ) );
	$wp_customize->add_setting( 'announcement_link', array( 'default' => '/lead-magnet/', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( 'announcement_link', array( 'label' => 'Announcement Link', 'section' => 'layunin_global_elements', 'type' => 'text' ) );

	// 4. Homepage Content Panel
	$wp_customize->add_panel( 'layunin_homepage_panel', array( 'title' => 'Homepage Content', 'priority' => 30 ) );

	// Hero
	$wp_customize->add_section( 'layunin_home_hero', array( 'title' => 'Hero Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'hero_headline', array( 'default' => 'Your Goals Deserve More Than Just Dreams', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_headline', array( 'label' => 'Hero Title', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_subheadline', array( 'default' => 'Layunin helps you turn your deepest aspirations into clear action, real income, and a more meaningful life.', 'sanitize_callback' => 'sanitize_textarea_field', 'transport' => 'postMessage' ) );
	$wp_customize->add_control( 'hero_subheadline', array( 'label' => 'Hero Subtitle', 'section' => 'layunin_home_hero', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'hero_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array( 'label' => 'Hero Background Image', 'section' => 'layunin_home_hero' ) ) );
	$wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Download Free Guide', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'CTA 1 Text', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'Start Your Journey', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'CTA 2 Text', 'section' => 'layunin_home_hero' ) );

	// Problem Section
	$wp_customize->add_section( 'layunin_home_problem', array( 'title' => 'Problem Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'problem_title', array( 'default' => 'Why Most Goals Fail Before They Even Start', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'problem_title', array( 'label' => 'Problem Section Title', 'section' => 'layunin_home_problem' ) );

	$problem_defaults = array(
		1 => array('title' => 'Lack of Direction', 'desc' => 'You have big dreams but no idea which step to take first.', 'icon' => 'fas fa-map-signs'),
		2 => array('title' => 'Stagnant Income', 'desc' => 'Your financial growth hasn\'t kept pace with your ambitions.', 'icon' => 'fas fa-chart-line-down'),
		3 => array('title' => 'Total Overwhelm', 'desc' => 'The noise of the digital world leaves you paralyzed by choices.', 'icon' => 'fas fa-brain'),
		4 => array('title' => 'Procrastination', 'desc' => 'You start many things but finish almost nothing. The cycle continues.', 'icon' => 'fas fa-hourglass-half'),
	);

	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "problem_item_{$i}_title", array( 'default' => $problem_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_title", array( 'label' => "Item {$i} Title", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_desc", array( 'default' => $problem_defaults[$i]['desc'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_desc", array( 'label' => "Item {$i} Description", 'section' => 'layunin_home_problem' ) );
		$wp_customize->add_setting( "problem_item_{$i}_icon", array( 'default' => $problem_defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "problem_item_{$i}_icon", array( 'label' => "Item {$i} Icon", 'section' => 'layunin_home_problem' ) );
	}

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
		$wp_customize->add_setting( "{$id}_content", array( 'default' => 'Empowering content for ' . $label, 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );
	}

	// 6. Footer Options
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Footer Settings', 'priority' => 42 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Helping Filipinos transform their goals into action, income, and success through practical systems and AI productivity tools.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Footer Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );

	$wp_customize->add_setting( 'footer_col2_title', array( 'default' => 'Explore', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_col2_title', array( 'label' => 'Column 2 Title', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_col3_title', array( 'default' => 'Resources', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_col3_title', array( 'label' => 'Column 3 Title', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_newsletter_title', array( 'default' => 'Stay Ahead', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© ' . date('Y') . ' Layunin.com. All rights reserved.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_copyright', array( 'label' => 'Copyright Text', 'section' => 'layunin_footer_options' ) );

	$wp_customize->add_setting( 'footer_trust_statement', array( 'default' => 'Built with purpose for the modern Filipino achiever.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_trust_statement', array( 'label' => 'Footer Trust Statement', 'section' => 'layunin_footer_options' ) );

	// 7. SEO & Social
	$wp_customize->add_section( 'layunin_seo_social', array( 'title' => 'SEO & Social Media', 'priority' => 50 ) );
	$wp_customize->add_setting( 'meta_description', array( 'default' => 'Layunin helps Filipinos achieve their goals through education, tools, and professional guidance.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'meta_description', array( 'label' => 'Meta Description', 'section' => 'layunin_seo_social', 'type' => 'textarea' ) );
	$socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
	foreach ( $socials as $social ) {
		$wp_customize->add_setting( "social_{$social}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "social_{$social}", array( 'label' => ucfirst( $social ) . ' URL', 'section' => 'layunin_seo_social' ) );
	}

	// 8. Blog Options
	$wp_customize->add_section( 'layunin_blog_options', array( 'title' => 'Blog Settings', 'priority' => 55 ) );
	$wp_customize->add_setting( 'blog_layout', array( 'default' => 'grid', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'blog_layout', array(
		'label'   => 'Archive Layout',
		'section' => 'layunin_blog_options',
		'type'    => 'select',
		'choices' => array('grid' => 'Grid (3 Columns)', 'list' => 'List View')
	) );
	$wp_customize->add_setting( 'show_author_box', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_author_box', array( 'label' => 'Show Author Box', 'section' => 'layunin_blog_options', 'type' => 'checkbox' ) );

	// 9. Automation
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Recreate Recommended Pages', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
