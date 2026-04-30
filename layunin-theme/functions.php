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

		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );
		add_theme_support( 'woocommerce' );
	}
endif;

function layunin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'layunin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'layunin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s mb-phi">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title h5 text-uppercase fw-bold mb-phi-l">',
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
	wp_enqueue_style( 'layunin-main', get_template_directory_uri() . '/assets/css/main.css', array(), '5.0.0' );

	wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true );
	wp_enqueue_script( 'layunin-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '5.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'layunin_scripts' );

function layunin_reading_time() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $wpm = get_theme_mod('blog_wpm', 200);
    if(!$wpm) $wpm = 200;
    $reading_time = ceil( $word_count / $wpm );
    return $reading_time;
}

function layunin_generate_toc( $content ) {
    if ( ! is_single() ) return $content;

    // Use a callback to ensure unique IDs and precise replacement
    $count = 0;
    $toc_items = array();

    $new_content = preg_replace_callback( '/<(h[2-3]).*?>(.*?)<\/\1>/i', function( $matches ) use ( &$count, &$toc_items ) {
        $tag = $matches[1];
        $title = strip_tags($matches[2]);
        $slug = sanitize_title( $title ) . '-' . $count;
        $count++;
        $toc_items[] = array('slug' => $slug, 'title' => $title, 'level' => $tag);
        return sprintf( '<%s id="%s">%s</%s>', $tag, $slug, $matches[2], $tag );
    }, $content );

    if ( empty( $toc_items ) ) return $content;

    $toc_title = get_theme_mod('toc_title', 'Strategic Overview');
    $toc = '<div class="table-of-contents p-4 bg-light border-0 rounded-4 mb-phi shadow-sm">';
    $toc .= '<h4 class="h6 text-uppercase fw-bold mb-phi-s text-navy toc-title"><i class="fas fa-list-ul me-2 text-accent"></i>' . esc_html($toc_title) . '</h4><ul class="list-unstyled mb-0">';

    foreach ( $toc_items as $item ) {
        $indent = ($item['level'] == 'h3') ? 'ps-4 small' : 'fw-bold small';
        $toc .= sprintf( '<li class="mb-2 %s"><a href="#%s" class="text-navy text-decoration-none hover-gold">%s</a></li>', $indent, $item['slug'], $item['title'] );
    }

    $toc .= '</ul></div>';

    return $toc . $new_content;
}
add_filter( 'the_content', 'layunin_generate_toc' );

/**
 * Custom User Profile Fields
 */
function layunin_add_user_social_fields( $contactmethods ) {
	$contactmethods['facebook'] = 'Facebook URL';
	$contactmethods['twitter']  = 'Twitter URL';
	$contactmethods['linkedin'] = 'LinkedIn URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'layunin_add_user_social_fields' );

/**
 * Add Bootstrap classes to nav menu links
 */
function layunin_nav_menu_link_attributes( $atts, $item, $args ) {
    if ( property_exists( $args, 'theme_location' ) ) {
        if ( $args->theme_location === 'menu-1' || $args->theme_location === 'footer' ) {
            $atts['class'] = 'nav-link';
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'layunin_nav_menu_link_attributes', 10, 3 );

/**
 * Add active class to current menu item
 */
function layunin_nav_menu_css_class( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'layunin_nav_menu_css_class', 10, 2 );

// Require additional files
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/seo.php';
require get_template_directory() . '/inc/page-creator.php';
