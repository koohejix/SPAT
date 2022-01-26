<?php
require_once ("OrdersData.php");
require_once ("MenuFunctions.php");

class OrdersItemsData
{

    protected $_id, $_orderid, $_productid, $_quantity, $_total;

    public function __construct($dbRow)
    {
        $this->_id = $dbRow['id'];
        $this->_orderid = $dbRow['orderid'];
        $this->_productid = $dbRow['productid'];
        $this->_quantity = $dbRow['quantity'];
        $this->_total = $dbRow['total'];
    }

    public function getID()
    {
        return $this->_id;
    }

    public function getOrderID()
    {
        return $this->_orderid;
    }

    public function getProductID()
    {
        return $this->_productid;
    }

    public function getQuantity()
    {
        return $this->_quantity;
    }

    public function getTotal()
    {
        return $this->_total;
    }

    public function getItemName()
    {
        $menuDataSet = new MenuFunctions();
        $menuData = $menuDataSet->fetchItem($this->_productid);
        
        return $menuData->getName();
        
    }
}
