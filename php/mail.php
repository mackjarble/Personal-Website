<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Set the recipient email address
  $to = 'your-email@example.com';

  // Set the subject of the email
  $subject = 'New message from ' . $name;

  // Set the message body
  $body = 'Name: ' . $name . "\n";
  $body .= 'Email: ' . $email . "\n";
  $body .= 'Message: ' . $message . "\n";

  // Send the email
  mail($to, $subject, $body);
}
?>
