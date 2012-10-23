<?php 
/* 
***************************************
Contains Global Constants to configure the site
define('', '');
***************************************
*/
// Database Information
define('FTP_USER','');
define('FTP_PASS','');
define('DB_LOCATION' , '50.63.224.5');
define('DB_USRNAME', 'cwsystem');
define('DB_PASSWORD', 'Pa55w0rd');
define('DB_NAME', 'cwsystem');
// Site Configuration
define('ERROR_MODE', 'debug'); // 'prod' = no errors, 'debug' = all but notices 
define('BREADCRUMBS', true);
define('HOME_URL', '/');
// Webserver Configuration
define('DOMAIN', 'currentversion.creativewildcat.com');
define('SUB_DOMAIN', 'currentversion');
define('SERVER_ROOT', '/home/content/06/5514106/html/staging/WildcatCMS/');
define('SERVER_NAME', $_SERVER['SERVER_NAME']);
define('HTTP_SERVER_NAME', 'http://' . $_SERVER['SERVER_NAME']);
define('HTTPS_SERVER_NAME',  'https://' . $_SERVER['SERVER_NAME']); 
// Email Form Configuration
define('CONTACT_EMAIL', 'ryanaronerb@yahoo.com');
define('CONTACT_SUBJECT', 'Form Submission From Site');
//define('CONTACT_EMAIL', 'ryanaronerb@yahoo.com');
// ************************************************************************
// Advanced Specialty Configuration (Based on needs of customer)

//Layout Stack for Site
$layoutNames = array(
	'Test Homepage' => '12-column/banner-style/12-4-4-4-with-banner',	
);

// Blog Settings ***************
define('BLOG_IMG_LG_SZ', '940');
define('BLOG_IMG_SM_SZ', '200');


// Menu Manager Settings *******
define('MENU_IMG_LG_SZ', '812');
define('MENU_IMG_SM_SZ', '160');
// Sets Menu Categories
$menuCategories = array(
	'cat-1-id' => 'Category 1 Text',
	'cat-2-id' => 'Category 2 Text'
);
define("MENU_CATEGORIES", serialize($menuCategories));
// ************************************************************************
// CMS & Advanced Configuration - For Development Purposes
define('AFTER_LOGIN', '?page=main-screen');
define('CMS_MAIN_PAGE', 'main-screen');
define('SECTION_COUNT', 5);

define("LAYOUT_NAMES", serialize($layoutNames));
include(SERVER_ROOT . 'php/configs/version.php');
$sitebase = explode('.',SERVER_NAME);
$sitebasecount = count($sitebase);
if($sitebasecount > 2){
	$siterootint = $sitebasecount - 2;
	define('ACCT_BASE', $sitebase [$siterootint] . '.' . end($sitebase));
}
else {
	define('ACCT_BASE', SERVER_NAME);
}