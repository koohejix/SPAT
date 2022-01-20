<?php

require_once ('Database.php');
require_once ('UserData.php');

class Login
{
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function userCheck($mail,$pass) {

        if (!empty($mail)){

            $sqlQuery = "SELECT * FROM users WHERE email ='$mail'";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement

            $row = $statement->fetch();
            $dataSet = new userData($row);

            $email = $dataSet->getEmail();
            $password = $dataSet->getPassword();
            $id = $dataSet->getID();
            //set session id to user id so that the user will stay logged in
            $_SESSION['userID'] = $id;
            setcookie('userID', $id);
            $userExists = False;
            //checks if username exists
            if(!empty($email)) {
                //checks if password exists
                if (password_verify($pass, $password)) {
                    $userExists = True;
                }
            }
            return $userExists;
        }else{
            $userExists = False;
            return $userExists;
        }


    }
}
