<?php
require_once('configs/constants.php');
if(ERROR_MODE == 'debug'){
	error_reporting(E_ALL ^ E_NOTICE);
}
if(ERROR_MODE == 'prod'){
	error_reporting(0);
}


if(substr($_SERVER['REQUEST_URI'], 0, 7) == '/admin/'){
	//echo 'Admin Page'; 
	
	require_once(SERVER_ROOT . 'php/Controller/Cwcms.php');
	$display = new Cwcms;
} 

else{
	require_once(SERVER_ROOT . 'php/Controller/Cwdc.php');
	$display = new Cwdc;
}