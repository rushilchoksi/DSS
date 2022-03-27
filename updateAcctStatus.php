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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require('Exception.php');
require('PHPMailer.php');
require('SMTP.php');

$privilegeLevel = $_SESSION["USER_ROLE"];
if ($privilegeLevel != "ADMIN")
{
    echo "<script>alert('You are not authorized to access this page, if you think there is an issue, please contact the administrator.'); window.location.href='index';</script>";
}
else
{
    $userID = $_POST["userID"];
    $sqlFetchUserQuery = $dbConnection->prepare("SELECT * FROM users WHERE ID = ?");
    $sqlFetchUserQuery->bind_param('s', $userID);
    $sqlFetchUserQuery->execute();
    $sqlResult = $sqlFetchUserQuery->get_result();
    while ($rowData = $sqlResult->fetch_assoc())
    {
        $userName = $rowData["Name"];
        $userEmail = $rowData["Email"];
        $verifiedStatus = $rowData["Verified"];
    }

    if ($verifiedStatus == 0)
    {
        $newAcctStatusCode = 1;
        $newAcctStatus = 'activated';
        $updateUserStatusQuery = $dbConnection->prepare("UPDATE users SET Verified = ? WHERE ID = ?");
        $updateUserStatusQuery->bind_param('is', $newAcctStatusCode, $userID);
        $updateUserStatusQuery->execute();
    }
    else
    {
        $newAcctStatusCode = 0;
        $newAcctStatus = 'deactivated';
        $updateUserStatusQuery = $dbConnection->prepare("UPDATE users SET Verified = ? WHERE ID = ?");
        $updateUserStatusQuery->bind_param('is', $newAcctStatusCode, $userID);
        $updateUserStatusQuery->execute();
    }

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
    $mail->Subject = 'Account Status Update (' . $userName . ')';

    if ($newAcctStatus == "activated")
        $mail->Body = 'Hello ' . $userName . '<br><br>An update to your account was made, following is what the update was about, if you do not recognize this action, immediately report it to <a href="mailto:security@secureftp.com">security@secureftp.com</a><br><br>Account Name: ' . $userName . '<br>Account Email: ' . $userEmail . '<br>Current Account Status: <span style="color: #00B300">' . $newAcctStatus . '</span><br><br>~ Regards,<br>Security team @ ' . $PROJECT_NAME;
    else
        $mail->Body = 'Hello ' . $userName . '<br><br>An update to your account was made, following is what the update was about, if you do not recognize this action, immediately report it to <a href="mailto:security@secureftp.com">security@secureftp.com</a><br><br>Account Name: ' . $userName . '<br>Account Email: ' . $userEmail . '<br>Current Account Status: <span style="color: #FF0000">' . $newAcctStatus . '</span><br><br>~ Regards,<br>Security team @ ' . $PROJECT_NAME;
    $mail->AddAddress($userEmail, $userName);
    // $mail->Send();

    echo "<script>alert('$userName\'s account\'s status has been successfully $newAcctStatus, a confirmation for the same has been sent to $userEmail, thank you!'); window.location.href = 'approveRequests'; </script>";
}
?>
