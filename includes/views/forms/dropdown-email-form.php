<?php
if(isset($_POST['trigger']) == true){
	if($_POST['name'] != '' && $_POST['email'] != '' && $_POST['body'] != ''){	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Webserver <'.$_POST['email'].'>' . "\r\n";
		
		$message = '<html><head><title>' . CONTACT_SUBJECT . '</title></head><body>
		Name: '.$_POST['name'].'<br />
		Phone Number: '.$_POST['phone'].'<br />
		Contact Me by: '.$_POST['contact'].'<br />
		Email: <a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a><br /><br />
		Message: '.$_POST['body'].'<br />
		</body></html>';	
		$to = CONTACT_EMAIL;	
		$subject = CONTACT_SUBJECT;	
		if (mail($to, $subject, $message, $headers)) {
		  $mess = '<div class="form-sucess" ><h3>Message successfully sent!</h3></div><br />';
		 } else {
		  $mess = '<div class="form-error" ><h3>Message delivery failed...</h3></div>';
		  $name = $_POST['name'];
		  $phone = $_POST['phone'];
		  $email = $_POST['email'];
		  $comments = $_POST['body'];
		 }	
	}
	else {
		$mess =  '<div class="form-error" ><h3>Errors:</h3>';
		$name = $_POST['name'];
		 $phone = $_POST['phone'];
		$email = $_POST['email'];
		$comments = $_POST['body'];
		if ($_POST['name'] == ''){
			$mess .= 'Please enter your name<br />';
		}
		if ($_POST['email'] == ''){
			$mess .= 'Please enter your email address<br />';
		}
		if ($_POST['body'] == ''){
			$mess .= 'You didn\'t type a message<br />';
		}
		$mess .= '</div><script type="text/javascript">openForm();</script>';
	}
}
?>
<?php echo $mess; ?>
<script type="text/javascript" src="/js/ui/forms/meiomask.js" charset="utf-8"></script>
<h2>Contact Us</h2>
<form action="/contact/?emailsubmit=1" method="post">
<table>
    <tr>
    	<td>Name:</td><td><input type="text" name="name" /></td>
    </tr>
    <tr>    
    	<td>Email:</td><td><input type="text" name="email" id="email-input" /> <span class="form-error-inline" id="email-error">*e-mail invalid</td>
    </tr>
    <tr>  
    	<td>Phone:</td><td><input type="text" name="phone" id="phone-input" /></td>
     </tr>
    <tr class="taller">    
    	<td>Please</td><td> <select name="contact">
        						<option value="email" selected="selected" >email</option>
                                <option value="email">call</option>
                            </select> me back.</td>
     </tr>
    <tr>    
    	<td>Subject</td><td><input type="text" name="subject" style="width: 300px;" /></td>
    </tr>
    <tr>     
        <td>Body:</td><td><textarea name="body" style="width: 480px; height: 144px;"></textarea><input type="hidden" name="trigger" value="true"  /></td>
    </tr>
    <tr>     
        <td>&nbsp;</td><td>
  <input type="image" src="/images/framework/form-send.png" class="buttons" name="submit" value="Send Email" /><img src="/images/framework/form-close.png" id="cancel-email" alt="Cancel and Close Form" /></td>
    </tr>
</table>

</form>