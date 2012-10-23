<?php
$layoutSize = explode('-', $this->_config['layout']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_config['name']; ?></title>
<meta name="Description" content="<?php echo $this->_config['description']; ?>" />
<!-- StyleSheets -->
<link rel="stylesheet" type="text/css" href="/css/quick-styles.css"/>
<link rel="stylesheet" type="text/css" href="/css/grid.css"/>
<link rel="stylesheet" type="text/css" href="/css/styles.css?<?php echo rand(1000, 100000); ?>"/>
<?php 
	echo $this->stylesheets;
?>
<!-- End StyleSheets -->
<!-- JavaScripts -->

<script type="application/javascript" src="/js/ui/webkit/iscroll-lite.js"></script>
<script type="text/javascript">
var layout = "<?php 	echo $this->_config['layout']; ?>";

</script>
<!-- Get Google CDN's jQuery and jQuery UI with fallback to local -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="/js/jquery/jquery.js"%3E%3C/script%3E'))</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script>!window.jQuery.ui && document.write(unescape('%3Cscript src="jquery/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>
<script src="/js/swfobject.js" type="text/javascript"></script>
<script src="/js/base.js?<?php echo rand(1000, 100000); ?>" type="text/javascript"></script>
<script src="/js/detect-mobile.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/ui/forms/meiomask.js" charset="utf-8"></script>
<!-- Move to Dynamic Later -->
<script src="/js/jquery/timer.js" type="text/javascript"></script>
<?php 
	echo $this->scripts;
?>
  <!-- Google Analytics -->


  <!-- End Google Analytics -->
<!-- End Javascripts -->

</head>
<body id="<?php echo substr($_SERVER['PHP_SELF'], 1, -10); ?>">

                   
    <!-- Main Wrapper to Set Site Alignment -->
        <div class="container_<?php echo $layoutSize[0]; ?>"> 
            <!-- Body Content -->
                <!-- Header Content --> <?php  include(SERVER_ROOT . 'includes/header/header.php'); ?>
                <!-- End Body Content -->
                    <?php
                    include($this->layoutLink);
                    
                    /*
                        This region is where the body will be placed based upon which layout is called.
                    
                    */
                    
                    ?>
                <!-- Footer Content -->
                    <?php include(SERVER_ROOT . 'includes/footer/footer.php'); ?>
                <!-- End Footer Content -->
            <!-- End Body Content -->
        </div>
    <!-- End Main Wrapper Div -->

</body>
</html>