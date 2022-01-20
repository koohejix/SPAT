<?php

class MenuData {

    protected $_id, $_name, $_price, $_category, $_picture;

    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_name = $dbRow['name'];
        $this->_price = $dbRow['price'];
        $this->_category = $dbRow['category'];
        $this->_picture = $dbRow['picture'];
    }

    public function getID() {
        return $this->_id;
    }

    public function getName() {
        return $this->_name;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function getCategory() {
        return $this->_category;
    }

    public function getPicture() {
        return $this->_picture;
    }
}
