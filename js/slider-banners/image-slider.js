// JavaScript Document
var movement = 619;
var currentBanner = 1;
var currentFade = 1; 
var rotatePeriod = 2000;
var fadePeriod = 500;
var shortFadePeriod = 250;
var longFadePeriod = 1000;
var slidePeriod = 500;
var fillerDivs = 1; // to remove tab div and button div or other commond divs within each slider div
var stopFade = false;
var count = {};
var nextCount;
var totalBanners;
var masterCount = 0;
var direction = '';

function init(){
	
	totalBanners = $('#slider-container > div').length;
	for(i = 1; i <= totalBanners; i++){
		count[i] = $('#slider-' + i + ' > div').length - fillerDivs;
	} 
	/*
	
		In here do a loop to create dynamically the css for each div id of the contained images: 
			#slider-x-y (all){
				position:absolute;
				top:0px;
				left:0px;	
			}
			then z-index down examples
			#slider-1-1{ z-index: 19; }
			#slider-1-2{ z-index: 18; }
			#slider-2-1{ z-index: 29; }
			#slider-2-2{ z-index: 28; }
			
	*/
	switchBanners(1, false);
}
// Timer to cycle automatically (both image fades - x3 and banner slides - x5) 
function cycleBanners(){	
	masterCount +=1;
	if(masterCount <= totalBanners){
		if(currentBanner < totalBanners){
			currentBanner += 1;
			switchBanners(currentBanner, false);
		}
		else{
			currentBanner = 1;
			stopFade = true;
			switchBanners(currentBanner, true);
		}
	}
}
// Change on click - starts fade sequence

function switchBanners(banner, clicked){
	previousBanner = currentBanner;
	currentBanner = banner;
	if($('#slider-' + banner).hasClass('right')){
			direction = 'right';
	}
	if($('#slider-' + banner).hasClass('left')){
			direction = 'left';
	}

	if(direction == 'right'){
		for(i = 2; i <= banner; i++){
			if($('#slider-' + i).hasClass('right')){
				$('#slider-' + i).removeClass().addClass('left flag');	
			}
		}
		$('.flag').animate({left:'-=579px'}, slidePeriod).removeClass('flag');
	}

	if(direction == 'left'){
		for(i = (banner + 1); i <= totalBanners; i++){
			if($('#slider-' + i).hasClass('left')){
				$('#slider-' + i).removeClass().addClass('right flag');	
			}
		}
		$('.flag').animate({left:'+=579px'}, slidePeriod).removeClass('flag');
	}
	if (clicked == true){
		masterCount += totalBanners + 1;
		currentFade = 1;
		$(document).stopTime("fade");
		$('#slider-' + previousBanner + '-' + currentFade).animate({opacity: 1}, shortFadePeriod);	
	}
	rotateBanner();
}

// Fade (x3) on click

function rotateBanner(){
	if(stopFade == false){
		$(document).everyTime(rotatePeriod, "fade" , function(){	
			if (count[currentBanner] > 1){
				if(currentFade < count[currentBanner]){	
					$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 0}, fadePeriod);
					currentFade += 1;
					$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 1}, 0);
				}
				else{
					$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 1}, longFadePeriod);
					currentFade = 1;
					$(document).stopTime("fade");
					$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 1}, fadePeriod);					
					cycleBanners();
				}	
			}
			else {
				cycleBanners();	
			}			
		});
	}
	else{
		stopFade = false;
	}
}

$(document).ready(function(){
	
	init();
	$('#slider-1').click(function(event){	
			switchBanners(1, true);
	});
	$('#slider-2').click(function(event){	
			switchBanners(2, true);
	});
	$('#slider-3').click(function(event){	
			switchBanners(3, true);
	});
	$('#slider-4').click(function(event){	
			switchBanners(4, true);
	});
	$('#slider-5').click(function(event){	
			switchBanners(5, true);
	});
});