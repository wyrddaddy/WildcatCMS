<?php
Cwdc::loadClass('Model_Front');
/* 
************************************************************************************
View_Plugin_Callout Class
    Description:
		Dynamically changes the content callouts based off of different cookie settings
		
		** Currently DOES NOT WORK **
		
	Author: Ryan Erb / Creative Wildcat
	Version: 0.1.0
	Date: 5/2011
	
	Methods:
		
************************************************************************************
*/ 
class View_Plugin_Callout {

	var $callouts;
	var $welcome;

	function View_Plugin_Callout() {
	
	}

	function buildCalloutArray($type){
		 $model = new Model_Front;
		$this->callouts = $model->loadCallouts($type);
	}
	
	function buildWelcome($site){		
		$model = new Model_Front;
		$this->welcome = $model->loadWelcomeCallout($type);
	}
}