
<script type="text/javascript">
$(document).ready(function(e) {
	$('body').addClass('no-banner-background');    
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

    <div id="section-2" class="grid_4">
		 <?php
        // print_r($this->section);
                if (substr($this->section[2], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[2];
                    include($file);
                }
                else {
                    echo $this->section[2];
                }
         ?> 
    </div>
    <div id="section-3" class="grid_4">
		 <?php
        // print_r($this->section);
                if (substr($this->section[3], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[3];
                    include($file);
                }
                else {
                    echo $this->section[3];
                }
         ?> 
    </div>    
	<div id="section-4" class="grid_4">
		 <?php
        // print_r($this->section);
                if (substr($this->section[4], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[4];
                    include($file);
                }
                else {
                    echo $this->section[4];
                }
         ?> 
    </div>
    <div id="section-5" class="grid_4"> 
		 <?php
        // print_r($this->section);
                if (substr($this->section[5], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[5];
                    include($file);
                }
                else {
                    echo $this->section[5];
                }
         ?> 
    </div>
<div class="clear"></div>
<div class="grid_16">
	<div id="section-6">
		 <?php
        // print_r($this->section);
                if (substr($this->section[6], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[6];
                    include($file);
                }
                else {
                    echo $this->section[6];
                }
         ?> 
    </div>
    <div id="section-7">
		 <?php
        // print_r($this->section);
                if (substr($this->section[7], 0,  9) == 'includes/'){
                    $file = SERVER_ROOT . $this->section[7];
                    include($file);
                }
                else {
                    echo $this->section[7];
                }
         ?> 
    </div>
</div>
<div class="clear"></div>

