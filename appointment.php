<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$name   = htmlspecialchars($_POST['name']);
$mobile = htmlspecialchars($_POST['mobile']);
$email  = htmlspecialchars($_POST['email']);
$date   = htmlspecialchars($_POST['date']);

$mail = new PHPMailer(true);

try {

    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yourgmail@gmail.com';
    $mail->Password   = 'YOUR_APP_PASSWORD';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('yourgmail@gmail.com', 'Dr Raja Website');
    $mail->addAddress('clinic@gmail.com');   // Where you receive leads

    $mail->isHTML(true);
    $mail->Subject = 'New Appointment Request';

    $mail->Body = "
    <h2>New Appointment Request</h2>

    <table cellpadding='8'>
        <tr>
            <td><b>Name</b></td>
            <td>$name</td>
        </tr>

        <tr>
            <td><b>Mobile</b></td>
            <td>$mobile</td>
        </tr>

        <tr>
            <td><b>Email</b></td>
            <td>$email</td>
        </tr>

        <tr>
            <td><b>Preferred Date</b></td>
            <td>$date</td>
        </tr>
    </table>
    ";

    $mail->send();

$mail->send();

echo "success";
exit();

} catch (Exception $e) {

    echo "Failed to send email.";
exit();. $mail->ErrorInfo;

}