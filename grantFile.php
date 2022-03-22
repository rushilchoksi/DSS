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

if (date("H") < "12")
    $greetingMsg = "Good morning, " . $_SESSION['USER_NAME'];
else if (date("H") >= "12" && (date("H") < "17"))
    $greetingMsg = "Good afternoon, " . $_SESSION['USER_NAME'];
else
    $greetingMsg = "Good evening, " . $_SESSION['USER_NAME'];

$privilegeLevel = $_SESSION["USER_ROLE"];
if ($_SESSION['VERIFIED'] == true)
{
    $fileName = $_SESSION['FILE_NAME'];
    $resourceURL = $SECURE_FILES_DIRECTORY . $fileName;
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($resourceURL) . "\"");
    readfile($resourceURL);
    die();
}
else
    header('Location: index');
?>
