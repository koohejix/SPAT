<?php

require_once("Models/UserFunctions.php");
$userData = new userFunctions();

if (isset($_POST['register-submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $password2 = $_POST['confirm-password'];
    if ($password == $password2){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $firstname = htmlspecialchars($_POST['fname']);
        $lastname = htmlspecialchars($_POST['lname']);
        $exists = $userData->addUser($email,$hash,$firstname,$lastname);
        if ($exists == False){
            header('Location: login.php');
        }else{
            header('Location: register.php?error=Email in Use');
        }
    }else{
        header('Location: register.php?error=Passwords Do Not Match');
    }
}

require("Views/register.phtml");
