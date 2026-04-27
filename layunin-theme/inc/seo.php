<?php
/**
 * SEO and Schema implementation
 */

function layunin_schema_markup() {
	if ( is_single() ) {
		global $post;
		$schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Article',
			'headline' => get_the_title(),
			'datePublished' => get_the_date('c'),
			'dateModified' => get_the_modified_date('c'),
			'author' => array(
				'@type' => 'Person',
				'name'  => get_the_author(),
			),
			'publisher' => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo('name'),
				'logo'  => array(
					'@type' => 'ImageObject',
					'url'   => get_site_icon_url(),
				),
			),
			'description' => get_the_excerpt(),
		);
		echo '<script type="application/ld+json">' . json_encode( $schema ) . '</script>';
	}
}
add_action( 'wp_head', 'layunin_schema_markup' );

function layunin_breadcrumbs() {
    if ( is_front_page() ) return;

    echo '<nav class="breadcrumbs container my-3 small text-muted" aria-label="breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>';

    if ( is_category() || is_single() ) {
        echo ' &raquo; ';
        the_category( ' &bull; ' );
        if ( is_single() ) {
            echo ' &raquo; ' . get_the_title();
        }
    } elseif ( is_page() ) {
        echo ' &raquo; ' . get_the_title();
    }
    echo '</nav>';
}

// Pricing Table Shortcode
function layunin_pricing_table_shortcode( $atts, $content = null ) {
    return '<div class="pricing-table-wrapper row justify-content-center mt-5">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'pricing_table', 'layunin_pricing_table_shortcode' );

function layunin_pricing_item_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'title' => 'Starter',
        'price' => '₱0',
        'features' => '',
        'link' => '#',
        'button' => 'Get Started',
        'featured' => 'no'
    ), $atts );

    $featured_class = ($a['featured'] == 'yes') ? 'featured border-accent shadow-lg' : 'border-0 shadow-sm';
    $features_list = explode('|', $a['features']);
    $features_html = '';
    foreach($features_list as $feature) {
        $features_html .= '<li class="mb-2"><i class="fas fa-check text-accent me-2"></i>' . esc_html(trim($feature)) . '</li>';
    }

    return '
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="pricing-card card ' . $featured_class . ' text-center p-5">
            <h3 class="h5 text-uppercase fw-bold mb-3">' . esc_html($a['title']) . '</h3>
            <div class="price display-4 fw-bold mb-4 text-navy">' . esc_html($a['price']) . '</div>
            <ul class="list-unstyled mb-5 text-start">' . $features_html . '</ul>
            <a href="' . esc_url($a['link']) . '" class="btn ' . (($a['featured'] == 'yes') ? 'btn-gold' : 'btn-outline-primary') . ' w-100">' . esc_html($a['button']) . '</a>
        </div>
    </div>';
}
add_shortcode( 'pricing_item', 'layunin_pricing_item_shortcode' );

// FAQ Schema Shortcode
function layunin_faq_schema_shortcode( $atts, $content = null ) {
    return '<div class="faq-section" itemscope itemtype="https://schema.org/FAQPage">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'faq_page', 'layunin_faq_schema_shortcode' );

function layunin_faq_item_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'question' => '',
    ), $atts );
    return '
    <div class="faq-item" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
        <h3 itemprop="name">' . esc_html($a['question']) . '</h3>
        <div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
            <div itemprop="text">' . do_shortcode($content) . '</div>
        </div>
    </div>';
}
add_shortcode( 'faq_item', 'layunin_faq_item_shortcode' );
