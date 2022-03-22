<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require('dbConfig.php');
if (isset($_SESSION["AUTH"]))
{
    if ($_SESSION["AUTH"] != true)
        header('Location: login');
}
else
    header('Location: login');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

$otpPlainData = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION['OTP_PLAIN_DATA'] = $otpPlainData;
$cipherText = openssl_encrypt($otpPlainData, 'DES-EDE3', 'Rushil', OPENSSL_RAW_DATA);
$cipherText = base64_encode($cipherText);

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->IsHTML(true);
$mail->Username = 'rushilnchoksi@gmail.com';
$mail->Password = 'uLLmW;$3)wpGNf\EH*';
$mail->From = 'rushilnchoksi@gmail.com';
$mail->FromName = $PROJECT_NAME;
$mail->Subject = '[' . $PROJECT_NAME . '] - Resource Request Access (' . $_SESSION['FILE_NAME'] . ')';
$mail->Body = 'Hello ' . $_SESSION["USER_NAME"] . '<br><br>Someone requested access to ' . $_SESSION['FILE_NAME'] . ' from ' . $_SESSION["USER_EMAIL"] . '\'s account, if you recognize this action, below is the OTP to access the same, if not, immediately report it to <a href="mailto:security@secureftp.com">security@secureftp.com</a><br><br>OTP: ' . $cipherText . '<br><br>~ Regards,<br>Security team @ ' . $PROJECT_NAME;
$mail->AddAddress($_SESSION["USER_EMAIL"], $_SESSION["USER_NAME"]);
$mail->Send();
?>
