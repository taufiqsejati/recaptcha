<?php
if(count($_POST)>0){ if(empty($_POST['fname'])){ echo "
<h4>Please Enter your First name</h4>
"; } if(empty($_POST['lname'])){ echo "
<h4>Please Enter your Last name</h4>
"; }if(empty($_POST['g-recaptcha-response'])){ echo "
<h4>Please Solve reCAPTCHA</h4>
"; }if(isset($_POST['g-recaptcha-response'])&& !empty($_POST['g-recaptcha-response'])){
  $secret='6LfapnUqAAAAANoKXrtKJdfodTqaz1ZhoZwm1OFL';
  $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
  $data = json_decode($response);
if ($data ->success) {
  echo "<h2>Data sent";
} else {
  echo "Please Try again";
}


 } } ?>

<!DOCTYPE html>
<html>
  <head>
    <meta />
    <title>Demo of reCaptcha</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <h1>Google reCaptcha Demo</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      First Name<input type="text" name="fname" /><br />
      Last Name<input type="text" name="lname" /><br />
      <div class="g-recaptcha" data-sitekey="6LfapnUqAAAAAG6xcDOk82ngqyfjDQbgQJ_Nvp1R"></div>
      <input type="submit" name="submit" value="Send Data" />
    </form>
  </body>
</html>
