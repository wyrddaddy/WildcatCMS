

<script src="/js/slider-banners/multi-content-slider_mini.js?v4" type="text/javascript"></script>

<div id="slider-container" class="homepage">
			<!-- Start of Slider 1 -->
			<div id="slider-1" class="left homepage">
				<!-- REQUIRED DIVS:  DO NOT DELETE unless you delete the whole slider -->
				<!-- Tab Div may be changed and PSD template is provided in sourcePSDs folder -->
				<!-- Ticks div is required and leave blank.  It will dynamically fill based on slider-x-y content below -->
                <div id="tab"></div>
		        <div class="ticks homepage " id="ticks-1"></div>
				<!-- END OF REQUIRED DIVS FOR THIS SLIDER -->
				<!-- Slider Content - Use this for copy paste -->
				<!-- id="slider-x-y" class="img-rotate"  those are required and "x" = parent div # and "y" = rotation # -->
		    	<div id="slider-1-1" class="img-rotate homepage hp-banner-one">
                	<h1 class="purple" style="padding-left:30px; font-size:32px; font-weight:bold">"Taking pictures is savoring<br />
					life intensely, every 
					hundredth <br />of a second" - Marc Riboud</h1>
		        </div>
				<!-- End of Slider Content Item -->
                 <div id="slider-1-2" class="img-rotate homepage hp-banner-two">
                 <h1 style="font-size:30px; padding-left:30px; font-weight:bold">Website Design &amp; Development</h1>
                 <p style="padding-left:35px; font-size:12px; font-weight:bold; width:330px; color:#F7EFC5">We create websites that are stylish and functional.  Update your site as needed, have movement without Flash and much more.</p><p style="padding-left:35px; font-size:14px; font-weight:bold; width:330px"><a href="/web/portfolio/">View Our Work</a></p>
                <!--
                	<h1 class="purple" style="padding-left:22px; font-size:24px; font-weight:bold">"I try to create an emotion through a mood, <br />an appreciation for what's there - <br />something people walk by every day <br />and don't see." - Robert Farber - <br />Vision - Lowepro 2004/2005, page 76</h1> -->
		        </div>
                <div id="slider-1-3" class="img-rotate homepage hp-banner-three">
                	<h1 class="" style="padding-left:26px; font-size:28px; font-weight:bold">"To be able to find beauty <br />
					in small things makes it possible <br />
                    for you to find beauty in everything."<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Author Unknown</h1>
		        </div>
               
                
		    </div>
			
		</div>
        
        <script type="text/javascript">
			rotatePeriod=8000
			$(document).ready(function(e) {
				
                $('.hp-banner-one').click(function(){
					window.location = '/photography/?clicked=homepage-feature-one';
				});
				$('.hp-banner-two').click(function(){
					window.location = '/web/portfolio/?clicked=homepage-feature-two';
				});
				$('.hp-banner-three').click(function(){
					window.location = '/photography/?clicked=homepage-feature-three';
				});
				/**/
            });
		</script>