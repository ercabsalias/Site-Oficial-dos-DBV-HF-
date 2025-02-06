<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ercabsalias@gmail.com';

  // Check if the PHP Email Form library exists
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Optional SMTP configuration (use if you need to use SMTP)
 
  // $contact->smtp = array(
  //   'host' => 'smtp.gmail.com',
  //   'username' => 'seuemail@gmail.com', // Replace with your email address
  //   'password' => 'suasenha', // Replace with your email password or app-specific password
  //   'port' => '587'
  // );


  // Add form messages to the email
  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  // Send the email and provide a response to the user
  $result = $contact->send();
  
  if ($result) {
    echo "Sua mensagem foi enviada com sucesso!";
  } else {
    echo "Houve um erro ao enviar a mensagem. Por favor, tente novamente.";
  }
?>
