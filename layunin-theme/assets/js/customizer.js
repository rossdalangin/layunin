/**
 * Live preview for Customizer - Enhanced
 */
( function( $ ) {
	wp.customize( 'hero_headline', function( value ) {
		value.bind( function( newval ) {
			$( '#hero-headline' ).text( newval );
		} );
	} );
	wp.customize( 'hero_subheadline', function( value ) {
		value.bind( function( newval ) {
			$( '#hero-subheadline' ).text( newval );
		} );
	} );
    wp.customize( 'primary_color', function( value ) {
		value.bind( function( newval ) {
			$( 'root' ).css('--primary', newval);
		} );
	} );
} )( jQuery );
