// JavaScript Document
/* 
	author@ Ryan Erb & Creative Wildcat
	version 1.0
	requires jQuery framework and jQuery Timer Plugin
*/
var bannerConfig = {};
var containerWidth;
var containerHeight;
var totalBanners; // Keeps number of images in the Feature Banner
var currentImage = 0;  // Keeps records of what image is showing now
var internalConfig = {
	btype : ['slices', 'cubes'],
	tween : ['vertical', 'horizontal'],
	direction : ['+','-','scatter'],
	tweenLock : null,
	directionLock : null,
	sliceCountLock : null,
	btype : null
}


function getFlickrSet(fpsNum){
	url = 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key=' + bannerConfig.basic.flickrData.apiKey + '&photoset_id=' + bannerConfig.basic.flickrData.photoSets[fpsNum] + '=&format=json&jsoncallback=?';
	totalBanners = 0;
	$.getJSON(url, function(data) {		
		$.each(data.photoset.photo, function(i,item){
			totalBanners += 1;
			bannerConfig.imageStack['' + i + ''] = {};
			bannerConfig.imageStack['' + i + ''] = {
				id : item.id,
				title : item.title,
				squareUrl : 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_s.jpg',
				largeUrl : 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '.jpg',
				height : null,
				width : null
			};
			$.getJSON('http://api.flickr.com/services/rest/?&method=flickr.photos.getSizes&api_key=' + bannerConfig.basic.flickrData.apiKey +'&photo_id=' + item.id + '=&format=json&jsoncallback=?', function(data) { 
				bannerConfig.imageStack['' + i + ''].height = data.sizes.size[5].height; 
				bannerConfig.imageStack['' + i + ''].width = data.sizes.size[5].width; 
			})
		});
	});
}


/* Assigns the IDs for the Children Divs within the slider
function assignIds(parentElement){
	thisId = 1;
	$(parentElement).children().each(function() {   
        $(this).attr("id", "img-" + thisId);
		thisId += 1; 
    });
} */
function randomize(item){
	randomCount = internalConfig[item].length - 1;
	num = Math.floor(Math.random() * (randomCount + 1));
	bannerConfig.basic[item] = internalConfig[item][num];
}
// Sets the CSS for the child elements
function setCSS(){	
	$(bannerConfig.basic.parentId).empty();
	$(bannerConfig.basic.parentId).append('<div id="slices"></div>');
	$(bannerConfig.basic.parentId).append('<div id="lower-img"></div>');
	$(bannerConfig.basic.parentId).css('overflow', 'hidden');
	$('#slices').css('z-index', bannerConfig.basic.zStart);
	$('#lower-img').css('z-index', bannerConfig.basic.zStart - 1);
}
// Auto Cycle the banners when called one time
function autoCycle(){
	$(document).everyTime(bannerConfig.basic.rotationTime,  'imagefader', function(){			
		tweenMask();		
		//switchBanners();	
	}, 0);
}
// Changes the Banner
// Logic is messed up right now
function switchBanners(){
	bannerConfig.basic.sliceCount = Math.floor((Math.random() * 10) + 5);
	if(internalConfig.tweenLock == 'random'){	
		randomize('tween');
	}
	if(internalConfig.directionLock == 'random'){	
		randomize('direction');
	}
	if(currentImage < totalBanners){	
		containerWidth = bannerConfig.imageStack['' + currentImage + '']['width'];
		containerHeight = bannerConfig.imageStack['' + currentImage + '']['height'];
		createOverlayMask( bannerConfig.imageStack['' + currentImage + '']['largeUrl'] );
		$('#lower-img').css({
			'background' : "url('" + bannerConfig.imageStack['' + (currentImage + 1) + '']['largeUrl'] + "') no-repeat 0px 0px ",
			width : containerWidth + 'px',			
			height : containerHeight + 'px'	
		});
		$(bannerConfig.basic.parentId).animate({
			width : containerWidth + 'px',
			height : containerHeight + 'px'	
		}, 500);
		currentImage += 1;
		// $('#img-' + currentImage).show();
	}
	else{			
		currentImage = 0;
		containerWidth = bannerConfig.imageStack['' + currentImage + '']['width'];
		containerHeight = bannerConfig.imageStack['' + currentImage + '']['height'];
		$(document).stopTime('imagefader');
		createOverlayMask( bannerConfig.imageStack['' + currentImage + '']['largeUrl'] );		
		$(bannerConfig.basic.parentId).animate({
			width : containerWidth + 'px',
			height : containerHeight + 'px'	
		}, 500);
	}		
}
function tweenMask(){	
	speed = 0;
	// Math.floor((Math.random() * 500) + 200)	
	direction = bannerConfig.basic.direction;
	//$('#slices').children().each(function(){
	for(i=0;i<internalConfig.sliceCountLock;i++){
		
		if(bannerConfig.basic.btype == 'slices'){
			speed += 75;
			if(bannerConfig.basic.direction == 'scatter'){
				if(i % 2 == 0) direction = '+';
				else direction = '-';
			}
			if(bannerConfig.basic.tween == 'vertical'){ 
				$('#slice-' + i).animate({				
					top: direction + '' + containerHeight + 'px',	
				}, speed, 'linear');
			}
			if(bannerConfig.basic.tween == 'horizontal'){ 
				$('#slice-' + i).animate({
					left: direction + '' + containerWidth + 'px',	
				}, speed, 'linear');
			}
		}
		if(bannerConfig.basic.btype == 'cubes'){
			speed += 100;
			if(bannerConfig.basic.tween == 'roll'){ 
				$('#slice-' + i).animate({
					opacity: 0,	
				}, speed);
			}
			if(bannerConfig.basic.tween == 'explode'){ 
				
			}
		}
	}
	
	$(document).oneTime(1000, 'pause', function(){
		switchBanners();
	});
}
function createOverlayMask(image){
	// Create Vertical Slices
	//height = $(bannerConfig.basic.parentId).css('height');	
	if(bannerConfig.basic.btype == 'cubes'){
		internalConfig.sliceCountLock = bannerConfig.basic.sliceCount * bannerConfig.basic.sliceCount;
	}
	else{
		internalConfig.sliceCountLock = bannerConfig.basic.sliceCount;
	}
	$('#slices').empty();
	did = 0;
	for(i=0;i<bannerConfig.basic.sliceCount;i++){
	 	if(bannerConfig.basic.btype == 'slices' && bannerConfig.basic.tween == 'horizontal'){ 
			sliceImg(did, containerWidth, containerHeight / bannerConfig.basic.sliceCount, image, (containerHeight / bannerConfig.basic.sliceCount) * i, 0);
			did++;
		}
		if(bannerConfig.basic.btype == 'slices' && bannerConfig.basic.tween == 'vertical'){ 
			sliceImg(did, containerWidth / bannerConfig.basic.sliceCount, containerHeight, image, 0, (containerWidth / bannerConfig.basic.sliceCount) * i);
			did++;
		}
		if(bannerConfig.basic.btype == 'cubes'){
			for(j=0;j<bannerConfig.basic.sliceCount;j++){
				sliceImg(did, containerWidth / bannerConfig.basic.sliceCount, containerHeight / bannerConfig.basic.sliceCount, image, (containerHeight / bannerConfig.basic.sliceCount) * i, (containerWidth / bannerConfig.basic.sliceCount) * j);
				did++;			
			}
		}
	}
}

function sliceImg(divId, width, height, bgImage, top, left){
	$('#slices').append('<div id="slice-' + divId + '"></div>');
	$('#slice-' + divId).css({
		overflow: 'hidden',
		position: 'absolute',
		top: '' + top +'px',
		left: '' + left	+ 'px',
		width: '' + width + 'px',
		height: '' + height + 'px',
		background: "url('" + bgImage + "') no-repeat -" + left	+ "px -" + top + "px "		
	});
}

function init(){
	// totalBanners = $('#fade-slider > div').length;
	// assignIds(bannerConfig.basic.parentId);
	internalConfig.tweenLock = bannerConfig.basic.tween;
	internalConfig.directionLock = bannerConfig.basic.direction;
	setCSS();
	autoCycle();
	createOverlayMask();
	if(bannerConfig.basic.isFlickr == true){
		getFlickrSet(0);
	}
	if(bannerConfig.basic.isFlickr == false){
		totalBanners = 0;
		for(i in bannerConfig.imageStack){
			totalBanners++;
		}
	}
}