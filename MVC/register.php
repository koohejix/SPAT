<?php

require_once("MVC/Models/UserFunctions.php");
$userData = new userFunctions();

if (isset($_POST['registerbtn'])){
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $password2 = $_POST['password_check'];
    if ($password == $password2){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $exists = $userData->addUser($email,$hash,$firstname,$lastname);
        if ($exists == False){
            header('Location: index.php');
        }else{
            header('Location: register.php?error=Email in Use');
        }
    }else{
        header('Location: register.php?error= Passwords Do Not Match');
    }

}
if (isset($_POST['guestbtn'])) {
    header('Location:guest.php');
}

if(isset($_GET['login'])) {
    header('Location: login.php');
}

require("Views/register.phtml");
