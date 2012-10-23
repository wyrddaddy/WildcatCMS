<div id="section-1">
 <?php
// print_r($this->section);
 		if (substr($this->section[1], 0,  9) == 'includes/'){
			$file = SERVER_ROOT . $this->section[1];
			include($file);
		}
		else {
        	echo $this->section[1];
		}
 ?> 
</div>
<div id="section-2">
 <?php
 	if (substr($this->section[2], 0,  9) == 'includes/'){
			$file = SERVER_ROOT . $this->section[2];
			include($file);
		}
		else {
        	echo $this->section[2];
		}
 ?>
</div>

<div id="section-3" class="grid_12">
	<div id="content-area">
 <?php
 	echo $this->section[3];
 ?>
 </div>
</div>
<div class="clear"></div>
<div id="legal-copy" class="grid_12">
 <?php
 	echo $this->section[4];
 ?>
</div>
 <div class="clear"></div>
<div id="section-5"  class="grid_12">
 <?php
 	echo $this->section[5];
 ?>
</div>
<div id="video-container">

</div>
<script type="text/javascript" src="/js/ui/modals/simplemodal.js">   
/* 
    var promoWidth = 320;
    var promoHeight = 250;
    $("#flash-promo-2").css({height: promoHeight + "px", width: promoWidth + "px"});
    if (window.location.search.search("noflash") === -1)
    {
      var flashvars = {};
      flashvars.linkURL = escape("/creditcards/lp/make-it-rain/?linkid=WWW_1009_Z_A0B2084C0D22A0E8F33F8CB2G91DFH5AF4I7CC8_HOME_C6_01_G_CCLPMKITR");

      var params = {};
      params.scale = "noscale";
      params.menu = "false";
	  params.wmode = "transparent";

      var attributes = {};
      attributes.id = "promo2Flash";
      attributes.name = "promo2Flash";
	  
        
      swfobject.embedSWF("http://youtu.be/q9bVfgp3A4s", "video-container", promoWidth, promoHeight, "9.0.0", false, flashvars, params, attributes);
    }
	*/
  </script>