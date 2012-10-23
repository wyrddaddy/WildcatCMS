<?php
require_once(SERVER_ROOT . '/php/Model.php');
/* 
************************************************************************************
Model_Admin Class
    Description:
		Contains all SQL Queries for the Back end of the website
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 8/2011
	
	Methods:
		 dbConnect() - connects to the DB
		  checkUser($name, $pass) - returns how many username and passwords exist that were passed to it
		  getDataTable($table) - Generic Select All statement (table must start with cw_
		  updateConfigs($uri, $name, $description, $layout, $section1, $section2, $section3, $section4, $section5) 
		  insertConfigs($uri, $name, $description, $layout, $section1, $section2, $section3, $section4, $section5)
		  updateContent($id, $description, $html)
		  insertContent($id, $description, $html)
************************************************************************************
*/ 
class Model_Plugin_ResturantMenu extends Model{
	
	function Model_Plugin_ResturantMenu(){
		Model::dbConnect();
	}
	
	function buildMenu(){
		$menuCategories = unserialize(MENU_CATEGORIES);
		$menuArray[] = array();
		foreach ($menuCategories as $key => $value){
			if($key != 'off'){	
				$menuArray[$key] = $this->getMenuType($key);
			}
		}
		return $menuArray;
	}
	function getMenuType($category){
		$resource = mysql_query('SELECT * FROM cw_menu_manager WHERE category = "' . $category . '"');
		while ($row = mysql_fetch_array($resource)){
				$nav[$row['name']] = $row;	
		}	
		return $nav;
	}
}