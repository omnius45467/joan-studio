(function($) { "use strict";

	
	
	//Tooltip
	
	$(".tipped").tipper();

	
 	//Facts Counter 
	
	jQuery(document).ready(function($){
        $('.counter-facts').counterUp({
            delay: 100,
            time: 3000
        });
    });


	//Responsive video
	
	$(".container").fitVids();	

	
 	//Skills Counter 
	
	jQuery(document).ready(function($){
        $('.counter-skills').counterUp({
            delay: 100,
            time: 3000
        });
    });		

 
	//Full Accordion	
	
	jQuery(document).ready(function($){
		$(".accordion").smk_Accordion({
			closeAble: true 
		});
	});
	
	

 
 
 
 
  })(jQuery); 