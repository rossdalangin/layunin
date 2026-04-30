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

	// Breadcrumb Schema
	if ( ! is_front_page() ) {
		$breadcrumb_schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'BreadcrumbList',
			'itemListElement' => array(
				array(
					'@type' => 'ListItem',
					'position' => 1,
					'name' => get_theme_mod('breadcrumb_home_label', 'Launchpad'),
					'item' => home_url()
				)
			)
		);
		if ( is_page() || is_single() ) {
			$breadcrumb_schema['itemListElement'][] = array(
				'@type' => 'ListItem',
				'position' => 2,
				'name' => get_the_title(),
				'item' => get_permalink()
			);
		}
		echo '<script type="application/ld+json">' . json_encode( $breadcrumb_schema ) . '</script>';
	}

	// Testimonial Schema (Review)
	if ( is_front_page() && get_theme_mod( 'show_home_testimonials', true ) ) {
		$testimonial_schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Review',
			'itemReviewed' => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo('name')
			),
			'reviewRating' => array(
				'@type' => 'Rating',
				'ratingValue' => '5'
			),
			'author' => array(
				'@type' => 'Person',
				'name'  => get_theme_mod('testimonial_author', 'Maria Santos')
			),
			'reviewBody' => get_theme_mod('testimonial_quote')
		);
		echo '<script type="application/ld+json">' . json_encode( $testimonial_schema ) . '</script>';
	}
}
add_action( 'wp_head', 'layunin_schema_markup' );

function layunin_breadcrumbs() {
    if ( is_front_page() ) return;

    $home_label = get_theme_mod('breadcrumb_home_label', 'Launchpad');
    echo '<nav class="breadcrumbs container my-phi-s small text-muted" aria-label="breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="breadcrumb-home-label">' . esc_html($home_label) . '</a>';

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
    return '<div class="pricing-table-wrapper row justify-content-center mt-phi">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'pricing_table', 'layunin_pricing_table_shortcode' );

function layunin_pricing_item_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'title' => 'Starter',
        'price' => '&#8369;0',
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
    <div class="col-lg-4 col-md-6 mb-phi-l">
        <div class="pricing-card card ' . $featured_class . ' text-center p-5">
            <h3 class="h5 text-uppercase fw-bold mb-phi-s">' . esc_html($a['title']) . '</h3>
            <div class="price display-4 fw-bold mb-phi-l text-navy">' . esc_html($a['price']) . '</div>
            <ul class="list-unstyled mb-phi text-start">' . $features_html . '</ul>
            <a href="' . esc_url($a['link']) . '" class="btn ' . (($a['featured'] == 'yes') ? 'btn-gold' : 'btn-outline-primary') . ' w-100">' . esc_html($a['button']) . '</a>
        </div>
    </div>';
}
add_shortcode( 'pricing_item', 'layunin_pricing_item_shortcode' );

// CTA Box Shortcode
function layunin_cta_shortcode( $atts ) {
    $a = shortcode_atts( array(
        'title' => 'Ready to take action?',
        'button_text' => 'Get the Free Guide',
        'button_url' => '#'
    ), $atts );

    return '
    <div class="content-cta cta-box newsletter-box p-5 my-phi text-center shadow-lg animate-up">
        <h3 class="text-white mb-phi-l fw-bold">' . esc_html($a['title']) . '</h3>
        <a href="' . esc_url($a['button_url']) . '" class="btn btn-gold btn-lg px-5 shadow-lg fw-black">' . esc_html($a['button_text']) . '</a>
    </div>';
}
add_shortcode( 'cta_box', 'layunin_cta_shortcode' );

// Benefit List Shortcode
function layunin_benefit_list_shortcode( $atts, $content = null ) {
    return '<ul class="benefit-list list-unstyled row my-phi">' . do_shortcode($content) . '</ul>';
}
add_shortcode( 'benefit_list', 'layunin_benefit_list_shortcode' );

function layunin_benefit_item_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'title' => '',
        'icon' => 'fas fa-check'
    ), $atts );
    return '
    <div class="col-md-6 mb-phi-l">
        <div class="d-flex align-items-start">
            <div class="benefit-icon me-3 text-accent fs-4"><i class="' . esc_attr($a['icon']) . '"></i></div>
            <div>
                <h4 class="h6 fw-bold mb-1">' . esc_html($a['title']) . '</h4>
                <div class="small text-muted">' . do_shortcode($content) . '</div>
            </div>
        </div>
    </div>';
}
add_shortcode( 'benefit_item', 'layunin_benefit_item_shortcode' );

// Testimonial Grid Shortcode
function layunin_testimonial_grid_shortcode( $atts, $content = null ) {
    return '<div class="testimonial-grid row my-phi">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'testimonial_grid', 'layunin_testimonial_grid_shortcode' );

function layunin_testimonial_item_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
        'name' => 'John Doe',
        'role' => 'Achiever',
        'image' => ''
    ), $atts );

    $img_html = $a['image'] ? '<img src="' . esc_url($a['image']) . '" class="rounded-circle mb-phi-s" style="width:60px; height:60px; object-fit:cover;">' : '';

    return '
    <div class="col-md-4 mb-phi-l">
        <div class="testimonial-card card p-4 shadow-sm border-0 animate-up text-center">
            ' . $img_html . '
            <blockquote class="small font-italic mb-phi-s">"' . do_shortcode($content) . '"</blockquote>
            <div class="fw-bold text-navy">' . esc_html($a['name']) . '</div>
            <div class="small text-muted">' . esc_html($a['role']) . '</div>
        </div>
    </div>';
}
add_shortcode( 'testimonial_item', 'layunin_testimonial_item_shortcode' );

// FAQ Schema Shortcode
function layunin_faq_schema_shortcode( $atts, $content = null ) {
    global $layunin_faq_parent_id;
    static $faq_counter = 0;
    $faq_counter++;
    $layunin_faq_parent_id = 'faq-accordion-' . $faq_counter;

    return '<div class="faq-section accordion" id="' . esc_attr($layunin_faq_parent_id) . '" itemscope itemtype="https://schema.org/FAQPage">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'faq_page', 'layunin_faq_schema_shortcode' );

function layunin_faq_item_shortcode( $atts, $content = null ) {
    global $layunin_faq_parent_id;
    static $item_counter = 0;
    $item_counter++;
    $a = shortcode_atts( array(
        'question' => '',
    ), $atts );
    $id = 'faq-collapse-' . $item_counter;
    $parent_attr = $layunin_faq_parent_id ? ' data-bs-parent="#' . esc_attr($layunin_faq_parent_id) . '"' : '';

    return '
    <div class="accordion-item border-0 mb-phi-s shadow-sm rounded-4 overflow-hidden" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
        <h2 class="accordion-header" itemprop="name">
            <button class="accordion-button collapsed fw-bold text-navy py-3 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#' . $id . '" aria-expanded="false" aria-controls="' . $id . '">
                ' . esc_html($a['question']) . '
            </button>
        </h2>
        <div id="' . $id . '" class="accordion-collapse collapse"' . $parent_attr . ' itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
            <div class="accordion-body px-4 pb-4 text-muted" itemprop="text">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </div>';
}
add_shortcode( 'faq_item', 'layunin_faq_item_shortcode' );
