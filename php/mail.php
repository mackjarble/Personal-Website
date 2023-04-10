<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Set the recipient email address
  $to = 'mackjarble@gmail.com';

  // Set the subject of the email
  $subject = 'New message from ' . $name;

  // Set the message body
  $body = 'Name: ' . $name . "\n";
  $body .= 'Email: ' . $email . "\n";
  $body .= 'Message: ' . $message . "\n";

  // Send the email
  $result = mail($to, $subject, $body);

  if ($result) {
    echo "Email sent successfully";
  } else {
    $error = error_get_last();
    $error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
    echo "Email sending failed: $error_message";
  }
}
?>
