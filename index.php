<?php
session_start();
require('dbConfig.php');
if (isset($_SESSION["AUTH"]))
{
    if ($_SESSION["AUTH"] != true)
        header('Location: login.php');
}
else
    header('Location: login.php');
echo "Welcome " . $_SESSION['USER_NAME'];
?>
