// JavaScript Document
function is_mobile(){
	var w = $(window).width();
	if(w<1000){
		$('body').addClass('is_mobile');
		$('html').addClass('is_mobile');
	}else{
		$('body').removeClass('is_mobile');
		$('html').removeClass('is_mobile');
		$('.mobile_nav_body').fadeOut();
		$('.wikimoe_overlay_black').fadeOut();
	}
}
	
$(window).resize(function(){
	is_mobile();
});
(function(_global) {
  	var nav_html = $('#nav').html();
	$('.mobile_nav_body').append(nav_html);
    $('#mobile_menu_open').click(function(){
		$('.mobile_nav_body').fadeIn();
		$('.wikimoe_overlay_black').fadeIn();
	});
	$('#mobile_menu_close').click(function(){
		$('.mobile_nav_body').fadeOut();
		$('.wikimoe_overlay_black').fadeOut();
	});
	$('.wikimoe_overlay_black').click(function(){
		$('.mobile_nav_body').fadeOut();
		$('.wikimoe_overlay_black').fadeOut();
	});
	is_mobile();
    
})(this);
