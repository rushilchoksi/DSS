<?php
session_start();
require('dbConfig.php');
if (isset($_SESSION["AUTH"]))
{
    if ($_SESSION["AUTH"] != true)
        header('Location: login');
}
else
    header('Location: login');
echo "Welcome " . $_SESSION['USER_NAME'];
?>
