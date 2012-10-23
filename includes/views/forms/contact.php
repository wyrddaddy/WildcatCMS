<?php
if(isset($_POST['trigger']) == true){
	if($_POST['name'] != '' && $_POST['email'] != '' && $_POST['txtphone'] != '' && $_POST['comments'] != ''){	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Webserver <'.$_POST['email'].'>' . "\r\n";
		
		$message = '<html><head><title>' . CONTACT_SUBJECT . '</title></head><body>
		Name: '.$_POST['name'].'<br />
		Phone Number: '.$_POST['txtphone'].'<br />
		Contact Me by: '.$_POST['phone'].' '.$_POST['emailme'].'<br />
		Email: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a><br /><br />
		Message: '.$_POST['comments'].'<br />
		</body></html>';	
		$to = CONTACT_EMAIL;	
		$subject = CONTACT_SUBJECT;	
		if (mail($to, $subject, $message, $headers)) {
		  $mess = '<div style="background-color:green; font-size: 16pt;" >Message successfully sent!<img src="/images/a/animated_e-mail21.gif" align="right" /></div><br />';
		 } else {
		  $mess = '<div style="background-color: #ff0000;; font-size: 16pt;" >Message delivery failed...</div><br />';
		  $name = $_POST['name'];
		  $phone = $_POST['txtphone'];
		  $email = $_POST['email'];
		  $comments = $_POST['comments'];
		 }	
	}
	else {
		$mess =  '<div style="background-color: #ff0000;; font-size: 12pt;" >';
		$name = $_POST['name'];
		 $phone = $_POST['txtphone'];
		$email = $_POST['email'];
		$comments = $_POST['comments'];
		if ($_POST['name'] == ''){
			$mess .= 'Please enter your name<br />';
		}
		if ($_POST['email'] == ''){
			$mess .= 'Please enter your email address<br />';
		}
		if ($_POST['txtphone'] == ''){
			$mess .= 'Please enter your phone number<br />';
		}
		if ($_POST['comments'] == ''){
			$mess .= 'You didnt tell us what you were interested in<br />';
		}
		$mess .= '</div><br />';
	}
}
?>
<?php echo $mess; ?>
<h1>Contact Us</h1>
<p>To contact us please fill out the form below and we will get back to you as soon as possible</p>
  <form name="generalMail" id="generalMail" method="post" action="/contact/">
  <input type="hidden" name="trigger" value="true"  />
  <table cellpadding="0" width="779px" cellspacing="0">
  <tr>
  <td width="221" class="rightjust">Name:</td>
  <td width="556"><input name="name" type="text" id="name" value="<?php echo $name; ?>" /></td>
  </tr>
  <tr>
  <td class="rightjust">Phone Number:</td><td><input type="text" name="txtphone" maxlength="13" onclick="javascript:getIt(this)" value="<?php echo $phone; ?>" /></td>
  </tr>
  <tr>
  <td class="rightjust">Email Address:</td><td><input name="email" type="text" id="email" value="<?php echo $email; ?>" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
  <td class="rightjust">Preferred Contact Method:</td><td><input name="emailme" type="checkbox" value="email" checked="checked" />
Email&nbsp;&nbsp;&nbsp;<input type="checkbox" value="phone" name="phone" />Phone</td>
  </tr>
  <tr>
  <td colspan="2"><br />
    <br />
    Message:</td>
  </tr>
  <tr>
  <td colspan="2" class="centerjust"><textarea name="comments" cols="60" rows="9" id="comments"><?php echo $comments; ?></textarea></td>
  </tr>
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="2" class="centerjust"><input type="submit" name="submit" value="Send Message" /></td>
  </tr></table></form>