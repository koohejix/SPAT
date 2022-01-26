<?php

require_once ('Database.php');
require_once ("AddressData.php");

class AdminFunctions
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function removeMenuItem($pid) {

        $sqlQuery ="DELETE FROM `menu` WHERE `id` = '$pid'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        if($statement->execute()) {
            return true;
        }
    }

    public function addMenuItem($name, $category, $price, $picture) {

        $sqlQuery ="INSERT INTO menu (name, price, category, picture) VALUES ('$name', '$price', '$category', '$picture')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        if($statement->execute()) {
            return true;
        }
    }

}
