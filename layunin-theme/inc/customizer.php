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

	$wp_customize->add_setting( 'border_radius', array( 'default' => '24', 'sanitize_callback' => 'absint' ) );
	$wp_customize->add_control( 'border_radius', array( 'label' => 'Global Roundedness (px)', 'section' => 'layunin_design_system', 'type' => 'number' ) );

	// 2. Section Backgrounds
	$wp_customize->add_section( 'layunin_section_colors', array( 'title' => 'Section Backgrounds', 'priority' => 15 ) );
	$sections_bg = array('problem', 'solution', 'categories', 'products', 'services', 'testimonials');
	foreach ($sections_bg as $sec) {
		$wp_customize->add_setting( "bg_color_{$sec}", array( 'default' => ($sec == 'solution' || $sec == 'services' || $sec == 'testimonials' ? '#f9f9f9' : '#ffffff'), 'sanitize_callback' => 'sanitize_hex_color' ) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, "bg_color_{$sec}", array( 'label' => ucfirst($sec) . ' Background', 'section' => 'layunin_section_colors' ) ) );
	}

	// 3. Global Elements
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
	$wp_customize->add_setting( 'hero_cta_1_text', array( 'default' => 'Download Free Guide', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_1_text', array( 'label' => 'CTA 1 Text', 'section' => 'layunin_home_hero' ) );
	$wp_customize->add_setting( 'hero_cta_2_text', array( 'default' => 'Start Your Journey', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'hero_cta_2_text', array( 'label' => 'CTA 2 Text', 'section' => 'layunin_home_hero' ) );

	// Section Visibility
	$wp_customize->add_section( 'layunin_home_visibility', array( 'title' => 'Section Visibility', 'panel' => 'layunin_homepage_panel' ) );
	$sections = array('trust_badges', 'process', 'features', 'problem', 'solution', 'categories', 'lead_magnet', 'products', 'services', 'testimonials', 'final_cta');
	foreach ($sections as $section) {
		$wp_customize->add_setting( "show_home_{$section}", array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
		$wp_customize->add_control( "show_home_{$section}", array( 'label' => 'Show ' . ucfirst($section), 'section' => 'layunin_home_visibility', 'type' => 'checkbox' ) );
	}

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
	$wp_customize->add_setting( 'solution_desc', array( 'default' => 'We provide the roadmap and the tools you need to bridge the gap between where you are and where you want to be.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_desc', array( 'label' => 'Description', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'solution_bullets', array( 'default' => "Clarity: We help you define your 'Layunin' with precision.\nSystems: Proven frameworks for productivity.\nTools: Digital resources and AI assets.\nAccountability: Guidance to keep you moving.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'solution_bullets', array( 'label' => 'Bullet Points (one per line)', 'section' => 'layunin_home_solution', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'solution_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'solution_image', array( 'label' => 'Section Image', 'section' => 'layunin_home_solution' ) ) );

	// Process Section
	$wp_customize->add_section( 'layunin_home_process', array( 'title' => 'Process Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'process_title', array( 'default' => 'How Layunin Works', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'process_title', array( 'label' => 'Section Title', 'section' => 'layunin_home_process' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "process_step_{$i}_title", array( 'default' => 'Step ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "process_step_{$i}_title", array( 'label' => "Step {$i} Title", 'section' => 'layunin_home_process' ) );
		$wp_customize->add_setting( "process_step_{$i}_desc", array( 'default' => 'Description for step ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "process_step_{$i}_desc", array( 'label' => "Step {$i} Description", 'section' => 'layunin_home_process' ) );
	}

	// Features Section
	$wp_customize->add_section( 'layunin_home_features', array( 'title' => 'Features Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'features_title', array( 'default' => 'Why Choose Layunin?', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'features_title', array( 'label' => 'Section Title', 'section' => 'layunin_home_features' ) );
	for($i = 1; $i <= 3; $i++) {
		$wp_customize->add_setting( "feature_{$i}_title", array( 'default' => 'Benefit ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "feature_{$i}_title", array( 'label' => "Feature {$i} Title", 'section' => 'layunin_home_features' ) );
		$wp_customize->add_setting( "feature_{$i}_desc", array( 'default' => 'How this benefit helps you.', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "feature_{$i}_desc", array( 'label' => "Feature {$i} Description", 'section' => 'layunin_home_features' ) );
	}

	// Categories Section
	$wp_customize->add_section( 'layunin_home_categories', array( 'title' => 'Categories Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'categories_title', array( 'default' => 'Explore Our Focus Areas', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_title', array( 'label' => 'Categories Title', 'section' => 'layunin_home_categories' ) );
	$wp_customize->add_setting( 'categories_desc', array( 'default' => 'Practical guidance for every step of your journey.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'categories_desc', array( 'label' => 'Categories Description', 'section' => 'layunin_home_categories' ) );

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
		'affiliate' => 'Affiliate Disclosure',
		'404' => '404 Page',
		'search' => 'Search Results Page'
	);
	foreach ( $pages as $id => $label ) {
		$wp_customize->add_section( "layunin_page_{$id}", array( 'title' => $label, 'panel' => 'layunin_pages_panel' ) );
		$wp_customize->add_setting( "{$id}_title", array( 'default' => $label, 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "{$id}_title", array( 'label' => 'Headline', 'section' => "layunin_page_{$id}" ) );
		$wp_customize->add_setting( "{$id}_content", array( 'default' => 'Content for ' . $label, 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "{$id}_content", array( 'label' => 'Main Content', 'section' => "layunin_page_{$id}", 'type' => 'textarea' ) );

		if ( $id == 'services' ) {
			for($i = 1; $i <= 3; $i++) {
				$wp_customize->add_setting( "page_service_{$i}_title", array( 'default' => 'Service ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "page_service_{$i}_title", array( 'label' => "Service {$i} Title", 'section' => "layunin_page_{$id}" ) );
				$wp_customize->add_setting( "page_service_{$i}_desc", array( 'default' => 'Description for service ' . $i, 'sanitize_callback' => 'sanitize_text_field' ) );
				$wp_customize->add_control( "page_service_{$i}_desc", array( 'label' => "Service {$i} Description", 'section' => "layunin_page_{$id}" ) );
			}
		}
	}

	// 5. Trust Badges
	$wp_customize->add_section( 'layunin_trust_badges', array( 'title' => 'Trust Badges', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'show_trust_badges', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_trust_badges', array( 'label' => 'Show Trust Badges', 'section' => 'layunin_trust_badges', 'type' => 'checkbox' ) );
	$wp_customize->add_setting( 'trust_badges_title', array( 'default' => 'Trusted By Forward-Thinking Filipinos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'trust_badges_title', array( 'label' => 'Section Title', 'section' => 'layunin_trust_badges' ) );

	for($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting( "trust_badge_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "trust_badge_{$i}", array( 'label' => "Badge {$i}", 'section' => 'layunin_trust_badges' ) ) );
	}

	// 6. Footer Options
	$wp_customize->add_section( 'layunin_footer_options', array( 'title' => 'Footer Settings', 'priority' => 42 ) );
	$wp_customize->add_setting( 'footer_branding_text', array( 'default' => 'Empowering Filipinos to turn their goals into action, income, and success. Your journey to a meaningful life starts here.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_branding_text', array( 'label' => 'Footer Branding Text', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'footer_newsletter_title', array( 'default' => 'Newsletter', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_newsletter_title', array( 'label' => 'Newsletter Title', 'section' => 'layunin_footer_options' ) );
	$wp_customize->add_setting( 'footer_newsletter_desc', array( 'default' => 'Join 10,000+ subscribers for weekly growth tips.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'footer_newsletter_desc', array( 'label' => 'Newsletter Description', 'section' => 'layunin_footer_options', 'type' => 'textarea' ) );

	// 6. Sidebar Options
	$wp_customize->add_section( 'layunin_sidebar_options', array( 'title' => 'Sidebar & Widgets', 'priority' => 45 ) );
	$wp_customize->add_setting( 'sidebar_bio_text', array( 'default' => 'Dedicated to helping Filipinos achieve their greatest Layunin.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'sidebar_bio_text', array( 'label' => 'Sidebar Bio Text', 'section' => 'layunin_sidebar_options', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'show_sidebar_newsletter', array( 'default' => true, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'show_sidebar_newsletter', array( 'label' => 'Show Newsletter in Sidebar', 'section' => 'layunin_sidebar_options', 'type' => 'checkbox' ) );

	$author_socials = array('author_facebook', 'author_twitter', 'author_linkedin');
	foreach ($author_socials as $social) {
		$wp_customize->add_setting( $social, array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( $social, array( 'label' => str_replace('_', ' ', ucfirst($social)) . ' URL', 'section' => 'layunin_sidebar_options' ) );
	}

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

	// 7. Final CTA Section
	$wp_customize->add_section( 'layunin_home_final_cta', array( 'title' => 'Final CTA Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'final_cta_title', array( 'default' => 'Your future starts with one decision.', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'final_cta_title', array( 'label' => 'Headline', 'section' => 'layunin_home_final_cta' ) );
	$wp_customize->add_setting( 'final_cta_desc', array( 'default' => 'Stop dreaming about your goals and start building them. We are here to guide you every step of the way.', 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'final_cta_desc', array( 'label' => 'Description', 'section' => 'layunin_home_final_cta', 'type' => 'textarea' ) );

	// 8. Testimonials Section
	$wp_customize->add_section( 'layunin_home_testimonials', array( 'title' => 'Testimonials Section', 'panel' => 'layunin_homepage_panel' ) );
	$wp_customize->add_setting( 'testimonial_quote', array( 'default' => "Layunin changed how I approach my career. I finally have the clarity I've been seeking for years. The systems are practical and the mindset shift is real.", 'sanitize_callback' => 'sanitize_textarea_field' ) );
	$wp_customize->add_control( 'testimonial_quote', array( 'label' => 'Quote', 'section' => 'layunin_home_testimonials', 'type' => 'textarea' ) );
	$wp_customize->add_setting( 'testimonial_author', array( 'default' => 'Maria Santos', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_author', array( 'label' => 'Author Name', 'section' => 'layunin_home_testimonials' ) );
	$wp_customize->add_setting( 'testimonial_role', array( 'default' => 'Digital Freelancer', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'testimonial_role', array( 'label' => 'Author Role', 'section' => 'layunin_home_testimonials' ) );
	$wp_customize->add_setting( 'testimonial_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'testimonial_image', array( 'label' => 'Author Image', 'section' => 'layunin_home_testimonials' ) ) );

	// 8. Site Automation
	$wp_customize->add_section( 'layunin_automation', array( 'title' => 'Site Automation', 'priority' => 100 ) );
	$wp_customize->add_setting( 'recreate_pages_trigger', array( 'default' => false, 'sanitize_callback' => 'layunin_sanitize_checkbox' ) );
	$wp_customize->add_control( 'recreate_pages_trigger', array( 'label' => 'Recreate Missing Recommended Pages', 'section' => 'layunin_automation', 'type' => 'checkbox' ) );
}
add_action( 'customize_register', 'layunin_customize_register' );

function layunin_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
