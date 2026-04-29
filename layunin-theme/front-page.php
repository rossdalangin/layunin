<?php
/**
 * The template for displaying the homepage
 */

get_header();

// Section 1: Hero
if ( get_theme_mod( 'show_home_hero', true ) ) {
	get_template_part( 'template-parts/home-hero' );
}

// Featured Posts
if ( get_theme_mod( 'show_home_featured_posts', true ) ) {
	get_template_part( 'template-parts/featured-posts' );
}

// Trust Badges
if ( get_theme_mod( 'show_home_trust_badges', true ) ) {
	get_template_part( 'template-parts/home-trust-badges' );
}

// Process Section
if ( get_theme_mod( 'show_home_process', true ) ) {
	get_template_part( 'template-parts/home-process' );
}

// Features Section
if ( get_theme_mod( 'show_home_features', true ) ) {
	get_template_part( 'template-parts/home-features' );
}

// Section 2: Problem
if ( get_theme_mod( 'show_home_problem', true ) ) {
	get_template_part( 'template-parts/home-problem' );
}

// Section 3: Solution
if ( get_theme_mod( 'show_home_solution', true ) ) {
	get_template_part( 'template-parts/home-solution' );
}

// Section 4: Featured Categories
if ( get_theme_mod( 'show_home_categories', true ) ) {
	get_template_part( 'template-parts/home-categories' );
}

// Section 5: Free Lead Magnet
if ( get_theme_mod( 'show_home_lead_magnet', true ) ) {
	get_template_part( 'template-parts/home-lead-magnet' );
}

// Section 6: Featured Products
if ( get_theme_mod( 'show_home_products', true ) ) {
	get_template_part( 'template-parts/home-products' );
}

// Section 7: Services
if ( get_theme_mod( 'show_home_services', true ) ) {
	get_template_part( 'template-parts/home-services' );
}

// Section 8: Testimonials
if ( get_theme_mod( 'show_home_testimonials', true ) ) {
	get_template_part( 'template-parts/home-testimonials' );
}

// Section 9: Final CTA
if ( get_theme_mod( 'show_home_final_cta', true ) ) {
	get_template_part( 'template-parts/home-final-cta' );
}

get_footer();
