/**
 * Live preview for Customizer - Definitive Masterpiece
 */
( function( $ ) {
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

} )( jQuery );
