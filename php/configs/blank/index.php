<?php
require_once('../php/configs/constants.php');
require(SERVER_ROOT . 'php/Controller.php');
$menuCategories = unserialize(MENU_CATEGORIES);
$itemCount = 1;

Controller::loadClass('Model_Plugin_ResturantMenu'); 
$rmModel = new Model_Plugin_ResturantMenu;
$menuArray = $rmModel->buildMenu();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Printable Menu - Habanero Mexican Grill</title>
<meta name="Description" content="Our menu at Habanero Mexican Grill.  Enjoy Tacos, Tortas, Burritos, Taco Salads, Carne Asada, Fried Tilapia, Wings, Burgers, Fajitas and much more" />

<style>
	body{	
		background-color:#FFEAB6;
		color:#98090D;
                font-family:Arial,Helvetica,sans-serif;
	}
	#print-area{	
		width:800px;
		border:thin #9809D;
		height:600px;
		position:relative;
	}
	p{
		padding-left:20px;
                font-size:12px;
	}
        h2{
               padding:0px;
               margin: 5px;
        }
	.column{
		width:380px;
		height:inherit;
		padding:10px;
		float:left;
	}
	.description{
	}
	.clear{
		clear:both;
	}
	.menu-item{
	}
	#logo{
		width:500px;
	}
	#info-box{
		position:absolute;
		right:10px;
		top:10px;
		text-align:right;
	}
</style>
<script type="text/javascript" src="/js/jquery.js" ></script>
<script type="text/javascript">
	$(document).ready(function() {
		var size = $("#column-1 > div").size();
		//alert(size);
		$("#column-1 > div").each(function(index){
			if (index >= size/2){
				$(this).appendTo("#column-2");
			}
		});
 	});
</script>

</head>
 
<body>
    <div id="print-area">
   		<div id="logo"><h1>Habanero Mexican Grill Menu</h1></div>
        <div id="info-box">
        	<strong>(804) 750-2020</strong><br />
        	9101 Quioccasin Rd. Henrico, VA 23229<br />
			<strong>Hours</strong>: Mon-Sun 11am - 9pm
        </div>
        <div class="clear"></div>
    	<div id="column-1" class="column">
                <?php      
				//print_r($menuArray);          
                    foreach($menuArray as $cat => $item){
                        //if(){	
                        
                        if($cat != 'specials'){ 
							echo '<div class="item"><h2>' . $menuCategories[$cat] . '</h2>';
						}
                        if($item != null && $item != ''){
							if($cat != 'specials'){echo '<p>';}
							$i = 0;
                            foreach($item as $element => $itemInfo){
								if($i == 0){$description = $menuArray[$cat][$element]['description'];}
								$i++;
                                if($cat != 'specials'){echo '<strong>' . $menuArray[$cat][$element]['name'] . '</strong>';
								if($cat == 'tacosalad' || $cat == 'fajitas' || $cat == 'quesadillas' || $cat == 'specialties' ){	
									echo '<br /><span class="description">' . $menuArray[$cat][$element]['description'] . '';
								}
								echo ' &mdash; ' . $menuArray[$cat][$element]['price'] . '<br />';}
								if($cat == 'tacosalad' || $cat == 'fajitas' || $cat == 'quesadillas' || $cat == 'specialties' ){	
									echo '</span>';
								}
                                else{}
                            }							
							if($cat != 'specials'){
								echo '</p>';
								if($cat == 'tacos' || $cat == 'tortas' || $cat == 'buritos' ){
									echo '<p>' . $description . '</p>';
								}
								echo '</div>';
							}
                        }
                    }

        
            foreach($menuArray as $cat => $item){
                //if(){	
                if($item != null && $item != ''){
                    foreach($item as $element => $itemInfo){
                        
                      //  if($cat == 'specials'){echo '<p class="menu-item"></p>';}
                      //  else{echo '<p class="menu-item"><img src="/images/menu-manager/thumbs/' . $menuArray[$cat][$element]['image'] . '" alt="' . $menuArray[$cat][$element]['name'] .'" width="160px" height="120px" /></p>';}
                    }
                }
            }
        /**/
        ?>
           
        </div>  
        <div id="column-2" class="column"></div>  
    </div>
</body>
</html>