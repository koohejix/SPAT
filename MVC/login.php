<?php

require_once ("MVC/Models/Login.php");
require_once ("MVC/Models/UserFunctions.php");

$userDataSet = new Login();

if (isset($_POST['loginbtn'])){
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    //check username and password against database
    $exists = $userDataSet->userCheck($email,$password);
    if ($exists == True){
        header('Location: index.php');
    }else{
        header('Location: login.php?error=Incorrect User name or password');
    }
}

if(isset($_GET['register'])) {
    header('Location: register.php');
}

require("Views/login.phtml");