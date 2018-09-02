function tips_open(str){
	$(".tooltips .content").text('');
	$(".tooltips .content").text(str);
}
$(function(){
	$('body').append('<div class="tooltips"><p class="content"></p></div>');
	$(".tooltips").css({
		opacity:"0.9",
		position:"absolute",
		display:"none",
		zIndex:"10",
		borderColor: "#999", 
		backgroundColor: "#fff",
		borderWidth: "1px",
	    borderStyle: "solid",
		borderRadius: "3px"
	});
	$(".tooltips .content").css({
		"padding": "5px",
		"margin":"0px"
	});
	$(".itemarticle-title").mouseover(function(){
		var str = $(this).text();
		tips_open(str);
		$('.tooltips').stop(true, true).fadeIn(200);
	}).mouseout(function(){
		$('.tooltips').stop(true, true).fadeOut(100);
	}).mousemove(function(e){
		$('.tooltips').css({
			"top":e.pageY+0+"px",
			"left":e.pageX+40+"px"
		});
	});
});