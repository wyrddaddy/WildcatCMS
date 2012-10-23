<?php
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
class Model_Admin{
	
	function Model_Admin(){
		$this->dbConnect();
	}
	function dbConnect(){
		mysql_connect(DB_LOCATION, DB_USRNAME, DB_PASSWORD) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error()); 
	}
	// Checks CMS Login
	function checkUser($name, $pass){
		$results = mysql_query('SELECT * from cw_users WHERE name ="' . $name . '" AND password = "' . $pass . '"');
		$count = mysql_num_rows(	$results);
		return $count;
	}
	// Basic select all statement
	function getDataTable($table){
		$resource = mysql_query('SELECT * from cw_'. $table .'');
		$count = mysql_num_rows(	$resource);
		while($row = mysql_fetch_array($resource) ){
			$data[] = $row;
		}
		return $data;
	}
	/*
		Page Configs Form Processing
	*/
	// New Config System
	function updateConfigsV2($uri, $name, $description, $crumb){
		mysql_query('UPDATE cw_page_configs SET name="' . $name . '",  description="' . $description . '", layout="' . $crumb . '" WHERE uri ="' . $uri . '"');
	}
	
	function insertConfigsV2($uri, $name, $description, $crumb){
		mysql_query('INSERT INTO cw_page_configs (uri, name, description, crumb) VALUES ("' . $uri . '", "' . $name . '", "' . $description . '", "' . $crumb . ' )');
	}
	// Old Config System
	function updateConfigs($uri, $name, $description, $layout, $section1, $section2, $section3, $section4, $section5, $crumb, $section6, $section7, $section8){
		mysql_query('UPDATE cw_page_configs SET name="' . $name . '",  description="' . $description . '", layout="' . $layout . '", section1="' . $section1 . '", section2="' . $section2 . '", section3="' . $section3 . '", section4="' . $section4 . '", section5="' . $section5 . '", breadcrumb="' . $crumb . '", section6="' . $section6 . '", section7="' . $section7 . '", section8="' . $section8 . '" WHERE uri ="' . $uri . '"');
	}
	
	function insertConfigs($uri, $name, $description, $layout, $section1, $section2, $section3, $section4, $section5, $crumb, $section6, $section7, $section8){
		mysql_query('INSERT INTO cw_page_configs (uri, name, description, layout, section1, section2, section3, section4, section5, breadcrumb, section6, section7, section8) VALUES ("' . $uri . '", "' . $name . '", "' . $description . '", "' . $layout . '", "' . $section1 . '", "' . $section2 . '", "' . $section3 . '", "' . $section4 . '", "' . $section5 . '", "' . $crumb . '", "' . $sectin6 . '", "' . $section7 . '", "' . $section8 . '" )');
	}
	
	/*
		Blog Post Form Processing
	*/
	function updateBlogPost($id, $title, $description, $body, $image, $topic){
		mysql_query('UPDATE cw_blog SET title="' . $title . '", description="' . $description . '", body="' . $body . '", image="' . $image . '", topic="' . $topic . '" WHERE id="' . $id . '"')or die(mysql_error());
	}
	
	function insertBlogPost($date, $title, $description, $body, $image, $topic){
		mysql_query('INSERT INTO cw_blog (date, title, description, body, image, topic) VALUES ("' . $date . '", "' . $title . '", "' . $description . '", "' . $body . '", "' . $image . '", "' . $topic . '" )');
	}
	
	/*
		Menu Manager Form Processing
	*/
	function updateMenuManager($id, $name, $description, $price, $image, $category){
		mysql_query('UPDATE cw_menu_manager SET name="' . $name . '", description="' . $description . '", price="' . $price . '", image="' . $image . '", category="' . $category . '" WHERE id="' . $id . '"')or die(mysql_error());
	}
	
	function insertMenuManager($name, $description, $price, $image, $category){
		mysql_query('INSERT INTO cw_menu_manager (name, description, price, image, category) VALUES ("' . $name . '", "' . $description . '", "' . $price . '", "' . $image . '", "' . $category . '" )');
	}
	
		/*
		Content Callout Form Processing
	*/
	function updateContent($id, $description, $html){
		mysql_query('UPDATE cw_content SET description="' . $description . '",  html="' . $html . '" WHERE id ="' . $id . '"');
	}
	
	function insertContent($description, $html){
		mysql_query('INSERT INTO cw_content (html, description) VALUES ("' . $html . '" , "' . $description . '" )');
	}

}