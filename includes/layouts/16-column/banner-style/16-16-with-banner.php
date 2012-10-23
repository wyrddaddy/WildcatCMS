
<script type="text/javascript">
$(document).ready(function(e) {
	$('body').addClass('short-banner-background');    
});

</script>
<div id="section-1" class="grid_16">
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
<div id="section-2" class="grid_16">
 <?php
 	echo $this->section[2];
 ?>
</div>
<div id="section-3" class="grid_16">
 <?php
 	echo $this->section[3];
 ?>
</div>
<div id="section-4" class="grid_16">
 <?php
 	echo $this->section[4];
 ?>
</div>
 <div class="clear"></div>
<div id="section-5"  class="callout">
 <?php
 	echo $this->section[5];
 ?>
</div>
<div id="section-6" class="callout">
 <?php
 	echo $this->section[6];
 ?>
</div>
<div id="section-7"  class="callout">
 <?php
 	echo $this->section[7];
 ?>
</div>
