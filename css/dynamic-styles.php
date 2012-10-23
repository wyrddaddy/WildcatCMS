<?php header('Content-type: text/css'); ?>
@charset "utf-8";
/* CSS Document */
<?php
	require_once('../php/system.php');
	require_once('../php/Model/Front.php');
	$styles = new Model_Front;
	$dynamicStyles = $styles->setStyles();
	foreach ($dynamicStyles as $dynamicStyle){
		foreach ($dynamicStyle as $key => $value){
			if ($key == 'tag' && is_numeric($key) == false){
				echo  $value . '{';
			}
			else {
				if(($value != '' || $value != NULL) && is_numeric($key) == false && $key != 'align' && $key != 'description'){
					//print('\n');
					echo $key . ': ' . $value . '; ';
				}
			}
		}
		echo '}';
	}

?>