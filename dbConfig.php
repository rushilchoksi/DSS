<?php

/* Variables */
$PROJECT_NAME = 'Secure FTP';

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
?>
