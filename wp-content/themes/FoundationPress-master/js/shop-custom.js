(function($) { "use strict";

	
	//Portfolio Top Sections Fullscreen	
				
	$(function(){"use strict";
		$('.shop-top').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
		$('.shop-top').css({'height':($(window).height())+'px'});
		});
	});


	
	

	
	/* Scroll Too */
	
	$(document).ready(function(){"use strict";
		$(".scroll").click(function(event){

			event.preventDefault();

			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top;

			$('html, body').animate({scrollTop:target_top}, 1000);
		});
	});
	
	
	//Tooltip
	
	$(".tipped").tipper();
 

		//checkout
		
			(function() {
				[].slice.call( document.querySelectorAll( '.checkout' ) ).forEach( function( el ) {
					var openCtrl = el.querySelector( '.checkout__button' ),
						closeCtrl = el.querySelector( '.checkout__cancel' );

					openCtrl.addEventListener( 'click', function(ev) {
						ev.preventDefault();
						classie.add( el, 'checkout--active' );
						classie.add( dummy, 'dummy-grid--highlight' );
					} );

					closeCtrl.addEventListener( 'click', function() {
						classie.remove( el, 'checkout--active' );
						classie.remove( dummy, 'dummy-grid--highlight' );
					} );
				} );
			})();
		
 
 

 
 
 
 
  })(jQuery); 