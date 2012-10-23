<div id="body-container" class="grid_14 push_1">
    <div id="section-1" class="body-image-viewport on">
    	<div id="slider-previous"></div>
        <div id="slider-next"></div>
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
 <div class="clear"></div>
</div>
<div class="clear"></div>
<div id="section-5">
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
<div id="contact-form" class="grid_10 push_3 shadow">
 <?php  
		$file = SERVER_ROOT . 'includes/views/forms/dropdown-email-form.php';
		include($file);
          
     ?> 
                 <div id="section-2" class="grid_10">
             <?php
                echo $this->section[2];
             ?>
            </div>
           
</div>