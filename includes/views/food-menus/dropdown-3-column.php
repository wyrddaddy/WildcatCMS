
<div id="dropdown-close">CLOSE <img src="/images/framework/menu-close-icon.png" align="absmiddle" alt="Close Food Menu" /></div>
<div id="dropdown" class="grid_10 push_3 shadow">

	<div id="menu-headings">
    	<div id="heading-select" class="heading-menu-one"><h2>MENU SELECTIONS</h2></div>
        <div id="heading-details" class="align-center heading-menu-two"><h2>DETAILS</h2></div>
        <div id="selected-selection" class="align-center heading-menu-three"><h2>SPECIALS</h2></div>
        <div class="clear"></div>    
        <img src="/images/framework/menu-top-decor.png" alt="Decoration" />
    </div>

	
    <div id="menu-category-marker"></div>
	<div id="menu-selection" class="heading-menu-one menu-select-space">
    <?php 
		$menuCategories = unserialize(MENU_CATEGORIES);
		$itemCount = 1;
		$classMark = '';
		foreach ($menuCategories as $key => $row){
			if($key != 'off'){	
				if($itemCount == 1){ $classMark = 'menu-select-behavior-on';  }	
				else{ $classMark = '';  }
				echo '<a href="#null" onclick="go_anchor(\''. $key . '\')" id="'. $key . '-' . $itemCount . '" class="menu-select-behavior ' . $classMark . '">' . $row . '</a><br />';
				$itemCount++;
			}
		}
		Controller::loadClass('Model_Plugin_ResturantMenu'); 
		$rmModel = new Model_Plugin_ResturantMenu;
		$menuArray = $rmModel->buildMenu();
		
	?>
    	<div id="print-menu"><a class="print-menu" href="/print-menu" target="print-menu">View Printable Menu</a></div>
    </div>
    <div id="test-display"></div>
	<div id="menu-viewport">
    <div id="menu-content">
    	<div id="menu-list">
			<?php
            //echo '<pre>';
            //print_r($menuArray);
            
                foreach($menuArray as $cat => $item){
					
		//$rowLower = array_map('strtolower', $item);
		//array_multisort($rowLower, SORT_ASC, SORT_STRING, $item);
                    if($item != null && $item != ''){
                        echo '<span id="' . $cat . '"></span>';
                        foreach($item as $element => $itemInfo){
                            if($cat == 'specials'){echo '<p class="menu-item ' . $cat . '"><strong>' . $menuArray[$cat][$element]['name'] . '</strong>: ' . $menuArray[$cat][$element]['description'] . ' <b>' . $menuArray[$cat][$element]['price'] . '</b><br /></p>';}
                            else{echo '<p class="menu-item ' . $cat . '"><b>' . $menuArray[$cat][$element]['name'] . '</b>: ' . $menuArray[$cat][$element]['description'] . ' <br /><b>' . $menuArray[$cat][$element]['price'] . '</b></p>';}
                        }
                    }
                }
            /**/
            ?>
    
    	</div>
    	<div id="menu-images">
            <?php
	//echo '<pre>';
	//print_r($menuArray);
	
		foreach($menuArray as $cat => $item){
			//if(){	
			if($item != null && $item != ''){
				foreach($item as $element => $itemInfo){
					
					if($cat == 'specials'){echo '<p class="menu-item"></p>';}
			 		else{echo '<p class="menu-item"><img src="/images/menu-manager/thumbs/' . $menuArray[$cat][$element]['image'] . '" alt="' . $menuArray[$cat][$element]['name'] .'" width="160px" height="120px" /></p>';}
				}
			}
		}
	/**/
	?>
        </div>
    </div>    
    </div>
    <div id="scrollbar">
        <div id="menu-scroll-container">
            <div id="menu-scroll-top">
            </div>
            <div id="menu-scroll-bar">
            </div>        
            <div id="menu-scroll-bottom">
            </div>
            
            <div id="menu-scroll-scroller-container">
                <div id="menu-scroll-scroller">        
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
var myScroll;
function loaded() {
	setTimeout(function () {
		//myScroll = new iScroll('menu-viewport');
	}, 1000);
}
window.addEventListener('load', loaded, false);
</script>

<script language="javaScript">

<!--
function go_anchor(n){
document.getElementById("menu-content").scrollTop = document.getElementById(n).offsetTop - 135;
}
// -->

</script> 
</div>