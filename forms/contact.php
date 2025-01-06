<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'surajsingh96240@gmail.com'; // Your SMTP username
    $mail->Password = 'zuuemsmrosmhgxie';          // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $mail->setFrom($email, $name);                    // Email from the sender
    $mail->addAddress('kapadisuresh1019@gmail.com');  // Recipient email

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<p><strong>Name:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Message:</strong> $message</p>";
    $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$message";

    $mail->send();
    echo '<script>alert("Message sent successfully!");</script>';
  } catch (Exception $e) {
    echo '<script>alert("Message could not be sent. Error: ' . $mail->ErrorInfo . '");</script>';
  }
}
