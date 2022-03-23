<?php
unset($_SESSION["AUTH"]);
unset($_SESSION["USER_NAME"]);
unset($_SESSION["USER_EMAIL"]);
unset($_SESSION["USER_ROLE"]);
unset($_SESSION['FILE_NAME']);
unset($_SESSION['VERIFIED']);
session_destroy();
echo "<script>alert('You have been logged out successfully'); window.location.href='login';</script>"
?>