/*
Feature Banner Javascript/JQuery Control

 # Author: Ryan Erb
 
** Purpose - Used to mimick a Flash Feature Banner Rotator without Flash. 

*/

var tabNumber = 1;
var direction = 'up';
/*
	Actual function that animates, hides and adjusts the elements from a deselected state to a selected state.
	Also changes the banners when the tab is pressed and hides the inactive state banners.
*/
function switchBanners($item){
	switch($item){	
		case 1:	
			$('#tab-1').removeClass().addClass('active-tab').animate({top:'254px'}, 250).dropShadow().animate({top:'254px'}, 250);
			$('#tab-1-over').removeClass();
			$('#primary-label-1').removeClass().addClass('active-tab');
			$('#secondary-label-1').show();
			$('#banner-1').show().animate({opacity: 1}, 250);
			$('#tab-2').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#primary-label-2').removeClass();
			$('#secondary-label-2').hide();
			$('#banner-2').animate({opacity: 0}, 250).hide();
			$('#tab-3').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#primary-label-3').removeClass();
			$('#secondary-label-3').hide();
			$('#banner-3').animate({opacity: 0}, 250).hide();
			break;
		case 2:	
			$('#tab-2').removeClass().addClass('active-tab').animate({top:'254px'}, 250).dropShadow().animate({top:'254px'}, 250);
			$('#tab-2-over').removeClass();
			$('#primary-label-2').removeClass().addClass('active-tab');
			$('#secondary-label-2').show();
			$('#banner-2').show().animate({opacity: 1}, 250);
			$('#tab-1').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#primary-label-1').removeClass();
			$('#secondary-label-1').hide();
			$('#banner-1').animate({opacity: 0}, 250).hide();
			$('#tab-3').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#tab-3').children().removeClass();
			$('#primary-label-3').removeClass();
			$('#secondary-label-3').hide();
			$('#banner-3').animate({opacity: 0}, 250).hide();
			break;
		case 3:			
			$('#tab-3').removeClass().addClass('active-tab').animate({top:'254px'}, 250).dropShadow().animate({top:'254px'}, 250);
			$('#primary-label-3').removeClass().addClass('active-tab');
			$('#secondary-label-3').show();
			$('#banner-3').show().animate({opacity: 1}, 250);
			$('#tab-1').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#primary-label-1').removeClass();
			$('#secondary-label-1').hide();
			$('#banner-1').animate({opacity: 0}, 250).hide();
			$('#tab-2').removeClass().animate({top:'274px'}, 250).removeShadow();
			$('#primary-label-2').removeClass();
			$('#secondary-label-2').hide();
			$('#banner-2').animate({opacity: 0}, 250).hide();
			break;
	}

}
function cycleTimer(){
/* 	
	Cycles the banner and determines if the tabs should go forward or backwards.
	The customer requested the sequence of 1, 2, 3, 2, 1.
*/
	if(tabNumber == 3){
		direction = 'down';
	}
	
	if (direction == 'up'){
		tabNumber += 1;
	}
	if (direction == 'down'){
		tabNumber -= 1;
	}
	switchBanners(tabNumber);
}

$(document).ready(function(){
	/* 
		Show hidden tabs so Javascript disabled users dont have something that doesnt work displaying
	*/
	$('#tab-1').show();
	$('#tab-2').show();
	$('#tab-3').show();
	switchBanners(1);
	$(document).everyTime(5000, function(){
			cycleTimer();
	}, 5);
	/* 
		Set Event Listeners on the tabs to handle:
			Active
			Inactive
			Mouse Over
	*/
// Click listeners
	$('#tab-1').click(function(event){	
		if($('#tab-1').hasClass('active-tab') == false){
			switchBanners(1);
			$(document).stopTime();
		}
	});
	$('#tab-2').click(function(event){	
		if($('#tab-2').hasClass('active-tab') == false){
			switchBanners(2);
			$(document).stopTime();
		}	
	});
	$('#tab-3').click(function(event){		
		if($('#tab-3').hasClass('active-tab') == false){
			switchBanners(3);
			$(document).stopTime();
		}
	});
// Mouseover Listeners
	$('#tab-1').mouseover(function(event){
		if($('#tab-1').hasClass('active-tab') == false){
			$('#tab-1-over').addClass('over-tab');
		}
	});
	$('#tab-2').mouseover(function(event){	
		if($('#tab-2').hasClass('active-tab') == false){
			$('#tab-2-over').addClass('over-tab');
		}
	});
	$('#tab-3').mouseover(function(event){			
		if($('#tab-3').hasClass('active-tab') == false){
			$('#tab-3-over').addClass('over-tab');
		}
	});
// Mouseout Listeners
	$('#tab-1').mouseout(function(event){
		if($('#tab-1-over').hasClass('over-tab')){
			$('#tab-1-over').removeClass();
		}
	});
	$('#tab-2').mouseout(function(event){	
		if($('#tab-2-over').hasClass('over-tab')){
			$('#tab-2-over').removeClass();
		}
	});
	$('#tab-3').mouseout(function(event){			
		if($('#tab-3-over').hasClass('over-tab')){
			$('#tab-3-over').removeClass();
		}
	});
	$("a.toggle-new").click(function(){
		$("#basic-new").hide().animate({opacity: 0}, 500);
		$("#advanced-new").show().animate({opacity: 1}, 500);
	});
	$("a.toggle-new-basic").click(function(){
		$("#basic-new").show().animate({opacity: 1}, 500);
		$("#advanced-new").hide().animate({opacity: 0}, 500);
	});
});