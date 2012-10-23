<?php
/* 
************************************************************************************
Model_Front Class
    Description:
		Contains all SQL Queries to the Database for the Front End of the website
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 5/2011
	
	Methods:
		dbConnect() - Connects to the DB
		createNavigation($navType) - Gets the Navigation
		loadConfig($uri) - Gets Page Config Information
		loadSectionContent($id) - Gets Section Content for page (callouts)
		setStyles() - Gets Dynamic Styles from the DB
		loadCallouts($type = '') - Gets Callouts (Unfinished, started for Dynamic Callout Funtionality)
		loadWelcomeCallout($referringSite) - Created to Thank you for coming from site (Unfinished, form of greeting)
************************************************************************************
*/ 
class Model_Front {
	
	var $dynamicStyles;
	
	function Model_Front(){
		$this->dbConnect();
		//$this->getStyles(); 	
	}
	
	function dbConnect(){
		mysql_connect(DB_LOCATION, DB_USRNAME, DB_PASSWORD) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
	}
	
	function createNavigation($navType){
		$resource = mysql_query('SELECT * FROM cw_navigation WHERE ' . $navType . ' = 1 ORDER BY position ASC');
		while ($row = mysql_fetch_array($resource)){
				$nav[$row['name']] = $row;	
		}	
		return $nav;
	
	}
	
	function loadConfig($uri){
		$resource = mysql_query('SELECT * FROM cw_page_configs WHERE uri="' . $uri . '"');
		while ($row = mysql_fetch_array($resource)){
				$config = $row;	
		}	
		return $config;
	}
	
	function loadSectionContent($id){
		$resource = mysql_query('SELECT html FROM cw_content WHERE id="' . $id .'"');
		while ($row = mysql_fetch_array($resource)){
			$section = $row[0];	
		}			
		return $section;
		
	}

	function setStyles(){
		$resource = mysql_query('SELECT * FROM cw_dynamic_css');
		while ($row = mysql_fetch_array($resource)){
			$this->dynamicStyles[$row['tag']] = $row;	
		}	
		return $this->dynamicStyles;
	}
	
	function loadCallouts($type = ''){
		if($type != ''){
			$queryAugment = 'AND callout_type =  "' . $type . '"';
		}
		else {
			$queryAugment = '';
		}
		$resource = mysql_query('SELECT * FROM cw_content WHERE is_callout = "1" AND is_welcome = 0 ' . $queryAugment );
		while ($row = mysql_fetch_array($resource)){
			$callout[] = $row;	
		}	
		return $callout;
	}
	
	function loadWelcomeCallout($referringSite){
		$resource = mysql_query('SELECT * FROM cw_content WHERE is_callout = "1" AND is_welcome = 1 AND welcome_site = "' . $referringSite . '"' );
		while ($row = mysql_fetch_array($resource)){
			$welcome = $row;	
		}	
		return $welcome;
	}
	function getCrumbs($uri){
		$resource = mysql_query('SELECT breadcrumb FROM cw_page_configs WHERE uri="' . $uri . '"');
		while ($row = mysql_fetch_array($resource)){
				$crumbs = $row;	
		}	
		return $crumbs[0];
	}

}