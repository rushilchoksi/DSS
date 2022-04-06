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
        $currentDir = $rowData["Directory"];
    }

    $newAcctDir = $_POST['assignDir'];
    $updateUserStatusQuery = $dbConnection->prepare("UPDATE users SET Directory = ? WHERE ID = ?");
    $updateUserStatusQuery->bind_param('ss', $newAcctDir, $userID);
    $updateUserStatusQuery->execute();

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
    $mail->Subject = '[' . $PROJECT_NAME . '] Account Status Update (' . $userName . ')';
    $mail->Body = 'Hello ' . $userName . '<br><br>An update to your account was made, following is what the update was about, if you do not recognize this action, immediately report it to <a href="mailto:security@secureftp.com">security@secureftp.com</a><br><br>Account Name: ' . $userName . '<br>Account Email: ' . $userEmail . '<br>Previous Assigned Directory: ' . $currentDir . '<br>Currently Assigned Directory: ' . $newAcctDir . '<br><br>~ Regards,<br>Security team @ ' . $PROJECT_NAME;
    $mail->AddAddress($userEmail, $userName);
    $mail->Send();

    $userIPAddress = json_decode(file_get_contents("http://httpbin.org/ip"), true)["origin"];
    $geoLocationAPI = json_decode(file_get_contents("http://ip-api.com/json/$userIPAddress"), true);

    $countryName = $geoLocationAPI["country"];
    $regionName = $geoLocationAPI["regionName"];
    $cityName = $geoLocationAPI["city"];
    $zipCode = $geoLocationAPI["zip"];
    $latitudeValue = $geoLocationAPI["lat"];
    $longitudeValue = $geoLocationAPI["lon"];
    $ispName = $geoLocationAPI["isp"];
    $orgName = $geoLocationAPI["org"];

    $adminMail = new PHPMailer;
    $adminMail->CharSet = 'utf-8';
    $adminMail->IsSMTP();
    $adminMail->SMTPDebug = 1;
    $adminMail->SMTPAuth = true;
    $adminMail->SMTPSecure = 'ssl';
    $adminMail->Host = "smtp.gmail.com";
    $adminMail->Port = 465;
    $adminMail->IsHTML(true);
    $adminMail->Username = 'rushilnchoksi@gmail.com';
    $adminMail->Password = 'uLLmW;$3)wpGNf\EH*';
    $adminMail->From = 'rushilnchoksi@gmail.com';
    $adminMail->FromName = $PROJECT_NAME;
    $adminMail->Subject = '[' . $PROJECT_NAME . '] Account Status Update (' . $userName . ')';
    $adminMail->Body = 'Hello there,<br><br>' . $_SESSION['USER_NAME'] . ' made an update to ' . $userName . '\'s account, below is what we know, if you do not recognize this action or have not authorized the same, immediately report it to <a href="mailto:security@secureftp.com">security@secureftp.com</a><br><br>Account Name: ' . $userName . '<br>Account Email: ' . $userEmail . '<br>Previous Assigned Directory: ' . $currentDir . '<br>Currently Assigned Directory: ' . $newAcctDir . '<br>Moderator\'s Name: ' . $_SESSION['USER_NAME'] . '<br>Moderator\'s IP: ' . $userIPAddress . '<br>Country: ' . $countryName . '<br>Region: ' . $regionName . '<br>City: ' . $cityName . '<br>ZIP: ' . $zipCode . '<br>Latitude: ' . $latitudeValue . '<br>Longitude: ' . $longitudeValue . '<br>ISP: ' . $ispName . '<br><br>~ Regards,<br>Security team @ ' . $PROJECT_NAME;

    $sqlFetchAccessLogsQuery = "SELECT * FROM `users` WHERE Privileges = 'ADMIN'";
    if ($sqlFetchResult = mysqli_query($dbConnection, $sqlFetchAccessLogsQuery))
    {
        while ($accessLogData = mysqli_fetch_array($sqlFetchResult))
            $adminMail->AddAddress($accessLogData["Email"], $accessLogData["Name"]);
    }
    $adminMail->Send();

    echo "<script>alert('$userName\'s account\'s privleges have been updated successfully, a confirmation for the same has been sent to $userEmail, thank you!'); window.location.href = 'modifyAccess'; </script>";
}
?>
