<?php
/* 
************************************************************************************
Utilities_Cookie Class
    Description:
		Cookie Handler for the website - Creates a wrapper for the PHP Cookie Handlers
		
	Author: Ryan Erb / Creative Wildcat
	Version: 1.0
	Date: 7/2011
	
	Methods:
		setCookie($name, $value, $expires = null, $secure = false) - Sets Cookie
		setName($name)
		setValue($value)
		getValue()
************************************************************************************
*/ 
class Utilities_Cookie {

	
	var $name;
	var $value;
	
	
	function Utilities_Cookie(){
	
	}
	
	function setCookie($name, $value, $expires = null, $secure = false){
		if ($expires == null){
			$expires = time()+60*60*24*30;
		}
		$serverArray = explode('.' , $_SERVER['SERVER_NAME']);
		$ext = end($serverArray);
		$domain = end($serverArray - 1);
		$base = '.' . $domain . '' . $ext . '';
		setcookie($name, $value, $expires, '/', $base, $secure);	
	}
	
	
	function setName($name){
		$this->name = $name;
	}	
	function setValue($value){
		$this->value = $value;
	}
	function getName($name){
		$this->name = $name;
	}	
	function getValue(){
		$this->value = $_COOKIE[$value];
	}

}