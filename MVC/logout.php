<?php
//here session is unset and all remaining cookies are deleted
session_start();
unset($_SESSION['userID']);
setcookie('userID', '', time() -3600);
setcookie('reDir', '', time() -3600);
setcookie('error', '', time() -3600);
setcookie('data', '', time() -3600);
setcookie('rule', '', time() -3600);
header('Location: login.php');
exit();
