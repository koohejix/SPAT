<?php

class UserData {

    protected $_id, $_email, $_password, $_first_name, $_last_name;

    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_email = $dbRow['email'];
        $this->_password = $dbRow['password'];
        $this->_first_name = $dbRow['first_name'];
        $this->_last_name = $dbRow['last_name'];
    }

    public function getID() {
        return $this->_id;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getFirstName() {
        return $this->_first_name;
    }

    public function getLastName() {
        return $this->_last_name;
    }
}
