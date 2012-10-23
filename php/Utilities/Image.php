<?php 
ini_set("memory_limit", "200000000");


class Utilities_Image {	

	var $imageAsset;
	var $imgType;

	function Utilities_Image(){  //$_FILES["image_name"] -- Send File to constructor
		// $this->$imageAsset = $img;		
	}
	
	function testCompatible(){
		// if uploaded image was JPG
		if($this->$imageAsset["type"] == "image/jpeg" || $_FILES["image_upload_box"]["type"] == "image/pjpeg"){	
			$this->imgType = 'jpg';
		}		
		// if uploaded image was GIF
		if($this->$imageAsset["type"] == "image/gif"){	
			$this->imgType = 'gif';
		}	
		// if uploaded image was PNG
		if($this->$imageAsset["type"] == "image/x-png"){
			$this->imgType = 'png';
		}
		else {
			$this->imgType = 'invalid';
		}
		
	}

}