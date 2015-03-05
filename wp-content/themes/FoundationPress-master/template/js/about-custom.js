(function($) { "use strict";

	
	//About Top Sections Fullscreen	
				
	$(function(){"use strict";
		$('.about-top').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
		$('.about-top').css({'height':($(window).height())+'px'});
		});
	});

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

	
 	//Parallax
	
	$('.parallax-about').parallax("50%", 0.2);
 
 	
	/* Quotes Carousel */
	
	$(document).ready(function() {
	 
	  $("#owl-quotes").owlCarousel({
	 
		  navigation : false,
		  slideSpeed : 800,
		  paginationSpeed : 800,
		  singleItem:true
	 
	  });
	 
	});
 
 
 
  })(jQuery); 