<?php

require_once ('Database.php');
require_once ("OrdersData.php");
require_once ("OrdersItemsFunctions.php");

class OrdersFunctions
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function updateOrderStatus($id, $status) {
        $sqlQuery = "UPDATE orders
        SET status = '$status'
        WHERE id='$id';";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
    }

    public function fetchOrders($id) {
        $sqlQuery = "SELECT * FROM orders WHERE customerid = '$id'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }

    public function fetchActiveOrders($id) {
        $sqlQuery = "SELECT * FROM orders WHERE (customerid = '$id') AND (status = 'accepted' OR status = 'pending')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }


    public function fetchPastOrders($id) {
        $sqlQuery = "SELECT * FROM orders WHERE (customerid = '$id') AND (status = 'successful' OR status = 'canceled')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }

    public function addNewOrder($cid, $addressid, $total, $cartData) {

        $date = date("Y-m-d H:i:s");

        $sqlQuery ="INSERT INTO orders (customerid, addressid, total, status, date) VALUES ('$cid', '$addressid', '$total', 'pending', '$date')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        if($statement->execute()) {
            echo "Success 1";
        }
        else {
            echo "Error 1";
        }
        $orderId = $this->_dbHandle->lastInsertId();
        $orderItems = new OrdersItemsFunctions();
        $orderItems->addOrderItems($cartData, $orderId);
    }

    public function fetchAllPending() {

        $sqlQuery = "SELECT * FROM orders WHERE status = 'pending'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }

    public function fetchAllAccepted() {

        $sqlQuery = "SELECT * FROM orders WHERE status = 'accepted'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }

    public function fetchAllSuccessful() {

        $sqlQuery = "SELECT * FROM orders WHERE status = 'successful'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersData($row);
        }
        return $dataSet;
    }
}