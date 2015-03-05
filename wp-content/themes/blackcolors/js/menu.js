/* Responsive Layout - Antonio Sanchez - http://antsanchez.com */
jQuery(document).ready(function(){
	jQuery('#open-menu').click(function(a){
	    var variable = jQuery('#menu-principal').css("display");
	    if (variable == "block") {
		jQuery('#menu-principal').slideUp(500);
	    }else{
		jQuery('#menu-principal').slideDown(500);
	    } 
	})
    if(!!('ontouchstart' in window)){
	jQuery('#menu-principal .menu li:has(ul)').click(function(e) {
	    var variable = jQuery(this).find('ul').css("display");
	    if (variable == "block") {
			jQuery(this).children('ul').slideUp(1000);
	    }else{
		e.preventDefault();
			jQuery(this).children('ul').slideDown(500);
	    }
	});
    }else{
	jQuery('#menu-principal .menu li:has(ul)').hover(function(e) {
	    var variable = jQuery(this).find('ul').css("display");
	    if (variable == "block") {
			jQuery(this).children('ul').slideUp(1000);
	    }else{
		e.preventDefault();
			jQuery(this).children('ul').slideDown(500);
			jQuery(this).find('ul').css({zIndex: 99});
			jQuery(this).children('ul').css({zIndex: 100});
	    }
	});
	}
	//UP Button
    var offset = jQuery("#up_buttom").offset();
    var ventana = jQuery(window).height();
    jQuery(window).scroll(function(){
	var posicion = jQuery(window).scrollTop();
	if (posicion < 200) {
	    jQuery("#up_buttom").css("visibility", "hidden");
	}else{
	    jQuery("#up_buttom").css("visibility", "visible");
	}
	
    })
    jQuery("#up_buttom a").click(function(e){
	e.preventDefault();
	jQuery('html,body').animate({
	    scrollTop: jQuery('body').offset().top
	}, 500);
    })
});
jQuery(window).resize(function(){
    var ancho = jQuery(window).width();
    var altura = jQuery(window).height();
    if (ancho >= 768 ) {
		jQuery('#menu-principal').css({display: "block"});
		if (altura <= 500){
			jQuery("#logo img").css({display: "none"});
		}else if(altura <= 750) {
			jQuery("#logo img").css({display: "block", width: "100px",  height: "100px"});
		}else{
			jQuery("#logo img").css({display: "block", width: "200px",  height: "200px"});
		}
	}else{
		jQuery('#menu-principal').css({display: "none"});
	}
});