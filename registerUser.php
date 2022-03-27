<?php
require('dbConfig.php');

$formData = array();
parse_str($_POST['form'], $formData);

$clientName = $formData["firstName"] . " " . $formData["lastName"];
$clientEmail = $formData["email"];
$saltValue = bin2hex(openssl_random_pseudo_bytes(16));
$hashedPassword = hash_pbkdf2("sha512", $formData["password"], $saltValue, 1000, 64);
$sqlQuery = "INSERT INTO users (Name, Email, Password, saltValue, Privileges) VALUES ('$clientName', '$clientEmail', '$hashedPassword', '$saltValue', 'CLIENT')";
$userInsertionResult =  mysqli_query($dbConnection, $sqlQuery);
echo "Account registered successfully for $clientName linked to $clientEmail, we will drop an alert on the same once your account is authorized by the administrator, thank you!";
?>
