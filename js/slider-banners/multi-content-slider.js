// JavaScript Document
/*
	** Image Slider by Creative Wildcat **
	**************************************
	@ Author Ryan Erb & Creatvie Wildcat
	@ Version 1.2	
*/
var rotatePeriod = 5000; //
var ticksVisible = true;

var fadePeriod = 500;
var slidePeriod = 1000;
var fillerDivs = 2; // to remove tab div and button div or other common divs within each slider div
var tabWidth;
var stopFade = false;
var count = {};
var nextCount;
var totalBanners;
var masterCount = 0;
var movement;
var currentBanner = 1;
var currentFade = 1; 
var tabCount;
var sliderWidth;
var shortFadePeriod = fadePeriod / 2;
var longFadePeriod = fadePeriod * 2;

function init(){
	sliderWidth = $('#slider-container').width();
	tabWidth = $('.tab').width();
	totalBanners = $('#slider-container > div').length;
	tabCount = totalBanners;
	movement = sliderWidth - (tabCount * tabWidth);
	// Tab level initialization
	for(i = 1; i <= totalBanners; i++){
		count[i] = $('#slider-' + i + ' > div').length - fillerDivs;
		$('#slider-' + i).css('z-index', '' + (i * 10) + '');
		$('#slider-' + i).addClass('slider-outer');
		// Postitions the starting point for each tab
		if(i == 1){
			$('#slider-' + i).css('left', '0px');
		}
		else{
			$('#slider-' + i).css('left', '' + sliderWidth - (tabWidth * (totalBanners - (i - 1)))  + 'px');
		}
		// Set CSS for the divs inside the tab
		for(j=1;j<=count[i];j++){
			$('#slider-' + i + '-' + j).css('z-index', '' + (((i * 10) + 10) - j) + '');
			$('#slider-' + i + '-' + j).addClass('slider-inner');
			if(j != 1){
				$('#slider-' + i + '-' + j).css('opacity', '0');
			}
			if (count[i] > 1 && ticksVisible == true){
				tempHTML = $('#ticks-' + i).html();
				$('#ticks-' + i).html(tempHTML + '<div id="tick-' + i + '-' + j + '" class="tick">' + j + '</div>');
				$('#ticks-' + i).css('z-index', '' + (i * 10 + 10) + ''); 
				if(j == count[i]){
					tempHTML = $('#ticks-' + i).html();
					$('#ticks-' + i).html(tempHTML + '<div class="clear"></div>');
				}
			}
		}
	}	
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
				$('#slider-' + i).removeClass('right').addClass('left flag');	
			}
		}
		$('.flag').animate({left:'-='+ movement + 'px'}, slidePeriod).removeClass('flag');
	}

	if(direction == 'left'){
		for(i = (banner + 1); i <= totalBanners; i++){
			if($('#slider-' + i).hasClass('left')){
				$('#slider-' + i).removeClass('left').addClass('right flag');	
			}
		}
		$('.flag').animate({left:'+='+ movement + 'px'}, slidePeriod).removeClass('flag');
	}
	if (clicked == true){
		masterCount += totalBanners + 1;	
		
		currentFade = 1;	
		$('#slider-' + previousBanner + '-' + currentFade).show().animate({opacity: 1}, shortFadePeriod);	
		$('#ticks-' + previousBanner).children().removeClass('active');
		$('#tick-' + currentBanner + '-' + currentFade).addClass('active');
	}	
	$(document).stopTime("fade");
	rotateBanner();
}

// Fade (x3) on click
// When the frist banner only has one, it throws off the 2nd
function rotateBanner(override){
	if (override != null){	
		thisfade = currentFade;
		$(document).stopTime("fade");
		$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 0}, shortFadePeriod,function(){
			$('#slider-' + currentBanner + '-' + thisfade).hide();
		});
		$('#tick-' + currentBanner + '-' + currentFade).removeClass('active');
		currentFade = override;
		$('#slider-' + currentBanner + '-' + override).show().animate({opacity: 1}, shortFadePeriod);
		$('#tick-' + currentBanner + '-' + override).addClass('active');
		
	}
	else{
		if(stopFade == false){
			$('#tick-' + currentBanner + '-' + currentFade).addClass('active');
			$(document).everyTime(rotatePeriod, "fade" , function(){	
				thisfade = currentFade;
				if (count[currentBanner] > 1){
					if(currentFade < count[currentBanner]){	
						$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 0}, fadePeriod,function(){
							$('#slider-' + currentBanner + '-' + thisfade).hide();
						});
						$('#tick-' + currentBanner + '-' + currentFade).removeClass('active');
						currentFade += 1;
						//alert(currentFade);
						$('#slider-' + currentBanner + '-' + currentFade).show().animate({opacity: 1}, 0);
						$('#tick-' + currentBanner + '-' + currentFade).addClass('active');
					}
					else{
						$('#slider-' + currentBanner + '-' + currentFade).animate({opacity: 1}, longFadePeriod,function(){
							$('#slider-' + currentBanner + '-' + thisfade).hide();
						});
						$('#tick-' + currentBanner + '-' + currentFade).removeClass('active');
						currentFade = 1;
						$(document).stopTime("fade");
						$('#slider-' + currentBanner + '-' + currentFade).show().animate({opacity: 1}, fadePeriod);
						$('#tick-' + currentBanner + '-' + currentFade).addClass('active');					
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
}

$(document).ready(function(){
	init();
	$('.ticks').delegate('.tick', 'click', function(){
		if(!$(this).hasClass('active')){
			var tickSplit = this.id.split('-');
			rotateBanner(parseInt(tickSplit[2]));
		}
	});
	$('#slider-container').delegate('.tab', 'click', function() {
        var sliderSplit = $(this).parent().attr('id').split('-'); 
        switchBanners(parseInt(sliderSplit[1]), true);
    });
});