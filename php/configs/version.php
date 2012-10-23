<?php
/* 
***************************************
Version Information and current version
***************************************
*/

define('CMS_VERSION', '0.6.2');
define('SYS_VERSION', '1.2.4');

/*
***************************************
Defect Log
***************************************
** CMS **
	- Can not use include system with current text editor
		* Database over-ride til fix is found
		* Fix
			+ Create system so the '<p>' tag doesnt get rendered for non templated content
	
** System **
	- Add codebase for dynamic templating for sites
		* Create system to select "front-wrapper" based on URI
			+ Allows multiple page templates for one site

***************************************
Change Log for the System
***************************************
** Version 1.2.3 **
	- Added jQuery UI Library (added size to install)
** Version 1.2.3 **
	- Updated total section capabilities from 5 to 8
** Version 1.2.3 **
	- Updated configuration file to also include form info for customer (email to send to and subject)
	- Added Constants to all existing form views for easier use in future
	- Corrected defect with RTE pages for IE9 and Webkit Browsers
** Version 1.2.2 **
	- Improved folder structure
	- Added common used images and structured files
** Version 1.2.1 **
	- Merged LenderTrust Functionality
		* Added better form validation (js/php enhancements)
** Version 1.2.0 **
	- Merged Habanero Functionality
		* Added JS Files to structure
		* CSS File added for static styles
		* Created Past Projects Folder
		* Merged Habanero Includes to /includes/layouts/habanero that
		  contains the Header and Footer information to rebuild the site
	- Structured content better (folder structure)
	- Re-Baselined the System
	
** Version 1.1.2 **
	- Basic Blog Ability added
	- Basic Menu Manager added
	
** Version 1.1.1
	- Added 960 Grid System
	- Added Visual Sciences Info (Tracking Data through URL via Javascript - vs.js and update to front-wrapper.php) - Helpful with Google Analytics and other analyical software for your site.  Make each page hit unique.  The next update with this system will be to use a cookie to store the data that is collected upon first hit to the site.

** Version 1.0.0 **
	- MVC Basic System in place
	- Basic layout functionality
	- Dynamic Stylesheet for front end
	- Dynamic Page Configs
	- Dynamic Content Callouts
	- Multi layout functionality with Homepage (3 callout) and 2 column layouts
	- Cookie and Session Utilities Established
	
// Future changes
	- Easier way to build databases and install on new server
	- Create blog front-end components
	- Dynamic callout system (tracking cookie handles content)
	

***************************************
Change Log for the CMS
***************************************
** Version 0.6.2
	- Changed Branding and a few other design related items
	- Added 3 more sections to the page config editor
	
** Version 0.6.1
	- Added rough user level functionality
		* Needs to be updated and more obfusticated though
		* Easier Management Needed

** Version 0.6.0
	- Created Blog Functionality
	- Created Resturant Menu Manager Funtionality
	- Cleaned up some code
	- Started User Management System
	
** Version 0.5.2
	- Started File Management System
	- PHP Creates Bootstrap Automatically
	- Moved Form Handler under Controller Class as Plugin
	- Created File Utility
	- Added 960 Grid System to Front End
	
** Version 0.5.1
	- Cancel Form Functionalty added

** Version 0.5.0
	- MVC Basic System in place
	- Complex Layout system in place
	- CmsForms class created to handle submissions (picks up get query "process" and handles the form then based on page)
	- JQuery Control over CMS created
	- Login/Logout functionality added
	- Edit Content ability established
	- Page Config updating established

**************************************************************************************************
** Future changes ********************************************************************************
**************************************************************************************************
	- Cleaner Design
	- Delete DB Item functionality (with Are You Sure modal)
	- Establish Dynamic Stylesheet Editor
		- Relational DB with columns as rows
		- Color Swatch popup
		- Dropdowns for valid styles
	- Clean up database ability (optimize tables, delete all old Blog Promotions)
	- Do something with Navigation System


*/