<div id="header" class="grid_16">
	<div id="logo"><img src="/images/framework/header-icons/title-loan-logo.jpg" align="Welcome to Title Loan America" /></div>
    <!-- Header Content that contains Phone Number and CTA -->
	<div id="header-contact" class="blue">
    	<span id="call-us-now">
        	Call Us Now! Hablo espa&ntilde;ol
        </span>
        <div id="contact-cta">
        <!-- Email Icon and Text -->
        	<div id="header-email"><img src="/images/framework/header-icons/email-icon.png" align="Email Us Icon" align="left" /> <span class="header-img-align"><a href="mailto:<?php echo MAILTO; ?>">Contact Us</a></span>
            </div>
         <!-- Phone Icon and Text -->
            <div id="header-phone"><img src="/images/framework/header-icons/phone-icon.png" align="Call Us Icon" align="left" /> <span class="header-img-align"><?php echo PRIMARY_NUMBER; ?></span>
            </div>
        </div>
    </div>
    <!-- Primary Navigation -->
    <div id="primary-nav">
    	<a href="/" id="nav-home">Home</a>
        <a href="/about-us/" id="nav-about">About Us</a>
        <a href="/our-process/" id="nav-process">Our Process</a>
        <a href="/security/" id="nav-security">Security</a>
        <a href="/application/" id="nav-application">Application</a>
        <a href="/faq/" id="nav-faq">FAQ's</a>
        <a href="/contact/" id="nav-contact">Contacts</a>
    </div>
    <!-- Page heading and login below Primary Navigation -->
    <div id="page-heading"><h1><?php echo $this->_config['name']; ?></h1></div>
    <div id="user-login">
    	<?php include(SERVER_ROOT . 'includes/views/forms/simple-login.php'); ?>
    </div>
    <?php include(SERVER_ROOT . 'includes/views/forgot-password-modal.php'); ?>
</div>
