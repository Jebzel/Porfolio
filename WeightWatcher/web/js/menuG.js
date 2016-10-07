$(document).ready(function()
{
	//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
	//Vertical Sliding
	$('.boxgrid.slidedown').hover(function(){
		$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
	});
	//Horizontal Sliding
	$('.boxgrid2.slideright').hover(function(){           
		$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({left:'10px'},{queue:false,duration:300});
	});
	//Diagnal Sliding
	$('.boxgrid.thecombo').hover(function(){
		$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
	}, function() {
		$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
	});
	//Partial Sliding (Only show some of background)
	$('.boxgrid.peek').hover(function(){
		$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	});
	//Full Caption Sliding (Hidden to Visible)
	$('.boxgrid.captionfull').hover(function(){
		
                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'390px'},{queue:false,duration:160});

                $(".cover2", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover2", this).stop().animate({top:'390px'},{queue:false,duration:160});

	});
        $('.boxgrid2.captionfull2').hover(function(){

                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'390px'},{queue:false,duration:160});
	});
        $('.boxgrid3.captionfull3').hover(function(){

                $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'390px'},{queue:false,duration:160});
	});
	//Caption Sliding (Partially Hidden to Visible)
	$('.boxgrid.caption').hover(function(){
		$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	}, function() {
		$(".cover", this).stop().animate({top:'280px'},{queue:false,duration:160});
	});
});