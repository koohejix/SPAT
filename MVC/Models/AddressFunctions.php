<?php

require_once ('Database.php');
require_once ("AddressData.php");

class AddressFunctions
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAddresses($cid) {
        $sqlQuery = "SELECT * FROM addresses WHERE customerid = '$cid'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AddressData($row);
        }
        return $dataSet;
    }

    public function fetchAddress($id) {

        $sqlQuery = "SELECT * FROM addresses WHERE id = '$id'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $row = $statement->fetch();
        return new AddressData($row);

    }

    public function addAddress($customerid, $name, $type, $area, $block, $street, $building, $floor,
                               $apartment, $phone, $additional) {

            $sqlQuery = "INSERT INTO addresses (customerid, name, type, area, block, street, 
                                                building, floor, apartment, phone, additionaldetails) 
                        VALUES ('$customerid', '$name', '$type', '$area', '$block', '$street',
                                    '$building', '$floor', '$apartment', '$phone', '$additional')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()) {
            return "Success";
        }
        else {
            return "An error has occured.";
        }
    }
}