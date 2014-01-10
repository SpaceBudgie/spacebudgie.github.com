<?php
  require_once('recaptchalib.php');
  $privatekey = "6Le95-sSAAAAAAClVkHedSKpSydND6AS-y1zzJ2G";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification
	       // from the form
       $name = trim(strip_tags($_POST['name']));
       $email = trim(strip_tags($_POST['email']));
	   $subject = trim(strip_tags($_POST['subject']));
       $message= htmlentities($_POST['message']);
	   $body = "<b>Message</b><br><br>".$message."<br>".PHP_EOL;
	   $subjectedit = $name.": ".$subject;
       $to = 't4tsum4ru@gmail.com';

       $headers = "From: $email\r\n";
       $headers .= "Content-type: text/html\r\n";


       mail($to, $subjectedit, $body, $headers);

       // redirect afterwords, if needed
       header('Location: http://www.spacebudgie.com/messagesuccess.html');
	   	   echo "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
  }

?>