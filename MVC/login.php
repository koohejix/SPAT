<?php
require_once ("Models/Login.php");
require_once ("Models/UserData.php");
require_once ("Models/UserFunctions.php");

$view = new stdClass();
$view->pageTitle = "Login";

$userDataSet = new Login();

if (isset($_POST['login-submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    //check username and password against database
    $exists = $userDataSet->userCheck($email,$password);
    if ($exists == True){
        $userID = $userDataSet->userLogin($email);
        setcookie("login", "$userID");
        header('Location: home.php');
    }else{
        header('Location: login.php?error=Incorrect User name or password');
    }
}

require("Views/login.phtml");