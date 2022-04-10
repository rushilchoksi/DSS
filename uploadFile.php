<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
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

$fileName = $_FILES["fileData"]["name"];

if ($_POST["targetDir"] == ".")
    $targetDir = $SECURE_FILES_DIRECTORY . basename($fileName);
else
    $targetDir = $SECURE_FILES_DIRECTORY . $_POST["targetDir"] . "/" . basename($fileName);

move_uploaded_file($_FILES["fileData"]["tmp_name"], $targetDir);
echo "<script>alert('Your file: $fileName has been uploaded successfully!'); window.location.href='index'</script>";
?>
