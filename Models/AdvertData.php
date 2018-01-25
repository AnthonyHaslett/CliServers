<?php

class AdvertData {

    protected $_advertId, $_title, $_price, $_description, $_photoName, $_color ,$_FK_userID;

    public function __construct($dbRow) {
        $this->_advertId = $dbRow['advertId'];
        $this->_title = $dbRow['title'];
        $this->_price = $dbRow['price'];
        $this->_description = $dbRow['description'];
        $this->_photoName = $dbRow['photo_name'];
        $this->_color = $dbRow['color'];
        $this->_FK_userID = $dbRow['FK_userId'];
    }

    public function getAdvertID() {
        return $this->_advertId;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getPhotoName() {
        return $this->_photoName;
    }

    public function getColor() {
        return $this->_color;
    }

    public function getFK_userID() {
        return $this->_FK_userID;
    }
}