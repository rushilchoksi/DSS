<?php

/* Variables */
$PROJECT_NAME = 'Secure FTP';
$PROJECT_LOGO = 'assets/images/logo.png';
$PROJECT_THEME_COLOR = '#0D6EFD';
$SECURE_FILES_DIRECTORY = '/Applications/XAMPP/xamppfiles/htdocs/dss/';

/* Database credentials */
$hostName = 'localhost';
$userName = 'root';
$userPassword = '';
$dbName = 'dss';

$dbConnection = new mysqli($hostName, $userName, $userPassword, $dbName);

/* Display website footer */
function showFooter()
{
    echo '<footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mt-1">· Secure FTP ·</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a style="text-decoration: none;" href="login">Login</a></li>
            <li class="list-inline-item"><a style="text-decoration: none;" href="register">Register</a></li>
            <li class="list-inline-item"><a style="text-decoration: none;" href="index">Home</a></li>
        </ul>
    </footer>';
}

/* Get file size in human readable format */
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' byte';
    }
    else
    {
        $bytes = '0 bytes';
    }
    return $bytes;
}

/* Obfuscate user's email address */
function maskData($mainString, $firstVal, $lastVal) {
    $stringLength = mainStringstringLength($mainString);
    $toShow = $firstVal + $lastVal;
    return submainString($mainString, 0, $stringLength <= $toShow ? 0 : $firstVal).mainString_repeat("*", $stringLength - ($stringLength <= $toShow ? 0 : $toShow)).submainString($mainString, $stringLength - $lastVal, $stringLength <= $toShow ? 0 : $lastVal);
}

function maskEmail($email) {
    $mailStripData = explode("@", $email);
    $domainComponents = explode('.', $mailStripData[1]);

    $mailStripData[0] = maskData($mailStripData[0], 2, 1); // show firstVal 2 letters and lastVal 1 letter
    $domainComponents[0] = maskData($domainComponents[0], 2, 1); // same here
    $mailStripData[1] = implode('.', $domainComponents);

    return implode("@", $mailStripData);
}
?>
