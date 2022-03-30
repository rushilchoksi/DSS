<?php
require('dbConfig.php');
date_default_timezone_set("Asia/Kolkata");
session_start();

$formData = array();
parse_str($_POST['form'], $formData);

$validUserFlag = 0;
$notVerifiedUserFlag = 0;
$incorrectDetailsFlag = 0;
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

        if ($clientPasswordHash == $dbPasswordValue)
        {
            if ($rowData["Verified"] == 1)
            {
                $validUserFlag = 1;
                $notVerifiedUserFlag = 0;
                $incorrectDetailsFlag = 0;
                $dbAccessCount = $rowData["accessCount"];
                $timeStamp = date("D d.m.Y h:i:s A");

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

                $sqlFetchUserQuery = $dbConnection->prepare("INSERT INTO `accessLogs` (`userEmail`, `IP`, `countryName`, `regionName`, `cityName`, `ZIP`, `Latitude`, `Longitude`, `ISP`, `Organization`, `TimeStamp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sqlFetchUserQuery->bind_param('sssssssssss', $clientEmail, $userIPAddress, $countryName, $regionName, $cityName, $zipCode, $latitudeValue, $longitudeValue, $ispName, $orgName, $timeStamp);
                $sqlFetchUserQuery->execute();

                $resultantAccessCount = (int)$dbAccessCount + 1;
                $sqlUpdateDataQuery = "UPDATE users SET accessCount = $resultantAccessCount, lastLogin = '$timeStamp' WHERE Email = '$clientEmail'";
                $sqlUpdateDataQueryResult = mysqli_query($dbConnection, $sqlUpdateDataQuery);

                $_SESSION["AUTH"] = true;
                $_SESSION["USER_NAME"] = $rowData["Name"];
                $_SESSION["USER_EMAIL"] = $rowData["Email"];
                $_SESSION["USER_ROLE"] = $rowData["Privileges"];
                $_SESSION["USER_DIRECTORY"] = $rowData["Directory"];
            }
            else
            {
                $validUserFlag = 0;
                $notVerifiedUserFlag = 1;
                $incorrectDetailsFlag = 0;
            }
        }
        else
        {
            $validUserFlag = 0;
            $notVerifiedUserFlag = 0;
            $incorrectDetailsFlag = 1;
        }
    }
}
else
    $validUserFlag = 0;

if ($validUserFlag == 1)
    echo true;
else if ($incorrectDetailsFlag == 1)
    echo "Invalid username or password, please try again!";
else if ($notVerifiedUserFlag == 1)
    echo "Your account has not been activated yet, please try again in a while!";
else
    echo "Something went wrong, please try again!";
