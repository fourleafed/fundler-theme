/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title, description, and background color changes.
 */

( function( $ ) {
	var api = wp.customize;

	wp.customize( 'infobar_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('.top_info_line').hide();
                else 
                	$('.top_info_line').show();
           } );
    } );

	wp.customize( 'facebook_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('#facebook_icon').hide();
                else 
                	$('#facebook_icon').show();
           } );
    } );

    wp.customize( 'twitter_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('#twitter_icon').hide();
                else 
                	$('#twitter_icon').show();
           } );
    } );

    wp.customize( 'gplus_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('#gplus_icon').hide();
                else 
                	$('#gplus_icon').show();
           } );
    } );

	wp.customize( 'linkedin_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('#linkedin_icon').hide();
                else 
                	$('#linkedin_icon').show();
           } );
    } );

    wp.customize( 'youtube_switch', function( value ) {
            value.bind( function( to ) {    
                if ( 'off' == to )
                    $('#youtube_icon').hide();
                else 
                	$('#youtube_icon').show();
           } );
    } );

	wp.customize( 'home_page_quote', function( value ) {
		value.bind( function( to ) {
			$( '.homepage_quote' ).html( to );
		} );
	} );

	wp.customize( 'infobar_left_button', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_left_button' ).html( to );
		} );
	} );

	wp.customize( 'infobar_right_button', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_right_button' ).html( to );
		} );
	} );

	wp.customize( 'infobar_left_title', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_left_title' ).html( to );
		} );
	} );

	wp.customize( 'infobar_right_title', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_right_title' ).html( to );
		} );
	} );

	wp.customize( 'infobar_left_desc', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_left_desc' ).html( to );
		} );
	} );

	wp.customize( 'infobar_right_desc', function( value ) {
		value.bind( function( to ) {
			$( '#infobar_right_desc' ).html( to );
		} );
	} );

} )( jQuery );