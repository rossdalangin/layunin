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

function layunin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'layunin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'layunin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s mb-5">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h5 text-uppercase fw-bold mb-4">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'layunin_widgets_init' );
add_action( 'after_setup_theme', 'layunin_setup' );

function layunin_scripts() {
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0' );
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

	$body_font = get_theme_mod( 'body_font', 'Inter' );
	$fonts_url = 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&display=swap';
	if ( $body_font === 'Roboto' ) {
		$fonts_url .= '&family=Roboto:wght@400;700';
	} elseif ( $body_font === 'Open Sans' ) {
		$fonts_url .= '&family=Open+Sans:wght@400;700';
	} else {
		$fonts_url .= '&family=Inter:wght@400;600;700;800;900';
	}

	wp_enqueue_style( 'layunin-fonts', $fonts_url, array(), null );
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

    // More robust regex to handle attributes in tags
    preg_match_all( '/<(h[2-3]).*?>(.*?)<\/\1>/i', $content, $matches );

    if ( empty( $matches[0] ) ) return $content;

    $toc = '<div class="table-of-contents p-4 bg-light border rounded mb-4">';
    $toc .= '<h4 class="h6 text-uppercase fw-bold mb-3">Table of Contents</h4><ul>';

    foreach ( $matches[2] as $i => $title ) {
        $tag = $matches[1][$i];
        $slug = sanitize_title( $title ) . '-' . $i; // Ensure unique ID
        $content = str_replace( $matches[0][$i], sprintf( '<%s id="%s">%s</%s>', $tag, $slug, $title, $tag ), $content );
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
require get_template_directory() . '/inc/page-creator.php';
