<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require('../Exception.php');
require('../PHPMailer.php');
require('../SMTP.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com:465';
$mail->Port = '465';
$mail->Username = '<SENDER_EMAIL_ID';
$mail->Password = '<SENDER_EMAIL_PASSWORD>';
$mail->From = '<SENDER_EMAIL>';
$mail->Subject = '<EMAIL_SUBJECT>';
$mail->Body = '<EMAIL_BODY>';
$mail->AddAddress('<CLIENT_EMAIL>', '<CLIENT_NAME>');
$mail->Send();
?>
