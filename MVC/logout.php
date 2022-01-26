<?php

//cookies are deleted
setcookie('login', '', time() -3600);
setcookie('admin', '', time() -3600);
header('Location: home.php');
exit();

?>