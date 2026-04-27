<?php
/**
 * Register Custom Post Types
 */

function layunin_register_cpts() {
	// Testimonials CPT
	register_post_type( 'testimonial', array(
		'labels'      => array(
			'name'          => __( 'Testimonials', 'layunin' ),
			'singular_name' => __( 'Testimonial', 'layunin' ),
		),
		'public'      => true,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-testimonial',
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
	) );

	// Resources CPT
	register_post_type( 'resource', array(
		'labels'      => array(
			'name'          => __( 'Resources', 'layunin' ),
			'singular_name' => __( 'Resource', 'layunin' ),
		),
		'public'      => true,
		'has_archive' => true,
		'menu_icon'   => 'dashicons-media-document',
		'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'     => array( 'slug' => 'resources' ),
	) );
}
add_action( 'init', 'layunin_register_cpts' );
