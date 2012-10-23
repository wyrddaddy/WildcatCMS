<?php

class Utilities_Math_File {
	
	
	function convertFileSize($size, $setup = null){
		$fileUnit = array("bytes","kB","MB","GB","TB","PB","EB","ZB","YB");
	   
		if(!$setup && $setup !== 0){
			return number_format($size/pow(1024, $I=floor(log($size, 1024))), ($i >= 1) ? 2 : 0) . ' ' . $fileUnit[$I];
		} 
		elseif ($setup == 'INT'){
			 return number_format($size);
		}
		else {
			return number_format($size/pow(1024, $setup), ($setup >= 1) ? 2 : 0 ). ' ' . $fileUnit[$setup];
		}
	}
	
	
}