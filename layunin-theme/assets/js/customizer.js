/**
 * Live preview for Customizer
 */
( function( $ ) {
	wp.customize( 'hero_headline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-title' ).text( newval );
		} );
	} );
	wp.customize( 'hero_subheadline', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-subtitle' ).text( newval );
		} );
	} );
} )( jQuery );
