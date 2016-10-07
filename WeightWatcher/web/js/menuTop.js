$(document).ready(function()
{

	$('.boxgridA.captionfullA').hover(function(){

                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'260px'},{queue:false,duration:160});

                $(".cover2", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover2", this).stop().animate({top:'260px'},{queue:false,duration:160});

	});
	//Caption Sliding (Partially Hidden to Visible)
	$('.boxgridA.captionA').hover(function(){
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'280px'},{queue:false,duration:160});
	});
});