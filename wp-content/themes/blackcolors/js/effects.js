jQuery(document).ready(function(){
    var ancho = jQuery(window).width();
	if (ancho >= 768) {
		jQuery("#barra-lateral").css("width", "2em");
		jQuery("#contenidos").css("paddingLeft", "5em");
		jQuery("#thefoot").css("paddingLeft", "5em");
		jQuery("#barra-lateral-contenidos").css("display", "none");
		jQuery("#barra-lateral-trigger").css("display", "block");
	}
    jQuery("#barra-lateral")
	.mouseover(function(){
		var ancho = jQuery(window).width();
	    if (ancho >= 768) {
			jQuery("#barra-lateral").css("width", "200px");
			jQuery("#barra-lateral-contenidos").css("display", "block");
			jQuery("#barra-lateral-trigger").css("display", "none");
			jQuery("#contenidos").css("paddingLeft", "250px");
			jQuery("#thefoot").css("paddingLeft", "250px");
	    }
	})
	.mouseout(function(){
		var ancho = jQuery(window).width();
	    if (ancho >= 768) {
			jQuery("#barra-lateral").css("width", "2em");
			jQuery("#barra-lateral-contenidos").css("display", "none");
			jQuery("#barra-lateral-trigger").css("display", "block");
			jQuery("#contenidos").css("paddingLeft", "5em");
			jQuery("#thefoot").css("paddingLeft", "5em");
	    }
	})
});
jQuery(window).resize(function(){
    var ancho = jQuery(window).width();
    if (ancho >= 768) {
        jQuery("#barra-lateral").css("width", "2em");
		jQuery("#barra-lateral-contenidos").css("display", "none");
		jQuery("#barra-lateral-trigger").css("display", "block");
		jQuery("#contenidos").css("paddingLeft", "5em");
		jQuery("#thefoot").css("paddingLeft", "5em");
    }else{
        jQuery("#barra-lateral").css("width", "");
        jQuery("#barra-lateral-contenidos").css("display", "block");
        jQuery("#barra-lateral-trigger").css("display", "none");
        jQuery("#contenidos").css("paddingLeft", "");
		jQuery("#thefoot").css("paddingLeft", "");
    }
});