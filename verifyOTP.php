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

$formData = array();
parse_str($_POST['form'], $formData);

$privilegeLevel = $_SESSION["USER_ROLE"];
$userOTP = $formData["userOTPValue"];

$plainText = base64_decode($userOTP);
$finalPT = openssl_decrypt($plainText, 'DES-EDE3', 'Rushil', OPENSSL_RAW_DATA);

if ($finalPT == $_SESSION['OTP_PLAIN_DATA'])
{
    $_SESSION['VERIFIED'] = true;
    echo true;
}
else
{
    $_SESSION['VERIFIED'] = false;
    echo false;
}
?>
