<?php

class AddressData {

    protected $_id, $_customerid, $_name, $_type, $_area, $_block, $_street,
        $_building, $_floor, $_apartment, $_phone, $_additionaldetails;


    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_customerid = $dbRow['customerid'];
        $this->_name = $dbRow['name'];
        $this->_type = $dbRow['type'];
        $this->_area = $dbRow['area'];
        $this->_block = $dbRow['block'];
        $this->_street = $dbRow['street'];
        $this->_building = $dbRow['building'];
        $this->_floor = $dbRow['floor'];
        $this->_apartment = $dbRow['apartment'];
        $this->_phone = $dbRow['phone'];
        $this->_additionaldetails = $dbRow['additionaldetails'];
    }

    public function getID() {
        return $this->_id;
    }

    public function getCustomerID() {
        return $this->_customerid;
    }

    public function getName() {
        return $this->_name;
    }

    public function getType() {
        return $this->_type;
    }

    public function getArea() {
        return $this->_area;
    }

    public function getBlock() {
        return $this->_block;
    }

    public function getStreet() {
        return $this->_street;
    }

    public function getBuilding() {
        return $this->_building;
    }

    public function getFloor() {
        return $this->_floor;
    }

    public function getApartment() {
        return $this->_apartment;
    }

    public function getPhone() {
        return $this->_phone;
    }

    public function getAdditional() {
        return $this->_additionaldetails;
    }
}
