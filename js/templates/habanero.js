// JavaScript Document

/* Habanero Base Functionality */
/*  + Contains Dropdown Food Menu Scrollbar
    + Dropdown Food Menu
    + Food Menu Left Hand Navigation (moves div location for Scrollbar
 */


$(document).ready(function(){
	var animationProps = {};
	var currentMarkerLocation = 140;

	$('#menu-scroll-scroller').draggable({ axis: "y", containment: "parent" });
	
	if (jQuery.browser.mobile == false){
		$('body').addClass('is-desktop');
	}
	else{
		$('body').addClass('is-mobile');
	}
/* Page Slider Functionality */	
	var currentSlide = 0;
	var sectionBuffer = 2;
	var contentTextCount = -1;
	var currentImage = 0;
	var slideWidth = 812;
	var imageCounter = 0;
	var bodyLayerLevel = 12;
	var myScroll;
	
	$('.body-content').each(function(index, element) {
		bodyLayerLevel++;
        $(this).css({'z-index' :  bodyLayerLevel, 'position' : 'absolute'});
    });

	$("#section-1 img").each(function(){
	//$("#content-area div").each(function(){
		// $(this).text().trim().length
		// var textInDiv = $.trim($(this).text()).length;
		if($.trim($(this).text()).length > 1){
			//contentTextCount++
		}
		contentTextCount++
	});
	//alert(contentTextCount);
	/**/
	//alert($("#content-area div:empty").length);
	//var contentTextCount = $("#content-area div").length - 1 - $("#content-area div:empty").length;
	if(contentTextCount < 1){
		$('#slider-next').hide();
		$('#slider-previous').hide();
	}
	else{
		if($("#section-1").hasClass('on')){
			$("#section-1 img").each(function(index, element) {
				$(this).wrap('<div id="img-' + imageCounter + '" class="slide-image" />'); 
				imageCounter++; 
			});
			//animateSlider(currentImage, 'load');
		}
		updateCounter();
	}
	$('#img-0').fadeIn(300);
	//alert(contentTextCount);
	$('#slider-next').click(function(){
		slidermMovement('next');
	});
	$('#slider-previous').click(function(){
		slidermMovement('previous');
	});
	$('#slider-next').mouseover(function(){
		$('#slider-next').addClass('slider-nav-over');
	});
	$('#slider-previous').mouseover(function(){
		$('#slider-previous').addClass('slider-nav-over');
	});
	$('#slider-next').mouseout(function(){
		$('#slider-next').removeClass('slider-nav-over');
	});
	$('#slider-previous').mouseout(function(){
		$('#slider-previous').removeClass('slider-nav-over');
	});
	$('#section-1').mouseover(function(){
		$('#slider-previous').addClass('slider-nav-ready');
		$('#slider-next').addClass('slider-nav-ready');
	});
	$('#section-1').mouseout(function(){
		$('#slider-previous').removeClass('slider-nav-ready');
		$('#slider-next').removeClass('slider-nav-ready');
	});
	//$('#content-area.normal-content').animate({'height': $('#section-2').height() + 'px'},0);
	
	/*
	function animateSlider(img, direction){
		
		if(direction = 'load'){
			$('#img-' + img).show();
		}
		if(direction = 'next'){	
		}
		
		if(direction = 'previous'){	
			$('#img-' + img).animate({'left': + 0 + 'px'},0);
			$('#img-' + nextImg).animate({'left': slideWidth + 'px'},0);
			$('#img-' + prevImg).animate({'left': '-' + slideWidth + 'px'},0);
		}
	}
		*/
	function updateCounter(){
		$('#slide-counter').empty().html('' + (currentSlide + 1) + ' of ' + (contentTextCount + 1))
	}
	function slidermMovement(direction){	
		//alert(currentSlide);
		if(direction == 'next'){ 		
			$('#section-' + (currentSlide + sectionBuffer) + '').fadeOut(500);
			$('#img-' + (currentSlide) + '').fadeOut(100);
			if(currentSlide < contentTextCount){
				currentSlide += 1;	
			}else{currentSlide = 0;}
			//animateSlider(currentSlide , direction);
			//$('#content-area').animate({'height': $('#section-' + (currentSlide + sectionBuffer) + '').height() + 'px'},200);
			$('#section-' + (currentSlide + sectionBuffer) + '').fadeIn(500);
			$('#img-' + (currentSlide) + '').delay(100).fadeIn(100);
			updateCounter();
		}
		if(direction == 'previous'){ 
			$('#section-' + (currentSlide + sectionBuffer) + '').fadeOut(500);
			$('#img-' + (currentSlide) + '').fadeOut(100);
			if(currentSlide != 0){
				currentSlide -= 1;	
			}else{currentSlide = contentTextCount ;}			
			//animateSlider(currentSlide , direction);
			//$('#content-area').animate({'height': $('#section-' + (currentSlide + sectionBuffer) + '').height() + 'px'},200);
			$('#section-' + (currentSlide + sectionBuffer) + '').fadeIn(500);
			$('#img-' + (currentSlide) + '').delay(100).fadeIn(100);
			updateCounter();
		}
		
		
		//var tickSplit = this.id.split('-');
		//slidermMovement(parseInt(tickSplit[2]));
	}
	
/* Dropdown Food Menu Scroller Functionality */
	$('#menu-scroll-top').mousedown(function(){
		$('#menu-content').unbind();
		document.getElementById("menu-content").scrollTop -= 60;
		setScrollerLocation();
		$(document).everyTime(150, "scroll-viewport" , function(){
			document.getElementById("menu-content").scrollTop -= 60;
			setScrollerLocation();
		});
	});	
	$('#menu-scroll-bottom').mousedown(function(){
		$('#menu-content').unbind();
		document.getElementById("menu-content").scrollTop += 60;
		setScrollerLocation();
		$(document).everyTime(150, "scroll-viewport" , function(){
			document.getElementById("menu-content").scrollTop += 60;
			setScrollerLocation();
		});
	});	
	$('#menu-scroll-scroller').mousedown(function(){
		$('#menu-content').unbind();
		setViewportLocation();
		$(document).everyTime(15, "scroll-viewport" , function(){
			setViewportLocation();
		});
	});
	
	$('#menu-content').bind('touchstart', function(e){
		setScrollerLocation(10);
	});
	$('#menu-content').bind('touchmove', function(e){
		setScrollerLocation(0);
	});
	$('#menu-content').bind('scroll', function(e){
		setScrollerLocation(0);
	});
	$('#menu-scroll-top').mouseup(function(){
		$(document).stopTime("scroll-viewport");
		$('#menu-content').bind('scroll', function(e){
			setScrollerLocation(10);
		});
	});	
	$('#menu-scroll-bottom').mouseup(function(){
		$(document).stopTime("scroll-viewport");
		$('#menu-content').bind('scroll', function(e){
			setScrollerLocation(10);
		});
	});
	$('#menu-scroll-scroller').mouseup(function(){
		$(document).stopTime("scroll-viewport");
		$('#menu-content').bind('scroll', function(e){
			setScrollerLocation(10);
		});
	});
	$('#menu-scroll-top').mouseleave(function(){
		$(document).stopTime("scroll-viewport");
		$('#menu-content').bind('scroll', function(e){
			setScrollerLocation(10);
		});
	});	
	$('#menu-scroll-bottom').mouseleave(function(){
		$(document).stopTime("scroll-viewport");
		$('#menu-content').bind('scroll', function(e){
			setScrollerLocation(10);
		});
	});
	$('#menu-scroll-scroller').mouseleave(function(){
		//$(document).stopTime("scroll-viewport");
	});
	
	
	
	function checkViewportLocation(location){
		navCount = elementLocation.length;
		for(i = 0; i <= navCount; i++){
			//$('#selected-selection').empty().html('<h2>' + location + '</h2>');
			if(((location >= elementLocation[i] && location < elementLocation[i+1]))){	 
				itemString = $('#'+ navMap[elementName[i]] ).html().toUpperCase();			
				$('#selected-selection').not('.print-menu').empty().html('<h2>' + itemString + '</h2>');
				$("#menu-selection a").removeClass("menu-select-behavior-on");
				$('#' + navMap[elementName[i]]).addClass('menu-select-behavior-on');
				categoryLocation = navMap[elementName[i]].split('-');
				itemNumber = parseInt(categoryLocation[1]) - 1;		
				currentMarkerLocation = (140 + (itemNumber * 22));		
       			$('#menu-category-marker').animate({top: '' + currentMarkerLocation + 'px'}, 0, 'easeOutCubic');
			}
		}
	}
	/**/
	function setScrollerLocation(buffer){
		buffer = typeof buffer !== 'undefined' ? buffer : 100;
		var viewportHeight = $('#menu-viewport').height();
		var menuDivHeight = $('#menu-list').height();
		var diffHeight = menuDivHeight - viewportHeight;
		var menuLocation = document.getElementById("menu-content").scrollTop;
		var containPercent = (menuLocation / diffHeight);
		var scrollHeight = $('#menu-scroll-scroller-container').height() - $('#menu-scroll-scroller').height();
		var scrollPoint = scrollHeight * containPercent;
		$('#menu-scroll-scroller').animate({top: '' + Math.round(scrollPoint) + 'px'}, buffer, 'easeOutCubic');
		checkViewportLocation(document.getElementById("menu-content").scrollTop);
	}
	function setViewportLocation(){
		var current = parseInt($('#menu-scroll-scroller').css('top'));
		var viewportHeight = $('#menu-viewport').height();
		var menuDivHeight = $('#menu-list').height();
		var diffHeight = menuDivHeight - viewportHeight;
		var menuLocation = document.getElementById("menu-content").scrollTop;
		var containPercent = (menuLocation / diffHeight);
		var scrollHeight = $('#menu-scroll-scroller-container').height() - $('#menu-scroll-scroller').height();
		var scrollPercent = current / scrollHeight;
		var viewportNumber = diffHeight * scrollPercent;
		document.getElementById("menu-content").scrollTop = viewportNumber;
		checkViewportLocation(document.getElementById("menu-content").scrollTop);
	}
	

/* Food Menu Left Hand Navigation */
	$('#menu-selection').delegate('a', 'mouseover', function() {		
		var categoryLocation = this.id.split('-');
		var itemNumber = parseInt(categoryLocation[1]) - 1;
		animationProps['top'] = (140 + (itemNumber * 22)) + 'px';
        $('#menu-category-marker').addClass('darker').animate(animationProps,40);
    });
	$('#menu-selection').delegate('a:not(.print-menu)', 'click', function() {
		var categoryLocation = this.id.split('-');
		var itemNumber = parseInt(categoryLocation[1]) - 1;		
		currentMarkerLocation = (140 + (itemNumber * 22));
		$("#menu-selection a").removeClass("menu-select-behavior-on");
		$('#' + this.id).addClass('menu-select-behavior-on');
		setScrollerLocation();
		var itemString = $(this).html().toUpperCase();	
		$('#selected-selection').empty().html('<h2>' + itemString + '</h2>');
    });
	$('#menu-selection').mouseleave(function(){
		animationProps['top'] = currentMarkerLocation;
		$('#menu-category-marker').removeClass('darker').animate(animationProps,250,'easeInOutElastic');
	});
	var elementName = Array();
	var elementLocation = Array();
	var navMap = Array();
/* Dropdown Food Menu Functionality */
	$('#nav-menu').click(function(){
		if($('#contact-form').css('display') != 'none'){
			closeForm();
		}
		$('#dropdown').slideDown(500);
		$('#dropdown-close').fadeIn(700);
		$('#content-area').fadeOut(250);
		$('#menu-scroll-container').fadeIn(500);
		$('#menu-category-marker').fadeIn(1000);
		document.getElementById("menu-content").scrollTop = 0;
		$('#menu-scroll-scroller').animate({top: '0%'}, 0);
		$('#selected-selection').empty().html('<h2>SPECIALS</h2>');
		$('#slide-counter').fadeOut(500);
		$('#slider-next').addClass('slider-nav-off');
		$('#slider-previous').addClass('slider-nav-off');
		$('#menu-selection').children('a').each( function(){
			aIdArray = this.id.split('-');
			elementName.push(aIdArray[0]);
			navMap[aIdArray[0]] = this.id;
			x = document.getElementById(aIdArray[0]).offsetTop - 120;
			elementLocation.push(x);
		});
		//$('#menu-content').height($('#menu-list').height()); 
		
		/*
		setTimeout(function () {
			myScroll = new iScroll('menu-viewport');
		}, 500);
		*/
	});	
	$('#dropdown-close').click(function(){
		$('#dropdown').slideUp(500);
		$('#dropdown-close').fadeOut(300);
		$('#content-area').fadeIn(600);
		$('#menu-category-marker').fadeOut(100);
		$('#menu-scroll-container').fadeOut(200);
		currentMarkerLocation = 140;
        $('#menu-category-marker').animate({top:'140px'},40);
		$("#menu-selection a").removeClass("menu-select-behavior-on");
		$("#menu-selection a:first-child").addClass("menu-select-behavior-on");
		$('#slide-counter').fadeIn(500);
		$('#slider-next').removeClass('slider-nav-off');
		$('#slider-previous').removeClass('slider-nav-off');
	});
	$('#dropdown').hide();
		
/* Contact Us Dropdown Form */	
	if($('#contact-form').is('*')){
		if(getParameterByName('emailsubmit') == '1'){
			openForm();
		}
		else{
			$(document).oneTime(2000, 'contactDrop', function(){openForm();});
		}
	}
	function getParameterByName(name) {
		var match = RegExp('[?&]' + name + '=([^&]*)')
						.exec(window.location.search);
		return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
	}
	$('.contact-link').click(function(){
		openForm();
	});	
	
	$('#cancel-email').click(function(){
		closeForm();
		$(document).oneTime(3000, 'contactDrop', function(){openForm();});
	});
	function openForm(){
		$('#contact-form').slideDown(500);	
		$('#content-area').fadeOut(250);
	}
	function closeForm(){
		$('#contact-form').slideUp(500);
		$('#content-area').fadeIn(600);
	}
	$('#email-input').blur( function(){
		if(!isValidEmailAddress($('#email-input').val())){			
			$('#email-error').fadeIn(200);
		}
		else{
			$('#email-error').fadeOut(200);
		}
    });
	jQuery('.body-content').each(function(){
		$(this).children('p').wrapAll('<div class="body-content-section"></div>');
	});
	$('#phone-input').setMask({mask: '(999) 999-9999' });
	
	
	
	function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	}

});
