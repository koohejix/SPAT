<?php

class OrdersData
{

    protected $_id, $_customerid, $_addressid, $_total, $_status, $_date;

    public function __construct($dbRow)
    {
        $this->_id = $dbRow['id'];
        $this->_customerid = $dbRow['customerid'];
        $this->_addressid = $dbRow['addressid'];
        $this->_total = $dbRow['total'];
        $this->_status = $dbRow['status'];
    }

    public function getID()
    {
        return $this->_id;
    }

    public function getCustomerID()
    {
        return $this->_customerid;
    }

    public function getAddressID()
    {
        return $this->_addressid;
    }

    public function getTotal()
    {
        return $this->_total;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function getDate()
    {
        $date = date('d/m/y H:i:s', $this->_date);
        return $date;
    }
}

