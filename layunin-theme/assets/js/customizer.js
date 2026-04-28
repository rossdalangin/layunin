/**
 * Live preview for Customizer - Definitive Masterpiece (v8.2)
 */
( function( $ ) {
    // Helper function for list-based updates
    function updateList( containerSelector, newval ) {
        var items = newval.split('\n');
        var html = '';
        items.forEach(function(item) {
            if(item.trim()) {
                html += '<li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> ' + item.trim() + '</li>';
            }
        });
        $( containerSelector ).html( html );
    }

    // Hero Section
	wp.customize( 'hero_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section h1' ).text( newval );
		} );
	} );
	wp.customize( 'hero_subheadline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section p.lead' ).text( newval );
		} );
	} );
    wp.customize( 'hero_cta_1_text', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-section .btn-gold' ).text( newval );
		} );
	} );

    // Colors
    wp.customize( 'primary_color', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css('--navy', newval);
		} );
	} );
    wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css('--gold', newval);
            $( ':root' ).css('--accent', newval);
		} );
	} );

    // Header Settings
    wp.customize( 'header_cta_text', function( value ) {
		value.bind( function( newval ) {
			$( '.header-cta .btn-gold' ).text( newval );
		} );
	} );
    wp.customize( 'logo_width', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css('--logo-width', newval + 'px');
		} );
	} );

    // Announcement Bar
    wp.customize( 'announcement_text', function( value ) {
		value.bind( function( newval ) {
			$( '.announcement-bar .text' ).text( newval );
		} );
	} );

    // Homepage Sections
    wp.customize( 'process_title', function( value ) { value.bind( function( newval ) { $( '.process-section h2' ).text( newval ); } ); } );
    wp.customize( 'features_title', function( value ) { value.bind( function( newval ) { $( '.features-section h2' ).text( newval ); } ); } );
    wp.customize( 'problem_title', function( value ) { value.bind( function( newval ) { $( '.problem-section h2' ).text( newval ); } ); } );
    wp.customize( 'solution_title', function( value ) { value.bind( function( newval ) { $( '.solution-section h2' ).text( newval ); } ); } );
    wp.customize( 'solution_desc', function( value ) { value.bind( function( newval ) { $( '.solution-section p.lead' ).text( newval ); } ); } );
    wp.customize( 'categories_title', function( value ) { value.bind( function( newval ) { $( '.categories-section h2' ).text( newval ); } ); } );
    wp.customize( 'categories_desc', function( value ) { value.bind( function( newval ) { $( '.categories-section .section-desc' ).text( newval ); } ); } );

    // Lead Magnet
    wp.customize( 'lm_title', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section h2' ).text( newval ); } ); } );
    wp.customize( 'lm_subtitle', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section p.fs-5' ).text( newval ); } ); } );
    wp.customize( 'lm_list', function( value ) { value.bind( function( newval ) { updateList( '.lead-magnet-section ul', newval ); } ); } );

    wp.customize( 'products_title', function( value ) { value.bind( function( newval ) { $( '.products-section h2' ).text( newval ); } ); } );
    wp.customize( 'services_home_title', function( value ) { value.bind( function( newval ) { $( '.services-section h2' ).text( newval ); } ); } );
    wp.customize( 'final_cta_title', function( value ) { value.bind( function( newval ) { $( '.final-cta-section h2' ).text( newval ); } ); } );
    wp.customize( 'final_cta_desc', function( value ) { value.bind( function( newval ) { $( '.final-cta-section p.lead' ).text( newval ); } ); } );

    // Page Management
    wp.customize( 'about_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );
    wp.customize( 'about_lead', function( value ) { value.bind( function( newval ) { $( '.lead' ).text( newval ); } ); } );

    wp.customize( 'services_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );

    wp.customize( 'contact_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );
    wp.customize( 'contact_content', function( value ) { value.bind( function( newval ) { $( '.lead' ).text( newval ); } ); } );

    wp.customize( 'shop_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );
    wp.customize( 'shop_content', function( value ) { value.bind( function( newval ) { $( '.lead' ).text( newval ); } ); } );

    wp.customize( 'free_resources_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );
    wp.customize( 'free_resources_content', function( value ) { value.bind( function( newval ) { $( '.lead' ).text( newval ); } ); } );

    wp.customize( 'testimonials_title', function( value ) { value.bind( function( newval ) { $( '.entry-title' ).text( newval ); } ); } );
    wp.customize( 'testimonials_content', function( value ) { value.bind( function( newval ) { $( '.lead' ).text( newval ); } ); } );

    // Loop through indexed items
    for ( var i = 1; i <= 6; i++ ) {
        ( function( i ) {
            // Process Steps
            wp.customize( 'process_step_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.process-section .col-md-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'process_step_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.process-section .col-md-4:nth-child(' + i + ') p' ).text( newval ); } ); } );

            // Features
            wp.customize( 'feature_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.features-section .col-md-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'feature_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.features-section .col-md-4:nth-child(' + i + ') p' ).text( newval ); } ); } );

            // Problem Items
            wp.customize( 'problem_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'problem_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') p' ).text( newval ); } ); } );

            // Service Items
            wp.customize( 'service_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'service_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') p' ).text( newval ); } ); } );
        } )( i );
    }

    // Footer
    wp.customize( 'footer_branding_text', function( value ) { value.bind( function( newval ) { $( '.site-footer p.text-white-50' ).text( newval ); } ); } );
    wp.customize( 'footer_copyright', function( value ) { value.bind( function( newval ) { $( '.site-footer .copyright' ).text( newval ); } ); } );

} )( jQuery );
