<?php
/* 
************************************************************************************
Controller Class
    Description:
		Base  Controller Functionality - Designed to be extended for most uses
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 6/2011
	
	Methods:
		setUri() - Sets page location to the main controller object
		getUri() - returns the $uri variable in the object
		setView($view)
		setModel($model)
************************************************************************************
*/ 
class Controller { 

	
	var $view;
	var $model;
	var $uri;
	var $layoutName;
	var $plugins;
	
	function __construct(){
	
	}
	/* loadClass Method creates a wrapper for including classes
	   All class names must be named by directory structure, for example class Some_File_Located_Here would be located in
	   /php/Some/File/Located/Here.php - The final segement is the filename of the class.  AKA the class name.
	*/

	function loadClass($class){
		$fileStructureDraft = str_replace('_', '/', $class);
		$fullFileLocation = SERVER_ROOT . 'php/' . $fileStructureDraft . '.php';	
		require_once($fullFileLocation);
	}	
	
	function registerPlugin($plugin){
		Controller::loadClass($plugin);
		$this->plugins[] = new $plugin;		
	}
	
	function getFileDir($fullPath){
		$filename = explode("/", $fullPath); // THIS WILL BREAK DOWN THE PATH INTO AN ARRAY
		for( $i = 0; $i < (count($filename) - 1); ++$i ) {
			$filename2 .= $filename[$i].'/';
		}
		return $filePath;
	} 
	
	function setUri(){
		$this->uri = $_SERVER['REQUEST_URI'];
	}
	function getUri(){
		return $this->uri;
	}
	
	function setView($view){
		$this->view = $view;
	}	
	function setModel($model){
		$this->model = $model;
	}
		
}