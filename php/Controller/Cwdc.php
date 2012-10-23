<?php
/* 
************************************************************************************
Cwdc Class
    Description:
		Cwdc class contains functionality that makes decisions on what will be displayed on the site. 
		
		This class is the primary file of the site. 
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 5/2011
	
	Methods:
		setView() - Loads View
		debugScripts() - Meant to create a form of Debugging (Doesnt Work)
		debugConfig() - Meant to create a form of Debugging (Doesnt Work)
************************************************************************************
*/ 
require_once(SERVER_ROOT . 'php/Controller.php');
class Cwdc extends Controller{
	

	function Cwdc(){
		$this->setView();
		//$this->debugScripts();
		//$this->setView();
	}
	
	function setView(){
		$this->loadClass('View_Front');
		$this->view = new View_Front;	
	}
	
	function debugScripts(){
		if ($_GET['debugConfig']) {
			$this->debugConfig();
		}
	}
	
	function debugConfig(){
		echo '<pre>';
		print_r($this->_config);
	}
	
}