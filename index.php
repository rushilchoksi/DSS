<?php
session_start();
require('dbConfig.php');
echo "Welcome " . $_SESSION['USER_NAME'];
?>
