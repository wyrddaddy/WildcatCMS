<?php

Cwdc::loadClass('View_Plugin_Callout_Random');
Cwdc::loadClass('View_Plugin_Crumbs');
// Cwdc::loadClass('View_Plugin_Callout_Tracked'); 
Cwdc::loadClass('Model_Front');
/* 
************************************************************************************
View_Front Class
    Description:
		Creates the View and carries the variables into the view for the front end of the website
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 5/2011
	
	Methods:
		init() -  calls all needed methods on load of the view
		getContent() - gets sections from the model loading them into the view object
		setSubLayout() - includes the Layout by using the DB response to build the include URL
		setLayout() - Gets the Main Wrapper to send variables in object to
************************************************************************************
*/ 
class View_Front {	
    
	var $type;
	var $uri;
	var $view;
	var $_config;
	var $_styles;
	var $mainAlignment;
	var $rawPrimaryNav;
	var $rawFooterNav;
	var $section;
	var $layoutLink;
	var $crumbs;
	
	var $header;
	var $footer;
	
	function View_Front(){
    	$this->init();
	}
	
	function init(){
		$model = new Model_Front;
		$this->setUri();
		$this->_config = $model->loadConfig($this->uri);
		$this->_styles = $model->setStyles();
		$this->plugins();
		$this->rawFooterNav = $model->createNavigation('footer');
		$this->rawPrimaryNav = $model->createNavigation('primary_nav');		
		$this->mainAlignment = $this->_styles['#main-wrapper']['align'];		
		$this->setSubLayout();
		$this->getContent();
		$this->setLayout();	
		
	}
	
	function plugins(){
		if(BREADCRUMBS == true){
			$crumbs = new View_Plugin_Crumbs($this->uri);
			$this->crumbs = $crumbs->crumbs;
		}
	}
	
	function getContent(){
		$model = new Model_Front;
		for ($i = 1; $i <= SECTION_COUNT; $i++){
			if ($this->_config['section' . $i] != ''){
				/*if ($this->_config['section' . $i] == 'random'){
							
				}
				else {*/
					$this->section[$i] = $model->loadSectionContent($this->_config['section' . $i]);			
				//}	
			}
		}
		//print_r(	$this->section );
	}
	
	function setSubLayout(){
		$this->layoutLink = SERVER_ROOT . '/includes/layouts/' . $this->_config['layout'] . '.php';
	}
	
	
	function setLayout(){
		if(stristr($this->uri, 'css')){
			$this->type = 'css';
		}
		else {
			$this->type = 'html';
		}
		switch($this->type){
			case 'css': break;
			case 'html': 
				$this->view = include(SERVER_ROOT . 'includes/layouts/front-wrapper.php');
				break;
		}
	}

	/*
		function handleLocation(){
			$this->setUri();
			if($this->uri == '/' || $this->uri == '/index-new.php' || $this->uri == '/index.php'){
					$this->view = include( 'includes/layouts/front-wrapper.php');
			}
			else {
				$this->layoutName = 'standard';
			}
			$includeString = 'includes/layouts/' . $this->layoutName . '.php';
			require($includeString);
		}	
	*/
	
	function setUri(){
		$uri = $_SERVER['REQUEST_URI'];
		$uriArray = explode('?', $uri);
		$this->uri = $uriArray[0];
	}

}