<?php
/* 
************************************************************************************
View_Cms Class
    Description:
		Creates the View and carries the variables into the view for the back end of the website
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 7/2011
	
	Methods:
		init()  - runs needed methods
		checkLogin() - verifies that you are indeed logged in, if not, throw a login screen
		queryLogic() - determines what page you are on and the view needed for it
		getContent() - Not used here
		registerPlugin() - Loads Needed Plugings
		 setSubLayout() - gets layout based on return from queryLogic()
		 setLayout() - Sets main wrapper and sends the variables here to that file
		 loadDataTables() - gets tables needed based on page you are on from the DB
************************************************************************************
*/ 
Cwcms::loadClass('Model_Admin');

class View_Cms {	
    
	var $type;
	var $uri;
	var $view;
	var $_config;
	var $_styles;
	var $mainAlignment;
	var $rawPrimaryNav;
	var $rawFooterNav;
	var $content;
	var $layoutLink;
	var $dataTable;
	var $secondaryDataTable;
	var $header;
	var $footer;
	
	function View_Cms(){
    	$this->init();
	}
	
	function init(){
		$this->setUri();		
		//$this->registerPlugin();
		$this->queryLogic();
		$this->checkLogin();
		
		//$this->getContent();
		$this->setLayout();		
	}
	
	function checkLogin(){
		if($_SESSION['valid'] != 'true'){
			$this->content = 'login';
		}		
	}
	
	
	function queryLogic(){
		if(isset($_GET['page']) && ($_GET['page'] != 'login' && !isset($_GET['process']))){
			$this->content = $_GET['page'];
			if($this->content == 'image-manager'){
			
			}
		}
		else{
			$this->content = CMS_MAIN_PAGE;
		}
	}
	
	function getContent(){
		$model = new Model_Admin;
		for ($i = 1; $i <= SECTION_COUNT; $i++){
			if ($this->_config['section' . $i] != ''){
				$this->section[$i] = $model->loadSectionContent($this->_config['section' . $i]);		
			}
		}
	}
	
	
	
	function setSubLayout(){
		$this->layoutLink = SERVER_ROOT . '/includes/layouts/' . $this->_config['layout'] . '.php';
	}
	
	
	function setLayout(){
		$this->loadDataTables();		
		$this->view = include(SERVER_ROOT . 'includes/layouts/cms.php');			
	}
	
	function loadDataTables(){
		$model = new Model_Admin;
		if($_GET['page'] == 'page-config'){
		 $this->dataTable = $model->getDataTable('page_configs');
		 $this->secondaryDataTable = $model->getDataTable('content');
		}
		if($_GET['page'] == 'edit-content'){
		 $this->dataTable = $model->getDataTable('content');
		}
		if($_GET['page'] == 'edit-blog'){
		 $this->dataTable = $model->getDataTable('blog');
		}
		if($_GET['page'] == 'menu-manager'){
		 $this->dataTable = $model->getDataTable('menu_manager');
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
		$this->uri = $_SERVER['REQUEST_URI'];
	}

}