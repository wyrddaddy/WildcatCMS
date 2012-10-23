<?php
$displayResult = false;
$triggerBlur = false;
if(isset($_POST['trigger']) == true){
	if($_POST['fname'] != '' && $_POST['lname'] != '' && $_POST['phone'] != '' && $_POST['email'] != ''){	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: LenderTrust Form <'.$_POST['email'].'>' . "\r\n";
		$message = '<html><head><title>' . CONTACT_SUBJECT . '</title></head><body>
		First Name: '.$_POST['fname'].'<br />
		Last Name: '.$_POST['lname'].'<br />
		Phone Number: '.$_POST['phone'].'<br />
		Email: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a><br />
		</body></html>';	
		$to = CONTACT_EMAIL;	
		$subject = CONTACT_SUBJECT;	
		if (mail($to, $subject, $message, $headers)) {
		  $mess = 'form sent email';
		  $displayResult = true;
		 } else {
		 // $mess = 'email failed';
		  $fname = $_POST['fname'];
		  $lname = $_POST['lname'];
		  $phone = $_POST['phone'];
		  $email = $_POST['email'];
		 }	
	}
	else {
		$triggerBlur = true;
		$fname = $_POST['fname'];
		 $lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		if ($_POST['fname'] == ''){
			//$mess .= '* Rew<br />';
		}
		if ($_POST['lname'] == ''){
			//mess .= 'Please enter your email address<br />';
		}
		if ($_POST['phone'] == ''){
			//$mess .= 'Please enter your phone number<br />';
		}
		if ($_POST['email'] == ''){
			//$mess .= 'You didnt tell us what you were interested in<br />';
		}
		//$mess .= '</div><br />';
	}
}
if($displayResult){
?>
<div id="form"> 	
    <h2>Message Sent Successfully</h2>
</div>
<?php }else{
?>
<div id="form"> 
<h2>Quick &amp; Easy Contact Info</h2><?php  echo $mess; ?>
  <form name="emailForm" id="email-form" method="post" action="<?php echo substr($_SERVER['PHP_SELF'], 0, -9); ?>">
  <p>First Name <span id="fname-error" class="form-error">* Required</span><br />
  <input name="fname" type="text" id="fname" class="check-blank" size="24" value="<?php echo $fname; ?>" /></p>
  <p>Last Name <span id="lname-error" class="form-error">* Required</span><br />
  <input name="lname" type="text" id="lname" class="check-blank" size="24" value="<?php echo $lname; ?>" /> </p>
  <p>Daytime Phone Number <span id="phone-input-error" class="form-error">* Required</span><br />
  <input name="phone" type="text" id="phone-input" class="check-blank" size="24" value="<?php echo $phone; ?>" /></p>
  <p>E-mail Address <span id="email-error-invalid" class="form-error">* E-mail Invalid</span><br />
  <input name="email" type="text" class="check-blank" id="email-input" size="31" value="<?php echo $email; ?>" /><br /></p>
  <input type="hidden" name="trigger" value="true"  />
  <p><input type="image" id="send-btn" src="/images/framework/form-send.png" class="buttons" name="submit" value="Contact Me" /><img src="/images/framework/form-lock.png" alt="secure" /></p>
  </form></div>
  <?php }
if($triggerBlur == true){
?>
	<script type="text/javascript">
	    $(document).ready(function(e) {
            $('.check-blank').each(function() {
                $('#' + this.id).trigger('blur');
            });
        });
		
	</script>
<?php }
?>