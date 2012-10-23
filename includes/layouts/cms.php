<?php


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit your site | WildcatCMS</title>
<meta name="robots" content="noindex, nofollow">
<!-- StyleSheets -->
<link rel="stylesheet" type="text/css" href="/css/quick-styles.css"/>
<link rel="stylesheet" type="text/css" href="/css/cms-styles.css?<?php echo rand(1000, 100000); ?>"/>
<link rel="stylesheet" type="text/css" href="/css/grid.css"/>
<?php 

?>
<!-- End StyleSheets -->
<!-- JavaScripts -->

<script src="/js/swfobject.js" type="text/javascript"></script>
<script src="/js/jquery.js" type="text/javascript"></script>
<script src="/admin/js/cms.js?<?php echo rand(1000, 100000); ?>" type="text/javascript"></script>
<?php 
	// echo $this->scripts;
?>
<!-- End Javascripts -->
</head>
<body>
    <!-- Main Wrapper to Set Site Alignment -->
    <div>
        <div id="cms-wrapper"> 
            <!-- Body Content -->
                <!-- Header Content -->
                  <div id="header">
                  	<img src="/images/admin/cms_banner.jpg" alt="Creative Wildcat Content Management System" />
                    <div id="site-id"><?php echo $_SERVER['SERVER_NAME']; ?></div>
                  </div>
					<?php include(SERVER_ROOT . 'includes/header/admin-nav.php'); ?>
                <!-- End Body Content -->
                    <?php
					/*
                        This region is where the body will be placed based upon which layout is called.
                    
                    */
                   include(SERVER_ROOT . 'includes/views/cms/' . $this->content. '.php');                   
                    ?>
                <!-- Footer Content -->
                 <div id="footer">
                   <hr />
                   &copy; Creative Wildcat 2012 | System Version <?php echo SYS_VERSION ?> | CMS Version <?php echo CMS_VERSION ?><br />
                   <a href="http://www.creativewildcat.com" target="_blank">www.creativewildcat.com</a>
                 </div>
                <!-- End Footer Content -->
            <!-- End Body Content -->
        </div>
    <!-- End Main Wrapper Div -->
  </div>
  
</body>
</html>
