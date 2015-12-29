jQuery( document ).ready( function() {
	
	jQuery( '#overlay' ).addClass( 'off-canvas' );
	
	jQuery( '#trigger-overlay' ).click( function( ev ) {
		ev.preventDefault();
		
		_dymm_show_videoOverlay();
		
		return false;
	} );
	
	jQuery( '#overlay' ).click( function( ev ) {
		_dymm_hide_videoOverlay();
	} );
	
	jQuery( document ).click( function( ev ) {
		var $image = jQuery( '#image' ),
			$overlay = jQuery( '#overlay' );

		if ( $image.length && $overlay.hasClass( 'off-canvas' ) ) {	
			_dymm_restoreOpacity();
		}
	} );
	
	jQuery( document ).keydown( function( ev ) {
		var $image = jQuery( '#image' ),
			$overlay = jQuery( '#overlay' );

		if ( $image.length && $overlay.hasClass( 'off-canvas' ) ) {
			switch ( ev.which ) {
				case 37 : // left
					$image.css( 'background-position', 'left center' );
					break;
					
				case 38 : // top
					$image.css( 'background-position', 'center top' );
					break;
					
				case 39 : // right
					$image.css( 'background-position', 'right center' );
					break;
					
				case 40 : // bottom
					$image.css( 'background-position', 'center bottom' );
					break;
					
				default : 
					$image.css( 'background-position', 'center center' );
			}
		}
		
		if ( ! $overlay.length || $overlay.hasClass( 'off-canvas' ) ) {
			switch ( ev.which ) {
				case 72 : // H
					_dymm_toggle_history();
					break;
					
				case 78 : // N
					_dymm_walk_history( 'future' );
					break;
					
				case 80 : // P
					_dymm_walk_history( 'past' );
					break;
					
				case 86 : // V
					_dymm_show_videoOverlay();
					break;
			}
		}
		
		if ( ! $overlay.hasClass( 'off-canvas' ) ) {
			switch ( ev.which ) {				
				case 27 : // ESC
					_dymm_hide_videoOverlay();
					break;
			}
		}
				
	} );
	
	$$( 'body' ).swipeLeft( function() { 
		_dymm_walk_history( 'future' );
	} );
	
	$$( 'body' ).swipeRight( function() { 
		_dymm_walk_history( 'past' );
	} );
	
	if ( ! jQuery( '#trigger-overlay' ).length ) {
		$$( 'body' ).swipeDown( function() { 
			_dymm_show_videoOverlay();
		} );
	}

	$$( '#overlay' ).swipeUp( function() {
		_dymm_hide_videoOverlay();
	} )

	$$( '#image, #text' ).hold( function( ev ) {
		_dymm_toggle_history();
	} );
	
	$$( '#image, #text' ).doubleTap( function() { 
		_dymm_restoreOpacity();
	} );	

} );

function _dymm_toggle_history() {
	jQuery( '#history' ).toggleClass( 'off-canvas' );		
}

function _dymm_walk_history( direction ) {
	var $active = jQuery( '#history .active' ),
		$next = ( direction == 'future' ) ? $active.parent().next() : $active.parent().prev(),
		URL;
		
	if ( $next.length ) {
		URL = jQuery( 'a', $next ).attr( 'href' );
		window.location.href = URL;
	} else {
		var $indicator = jQuery( '#indicator' );
		
		if ( direction == 'past' ) {
			$indicator.addClass( 'left-side' ).animate( { opacity: 1 }, 200, function() { $indicator.animate( { opacity: 0 }, 200, function() { $indicator.removeClass( 'left-side' ); } ); } );
		} else {
			$indicator.addClass( 'right-side' ).animate( { opacity: 1 }, 200, function() { $indicator.animate( { opacity: 0 }, 200, function() { $indicator.removeClass( 'right-side' ); } ); } );
		}
		
		$indicator
	}
}

function _dymm_show_videoOverlay() {
	jQuery( '#history' ).addClass( 'off-canvas' );		
	jQuery( '#overlay' ).removeClass( 'off-canvas' ).animate( 
		{ top: 0 },
		400
	);
}

function _dymm_hide_videoOverlay() {
	jQuery( '#overlay' ).animate( 
		{ top: '-100%' },
		400,
		function () { jQuery( this ).addClass( 'off-canvas' ); }
	);
}

function _dymm_restoreOpacity() {
	jQuery( '#image, #text, #video-background' ).css( 'opacity', 1 );	
}