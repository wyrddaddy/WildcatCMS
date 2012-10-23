<?php

require_once(SERVER_ROOT . 'php/Controller.php');
//Cwcms::loadClass('Controller_Plugin_CmsForms');
/* 
************************************************************************************
Cwcms Class
    Description:
		Main Controller for the Content Management System
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 7/2011
	
	Methods:
		sessionHandler() - Sets the session every page to persist session
		setView() - Calls the CMS View
************************************************************************************
*/ 
class Cwcms extends Controller {
	
	

	function Cwcms(){		
		$this->sessionHandler();
		$this->registerPlugin('Controller_Plugin_CmsForms');
		$this->setView();		
		//$this->debugScripts();
		//$this->setView();
	}
	
	
	function sessionHandler(){
		session_start();
	}	
	
	function setView(){
		$this->loadClass('View_Cms');
		$this->view = new View_Cms;	
	}

}