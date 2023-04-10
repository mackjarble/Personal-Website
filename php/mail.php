<?php
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Validate the CSRF token
  if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    echo "Invalid CSRF token";
    exit();
  }

  // Get the form data
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

  // Validate the email address
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
    exit();
  }

  // Set the recipient email address
  $to = 'mackjarble@gmail.com';

  // Set the subject of the email
  $subject = 'New message from ' . $name;

  // Set the message body
  $body = 'Name: ' . $name . "\n";
  $body .= 'Email: ' . $email . "\n";
  $body .= 'Message: ' . $message . "\n";

  // Send the email
  $headers = "From: $email";
  $result = mail($to, $subject, $body, $headers);

  if ($result) {
    echo "Email sent successfully";
  } else {
    $error = error_get_last();
    $error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
    echo "Email sending failed: $error_message";
  }
}
?>