<?php

require_once ('Database.php');
require_once ('UserData.php');

class UserFunctions
{
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
        if (isset($_COOKIE['userID'])){
            $this->userID = $_COOKIE['userID'];
        }
    }

    public function addUser($mail,$pass,$firstname,$lastname) {
        $exists = False;
        $sqlQuery = "SELECT * FROM users WHERE email ='$mail'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $row = $statement->fetch();
        $dataSet = new userData($row);
        $email = $dataSet->getEmail();
        if(!empty($email)) {
            $exists = True;
        }else{
            $sqlQuery2 ="INSERT INTO users (email, password, first_name, last_name) VALUES ('$mail', '$pass', '$firstname', '$lastname')";
            $statement2 = $this->_dbHandle->prepare($sqlQuery2);
            $statement2->execute();

            $sqlQuery3 = "SELECT * FROM users WHERE email ='$mail'";

            $statement3 = $this->_dbHandle->prepare($sqlQuery3); // prepare a PDO statement
            $statement3->execute(); // execute the PDO statement

            $row2 = $statement3->fetch();
            $dataSet2 = new userData($row2);
            $_SESSION['userID'] = $dataSet2->getID();
        }
        return $exists;
    }
    public function appendUser($mail,$pass,$firstname,$lastname) {
        $query = "";
        if (!empty($mail)){
            $sqlQuery = "UPDATE users SET email ='$mail' WHERE id ='$this->userID'";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
        }

        if (!empty($pass)){
            $sqlQuery = "UPDATE users SET password ='$pass' WHERE id ='$this->userID'";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
        }

        if (!empty($lastname)){
            $sqlQuery = "UPDATE users SET last_name ='$lastname' WHERE id ='$this->userID'";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
        }

        if (!empty($firstname)){
            $sqlQuery = "UPDATE users SET first_name ='$firstname' WHERE id ='$this->userID'";

            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            $statement->execute(); // execute the PDO statement
        }

        return "database updated";
    }

    public function getUser(){

        $sqlQuery = "SELECT * FROM users WHERE id = '$this->userID'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $user = $statement->fetch();
        return new userData($user);
    }
}
