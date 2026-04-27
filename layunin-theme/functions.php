<?php
/**
 * Layunin functions and definitions
 */

if ( ! function_exists( 'layunin_setup' ) ) :
	function layunin_setup() {
		load_theme_textdomain( 'layunin', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'layunin' ),
			'footer' => esc_html__( 'Footer', 'layunin' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'layunin_setup' );

function layunin_scripts() {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );
	wp_enqueue_style( 'layunin-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap', array(), null );
	wp_enqueue_style( 'layunin-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_style( 'layunin-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true );
	wp_enqueue_script( 'layunin-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'layunin_scripts' );

function layunin_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil( $word_count / 200 );
    return $reading_time;
}

function layunin_generate_toc( $content ) {
    if ( ! is_single() ) return $content;

    preg_match_all( '/<h[2-3].*?>(.*?)<\/h[2-3]>/', $content, $matches );

    if ( empty( $matches[0] ) ) return $content;

    $toc = '<div class="table-of-contents p-4 bg-light border rounded mb-4">';
    $toc .= '<h4 class="h6 text-uppercase fw-bold mb-3">Table of Contents</h4><ul>';

    foreach ( $matches[1] as $i => $title ) {
        $slug = sanitize_title( $title );
        $content = str_replace( $matches[0][$i], sprintf( '<h%d id="%s">%s</h%d>', (strpos($matches[0][$i], 'h2') !== false ? 2 : 3), $slug, $title, (strpos($matches[0][$i], 'h2') !== false ? 2 : 3) ), $content );
        $toc .= sprintf( '<li><a href="#%s">%s</a></li>', $slug, $title );
    }

    $toc .= '</ul></div>';

    return $toc . $content;
}
add_filter( 'the_content', 'layunin_generate_toc' );

// Require additional files
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/seo.php';
