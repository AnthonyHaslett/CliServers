<?php

class AdvertData {

    /*
     * An advert data class to allow the system to retrieve details from
     * the advert data table.
     */

    /*
     Field variables.
     */
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

    /*
     * Set methods
     * */
    /**
     * @param mixed $advertId
     */
    public function setAdvertId($advertId)
    {
        $this->_advertId = $advertId;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @param mixed $photoName
     */
    public function setPhotoName($photoName)
    {
        $this->_photoName = $photoName;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @param mixed $FK_userID
     */
    public function setFKUserID($FK_userID)
    {
        $this->_FK_userID = $FK_userID;
    }

    /*
     * Get methods
     * */
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


//    public function setTitle() {
//        return $this->$_title= _title;
//
//
//    }


}