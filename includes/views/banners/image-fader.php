<style>
#fade-slider{
  width:740px;
  height:400px;
  margin:0px;
  padding:0px;
  position:relative;
  margin-left:auto;
  margin-right:auto;
}
.position-zero{
	position:absolute;
	top:0px;
	left:0px;
}
</style>
<script src="/js/jquery/jquery-ui.js" type="text/javascript"></script>
<script src="/js/slider-banners/fade-slider.js?<?php echo rand(1000, 100000); ?>" type="text/javascript"></script>
<script type="text/javascript">
bannerConfig = {
	basic : {
		btype : 'slices',            // 'slices' , 'cubes', 'fade', 'random'
		tween : 'random', // 'horizontal' , 'vertical' | 'roll', 'boxExplode', 'boxFall', 'random'
		direction : 'random',            // '' (Down / Right) , '-' (Up / Left), 'scatter'
		sliceCount : 10,            // Number of slices in image - 'random'
		zStart : 100,               // Sets Highest z-index of Banners
		rotationTime : 5000,        // sets the time each image shows
		fadeTimer : 500,            // in milliseconds - sets the fade out time of each image in the stack
		isFlickr : false,            // true or false if its Flickr.  If False object must be constructed manually for the images
		parentId : '#fade-slider',  // ID of the main container for the slider
		/* ****Flicker Data in Sub-object Below **** */
		flickrData : {
			apiKey : '21142f4af99edb71357d0a8de8c32b84', // Flickr API Key
			photoSets : ['72157615196800407']            // Array of the photosets you wish to have pulled
		}
	},
	/* 
		Use Object Below if Not Using Flickr API 
	*/
	imageStack : {
		'0' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/aria-in-tree.jpg',
			height : '400',
			width : '740'
		},
		'1' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/caiman.jpg',
			height : '400',
			width : '740'
		},
		'2' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/imax.jpg',
			height : '400',
			width : '740'
		},
		'3' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/lionfish.jpg',
			height : '400',
			width : '740'
		},
		'4' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/my-stang.jpg',
			height : '400',
			width : '740'
		},	
		'5' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/night-beach.jpg',
			height : '400',
			width : '740'
		},	
		'6' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/wasp.jpg',
			height : '400',
			width : '740'
		},
		'7' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/aria-in-tree.jpg',
			height : '400',
			width : '740'
		},
		'8' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/caiman.jpg',
			height : '400',
			width : '740'
		},
		'9' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/imax.jpg',
			height : '400',
			width : '740'
		},
		'10' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/lionfish.jpg',
			height : '400',
			width : '740'
		},
		'11' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/my-stang.jpg',
			height : '400',
			width : '740'
		},	
		'12' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/night-beach.jpg',
			height : '400',
			width : '740'
		},	
		'13' : {
			id : 'ExampleID',
			title : 'Example Title',
			squareUrl : '',
			largeUrl : '/images/photo-banner-new/wasp.jpg',
			height : '400',
			width : '740'
		}	
	}
}


$(document).ready(function(){
	init();
});
</script>


<div class="grid_12">
	<div id="fade-slider"></div>
</div>
<div class="clear"></div>