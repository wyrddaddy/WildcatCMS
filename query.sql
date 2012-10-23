-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 50.63.224.5
-- Generation Time: Sep 03, 2012 at 11:54 AM
-- Server version: 5.0.92
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cwsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_blog`
--

CREATE TABLE `cw_blog` (
  `id` int(100) NOT NULL auto_increment,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `topic` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cw_blog`
--

INSERT INTO `cw_blog` VALUES(1, '2012-07-06', 'Sample Blog Entry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. <b>Lorem ipsum dolor sit amet, consectetur adipiscing elit</b>. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>\r\n \r\n<p>Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. <i>Lorem ipsum dolor sit amet, consectetur adipiscing elit</i>. Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum.</p>\r\n \r\n<p> </p>\r\n \r\n<p>Nulla metus metus, ullamcorper vel, tincidunt sed, euismod in, nibh. Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante. Sed lacinia, urna non tincidunt mattis, tortor neque adipiscing diam, a cursus ipsum ante quis turpis. Nulla facilisi. <b>Proin ut ligula vel nunc egestas porttitor</b>. Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet. Vestibulum sapien. Proin quam. Etiam ultrices. Suspendisse in justo eu magna luctus suscipit. </p>\r\n \r\n<p>Sed lectus. Integer euismod lacus luctus magna. Quisque cursus, metus vitae pharetra auctor, sem massa mattis sem, at interdum magna augue eget diam. <b>Nunc feugiat mi a tellus consequat imperdiet</b>. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui. Praesent blandit dolor. Sed non quam. In vel mi sit amet augue congue elementum. Morbi in ipsum sit amet pede facilisis laoreet. Donec lacus nunc, viverra nec, blandit vel, egestas et, augue. Vestibulum tincidunt malesuada tellus. Ut ultrices ultrices enim. Curabitur sit amet mauris. Morbi in dui quis est pulvinar ullamcorper. <b>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lacinia molestie dui</b>. Nulla facilisi. </p>\r\n \r\n<p>Integer lacinia sollicitudin massa. Cras metus. Sed aliquet risus a tortor. Integer id quam. Morbi mi. Quisque nisl felis, venenatis tristique, dignissim in, ultrices sit amet, augue. Proin sodales libero eget ante. Nulla quam. Aenean laoreet. Vestibulum nisi lectus, commodo ac, facilisis ac, ultricies eu, pede. Ut orci risus, accumsan porttitor, cursus quis, aliquet eget, justo. Sed pretium blandit orci. <b>Quisque nisl felis, venenatis tristique, dignissim in, ultrices sit amet, augue</b>. Ut eu diam at pede suscipit sodales. Aenean lectus elit, fermentum non, convallis id, sagittis at, neque. </p>', '', 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `cw_content`
--

CREATE TABLE `cw_content` (
  `id` int(255) NOT NULL auto_increment,
  `html` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_callout` tinyint(2) NOT NULL,
  `callout_type` varchar(30) NOT NULL,
  `is_welcome` tinyint(2) NOT NULL,
  `welcome_site` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cw_content`
--

INSERT INTO `cw_content` VALUES(68, '<h1>Welcome to Creative Wildcat CMS</h1>\r\n<p><strong>Base site configuration is correct.</strong> Seeing this text ensures that the database system and the front end system are functioning properly.&nbsp; There are items and components that require further configuration however.&nbsp; Also <a href="../" target="_blank">WildcatCMS Admin System</a> utilizes different functionality than the front end system you are viewing now.&nbsp; Full configuration of the content management system must be validated by visiting the <a href="../" target="_blank">admin console</a></p>\r\n<h2>Below are a few notes before site host transfer</h2>\r\n<ol>\r\n<li>Remember before transferring to "get" the files from the server.&nbsp; Several files are written by WildcatCMS that will not be in your local copy of the site</li>\r\n<li>At final stage - dump mySQL database to a sql file</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<h3>The following files are blanks to work with</h3>\r\n<ul>\r\n<li>/js/base.js</li>\r\n<li>/css/styles.css</li>\r\n<li>/includes/header/header.php</li>\r\n<li>/includes/footer/footer.php</li>\r\n<li>/php/configs/blank/index.php &lt;-- This creates a non-wrapped page (not CMS controlled but with access to the system framework</li>\r\n</ul>\r\n<pre><code> #header h1 a { display: block; width: 300px; height: 80px; } </code></pre>', 'Welcome Content', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cw_dynamic_css`
--

CREATE TABLE `cw_dynamic_css` (
  `tag` varchar(75) NOT NULL,
  `description` varchar(255) NOT NULL,
  `font-size` varchar(10) NOT NULL,
  `font-family` varchar(75) NOT NULL,
  `align` varchar(10) NOT NULL,
  `text-align` varchar(10) NOT NULL,
  `width` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `background-color` varchar(10) NOT NULL,
  `background` varchar(255) NOT NULL,
  `color` varchar(10) NOT NULL,
  `position` varchar(15) NOT NULL,
  `text-decoration` varchar(15) NOT NULL,
  `padding` varchar(10) NOT NULL,
  `padding-bottom` varchar(10) NOT NULL,
  `padding-top` varchar(10) NOT NULL,
  `float` varchar(30) NOT NULL,
  `clear` varchar(30) NOT NULL,
  `margin` varchar(10) NOT NULL,
  `margin-top` varchar(75) NOT NULL,
  `border-left` varchar(255) NOT NULL,
  `border-right` varchar(255) NOT NULL,
  `border` varchar(100) NOT NULL,
  `text-shadow` varchar(100) NOT NULL,
  `-webkit-box-shadow` varchar(100) NOT NULL,
  `-moz-box-shadow` varchar(100) NOT NULL,
  `font-weight` varchar(100) NOT NULL,
  `background-size` varchar(50) NOT NULL,
  PRIMARY KEY  (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_dynamic_css`
--

INSERT INTO `cw_dynamic_css` VALUES('p', 'Sets Paragraph Styles', '11px', 'Verdana, Geneva, sans-serif', '', 'left', '', '', '', '', '#FFFFFF', '', '', '', '', '', '', '', '8px', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('body', 'Sets Body Styles', '11px', 'Verdana, Geneva, sans-serif', '', 'left', '', '', '#2e1d26', 'url(''/images/bg.jpg'') fixed', '#FFFFFF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '100%');
INSERT INTO `cw_dynamic_css` VALUES('#main-wrapper', 'Sets Site Wrapper Styles (sets width of site and overall justification)', '', '', 'center', '', '779px', '', '', '', '', 'relative', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a:hover.primary-nav', 'Sets Primary Navigation Styles when Hovered', '', '', '', '', '', '', '', '', '#FFFFFF', '', 'none', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a.primary-nav', 'Sets Primary Navigation Styles', '18px', 'CalligraffitiRegular, Verdana, sans-serif', '', '', '', '', '', '', '#F7EFC5', '', 'none', '15px', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('.divider', 'Sets Divider Styles', '', '', '', '', '', '', '', '', '', '', '', '', '4px', '4px', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a.footer', 'Sets Styles for Linked Footer Elements', '10px', '', '', '', '', '', '', '', '#F7EFC5', '', 'none', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a:hover.footer', 'Sets Styles for Linked Footer Elements when Hovered', '', '', '', '', '', '', '', '', '#FFFFFF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('.footer', 'Sets Styles for Footer Elements', '10px', '', '', '', '', '', '', '', '#F7EFC5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a', '', '', '', '', '', '', '', '', '', '#F7EFC5', '', '', '', '', '', '', '', '', '', '', '', '0px', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('a:hover', '', '', '', '', '', '', '', '', '', '#FFFFFF', '', '', '', '', '', '', '', '', '', '', '', '', '#EDE92A 0 0 4px', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('h2', '', '23px', 'CalligraffitiRegular, Verdana, sans-serif', '', 'center', '', '', '', '', '#fcec3e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'lighter', '');
INSERT INTO `cw_dynamic_css` VALUES('#column-1.two-column', '', '', '', '', 'left', '539px', '', '', '', '', '', '', '', '', '', 'left', '', '5px', '', '', '1px solid #F7F0CE', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('#column-2.two-column', '', '', '', '', 'left', '220px', '', '', '', '', '', '', '', '', '', 'left', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('h3', '', '22px', 'CalligraffitiRegular, Verdana, sans-serif', 'left', '', '', '', '', '', '#fcec3e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'lighter', '');
INSERT INTO `cw_dynamic_css` VALUES('h1', '', '24px', 'CalligraffitiRegular, Verdana, sans-serif', '', 'left', '', '', '', '', '#fcec3e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('#crumbs', 'Breadcrumbs', '', '', '', 'left', '', '', '', 'url(''/images/dividerTop-trans.png'') ', '', '', '', '4px', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('.even-3', 'Three Column', '', '', '', '', '33%', '', '', '', '', '', '', '', '', '', 'left', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('h4', '', '20px', 'CalligraffitiRegular, Verdana, sans-serif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'lighter', '');
INSERT INTO `cw_dynamic_css` VALUES('#footer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '-20px', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('#section-5', '', '', '', '', 'left', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `cw_dynamic_css` VALUES('#header', '', '', '', '', '', '100%', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cw_menu_manager`
--

CREATE TABLE `cw_menu_manager` (
  `id` int(100) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `cw_menu_manager`
--

INSERT INTO `cw_menu_manager` VALUES(56, 'Taco salad', 'Crisp flour tortilla filled with your choice of chicken, beef, or ground beef, added to lettuce, fried beans, shredded cheese, sour cream, pico de gallo, tomato and onions', '$8.00', 'img_Tacosalad_93.jpg', 'tacosalad');

-- --------------------------------------------------------

--
-- Table structure for table `cw_navigation`
--

CREATE TABLE `cw_navigation` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `primary_nav` tinyint(2) NOT NULL,
  `footer` tinyint(2) NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_navigation`
--

INSERT INTO `cw_navigation` VALUES('Web', 'Web Design and Development Homepage', 2, '/web', 1, 1);
INSERT INTO `cw_navigation` VALUES('Print', 'Print Design - Business Cards, Rack Cards, Brochures, Calendars and Much More', 4, '/print', 1, 1);
INSERT INTO `cw_navigation` VALUES('Photography', 'Photography Services', 3, '/photography', 1, 1);
INSERT INTO `cw_navigation` VALUES('Contact', 'Contact Us', 6, '/contact', 1, 1);
INSERT INTO `cw_navigation` VALUES('Home', 'Return to Homepage', 1, '/', 0, 1);
INSERT INTO `cw_navigation` VALUES('About Us', 'About Creative Wildcat', 5, '/about', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cw_page_configs`
--

CREATE TABLE `cw_page_configs` (
  `uri` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stylesheets` varchar(255) NOT NULL,
  `scripts` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `section1` varchar(255) NOT NULL,
  `section2` varchar(255) NOT NULL,
  `section3` varchar(255) NOT NULL,
  `section4` varchar(255) NOT NULL,
  `section5` varchar(255) NOT NULL,
  `section6-fill` varchar(255) NOT NULL,
  `breadcrumb` varchar(100) NOT NULL,
  `grid` varchar(30) NOT NULL,
  `section6` varchar(255) NOT NULL,
  `section7` varchar(255) NOT NULL,
  `section8` varchar(255) NOT NULL,
  PRIMARY KEY  (`uri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_page_configs`
--

INSERT INTO `cw_page_configs` VALUES('/', 'Test Homepage', '', '', '', '12-column/banner-style/12-4-4-4-with-banner', '68', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cw_scripts`
--

CREATE TABLE `cw_scripts` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_scripts`
--


-- --------------------------------------------------------

--
-- Table structure for table `cw_stylesheets`
--

CREATE TABLE `cw_stylesheets` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cw_stylesheets`
--


-- --------------------------------------------------------

--
-- Table structure for table `cw_users`
--

CREATE TABLE `cw_users` (
  `id` int(40) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cw_users`
--

INSERT INTO `cw_users` VALUES(1, 'administrator', '4d287d3a53144d1187d070fba4b403be', 'admin');
INSERT INTO `cw_users` VALUES(3, 'betterpixels', '89181d30599842aa9118f87c577a5e69', 'sudoadmin');
INSERT INTO `cw_users` VALUES(4, 'admin', 'c50672216e6be50f327c7df719784fe3', 'user');
