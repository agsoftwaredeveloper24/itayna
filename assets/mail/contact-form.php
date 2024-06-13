<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$conName = $_POST['conName'];
$conEmail = $_POST['conEmail'];
$conMessage = $_POST['conMessage'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['conName'];
  $email = $_POST['conEmail'];
  $message = $_POST['conMessage'];


  function mailing($name, $email, $message)
  {

    
    $mail = new PHPMailer();

    // Set the SMTP server details
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'agsoftware24@hotmail.com';
    $mail->Password = 'talha12345';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the sender and recipient
    $mail->setFrom('agsoftware24@hotmail.com', 'Support');
    // $mail->addAddress('support@atfinternational.com', 'Support');
    $mail->addAddress('agsoftwaredeveloper24@gmail.com', 'Support');


    // Set email subject and body

    $htmlBody = "
  <!DOCTYPE html>
  <html>
  <head>
      <style>
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }
      th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
      </style>
  </head>
  <body>
      <h2>User Feedback</h2>
      <table>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>Client Name</td>
        <td>$name</td>
      </tr>
      <tr>
        <td>Client Email</td>
        <td>$email</td>
      </tr>
    
      <tr>
        <td>Message</td>
        <td>$message</td>
      </tr>
    
      </table>
  </body>
  </html>
  ";
    $mail->Subject = "Message From ITAYNA";
    $mail->Body = $htmlBody;
    $mail->isHTML(true);

    try {
      $mail->send();
      // echo 'Email sent successfully';
      return true;
    } catch (Exception $e) {
      // echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
      return false;
    }
  }

  if (mailing($name, $email, $message)) {
    echo "Y";
  } else {
    echo "N";
  }
}
