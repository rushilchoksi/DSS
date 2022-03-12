<?php
require('dbConfig.php');
date_default_timezone_set("Asia/Kolkata");
session_start();

$formData = array();
parse_str($_POST['form'], $formData);

$validUserFlag = 0;
$clientEmail = $formData["email"];
$clientPassword = $formData["password"];

$sqlFetchUserQuery = $dbConnection->prepare("SELECT * FROM users WHERE Email = ?");
$sqlFetchUserQuery->bind_param('s', $clientEmail);
$sqlFetchUserQuery->execute();

$sqlResult = $sqlFetchUserQuery->get_result();
$rowCount = mysqli_num_rows($sqlResult);
if ($rowCount > 0)
{
    while ($rowData = $sqlResult->fetch_assoc())
    {
        $dbSaltValue = $rowData["saltValue"];
        $dbPasswordValue = $rowData["Password"];
        $clientPasswordHash = hash_pbkdf2("sha512", $clientPassword, $dbSaltValue, 1000, 64);

        $clientPasswordHashSplit = str_split($clientPasswordHash, 32);
        $dbPasswordHashSplit = str_split($dbPasswordValue, 32);

        if ($clientPasswordHash == $dbPasswordValue)
        {
            $validUserFlag = 1;
            $dbAccessCount = $rowData["accessCount"];
            $timeStamp = date("D d.m.Y h:i:s A");

            $resultantAccessCount = (int)$dbAccessCount + 1;
            $sqlUpdateDataQuery = "UPDATE users SET accessCount = $resultantAccessCount, lastLogin = '$timeStamp' WHERE Email = '$clientEmail'";
            $sqlUpdateDataQueryResult = mysqli_query($dbConnection, $sqlUpdateDataQuery);

            $_SESSION["AUTH"] = true;
            $_SESSION["USER_NAME"] = $rowData["Name"];
            $_SESSION["USER_EMAIL"] = $rowData["Email"];
        }
    }
}
else
    $validUserFlag = 0;

if ($validUserFlag == 1)
    echo true;
else
    echo false;
