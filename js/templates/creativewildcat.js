// JavaScript Document
$(document).ready(function(){
	//$("div").children().addClass(layout);
	// Controls behaviors of Portfolio Scroll Navigations
	$('p.p-nav-element').live('mouseover', function() {
    	$(this).addClass('highlight-thumb');
	});
	$('p.p-nav-element').live('mouseout', function() {
		$(this).removeClass('highlight-thumb');
	});
	$('p.p-nav-element').live('click', function() {
		//alert($(this).attr('id'));
		changePresentationTable($(this).attr('id'));
	});
	
	// Controlls Up Down Buttons on Portfolio Scroll Nav
	$('p.scroll').live('mouseover', function() {
    	$(this).addClass('highlight-thumb');
		if($(this).hasClass('btn-up')){
			startScrollUp('#p-nav-elements', 50);
		}
		if($(this).hasClass('btn-down')){
			startScrollDown('#p-nav-elements', 50);
		}
	});
	$('p.scroll').live('mouseout', function() {
		$(this).removeClass('highlight-thumb');
		$(document).stopTime("scroll");
	});
						   
});
function changePresentationTable(element){
	$('#' + element + '-presentation').parent().children().hide();
	$('#' + element + '-presentation').show();
}

function startScrollUp(element, speed){
	//alert($(element).height());
	$(document).everyTime(speed, "scroll" , function(){
		if(($(element).parent().height() - $(element).height()) < $(element).position().top){
			$(element).animate({top:'-=10'},0);
		}
	});
}
function startScrollDown(element, speed){
	$(document).everyTime(speed, "scroll" , function(){
		if($(element).position().top < 0){
			$(element).animate({top:'+=10'},0);
		}
	});
}