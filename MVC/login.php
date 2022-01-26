<?php
require_once ("Models/Login.php");
require_once ("Models/UserData.php");
require_once ("Models/UserFunctions.php");
require_once('cartcheck.php');

$view = new stdClass();
$view->pageTitle = "Login";

$userDataSet = new Login();

if (isset($_POST['login-submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $exists = $userDataSet->userCheck($email,$password);

    if($email == "admin@sushilicious.com" && $password == "admin123") {
        setcookie("admin", "admin");
        header('Location: admin-menu.php');
    }
    else if ($exists == True){
        $userID = $userDataSet->userLogin($email);
        setcookie("login", "$userID");
        header('Location: home.php');
    }else{
        header('Location: login.php?error=Incorrect User name or password');
    }
}

require("Views/login.phtml");