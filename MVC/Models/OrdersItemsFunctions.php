<?php

require_once ('Database.php');
require_once ("OrdersItemsData.php");
require_once ("OrdersFunctions.php");
require_once ("MenuFunctions.php");

class OrdersItemsFunctions
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchOrderItems($id) {
        $sqlQuery = "SELECT * FROM ordersitems WHERE (orderid = '$id')";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new OrdersItemsData($row);
        }
        return $dataSet;
    }

    public function addOrderItems($cartData, $orderId) {


        $menuData = new MenuFunctions();

        foreach($cartData as $p => $q) {

            $price = $menuData->fetchItem($p);
            $total = $price->getPrice() * $q;

            $sqlQuery2 = "INSERT INTO ordersitems (orderid, productid, quantity, total) VALUES ('$orderId', '$p', '$q', '$total')";
            $statement2 = $this->_dbHandle->prepare($sqlQuery2);

            if($statement2->execute()) {
                echo "Success 1";
            }
            else {
                echo "Error 1";
            }
        }
    }
}
