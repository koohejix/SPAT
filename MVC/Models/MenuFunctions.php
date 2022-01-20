<?php

require_once ('Database.php');
require_once ("MenuData.php");

class MenuFunctions {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchItem($id) {
        $sqlQuery = "SELECT * FROM menu WHERE id = '$id'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MenuData($row);
        }
        return $dataSet;
    }

    public function fetchSalads() {
        $sqlQuery = "SELECT * FROM menu WHERE category = 'Salads'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MenuData($row);
        }
        return $dataSet;
    }

    public function fetchStarters() {
        $sqlQuery = "SELECT * FROM menu WHERE category = 'Starters'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MenuData($row);
        }
        return $dataSet;
    }

    public function fetchSushi() {
        $sqlQuery = "SELECT * FROM menu WHERE category = 'Sushi'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MenuData($row);
        }
        return $dataSet;
    }

}