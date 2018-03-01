<?php

class WishlistData {

    //Keys
    protected $_wishlistId, $_fk_userId, $_fk_advertId;

    //Adverts
    protected $_title, $_photo_name, $_description, $_price ;

    //Users
    protected $_username, $_email, $_mobileNo;

    public function __construct($dbRow) {
        //Keys
        $this->_wishlistId = $dbRow['wishlistId'];
        $this->_fk_userId = $dbRow['fk_userId'];
        $this->_fk_advertId = $dbRow['fk_advertId'];

        //Adverts
        $this->_title = $dbRow['title'];
        $this->_photo_name = $dbRow['photo_name'];
        $this->_description = $dbRow['description'];
        $this->_price = $dbRow['price'];

        //Users
        $this->_username = $dbRow['username'];
        $this->_email = $dbRow['email'];
        $this->_mobileNo = $dbRow['_mobileNo'];

    }

    //Keys
    public function getStudentID() {
        return $this->_fk_userId;
    }

    public function getWishlistId() {
        return $this->_wishlistId;
    }

    public function getAdvertId() {
        return $this->_fk_advertId;
    }

    //Adverts
    public function getTitle() {
        return $this->_title;
    }

    public function getPhotoName() {
        return $this->_photo_name;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getPrice() {
        return $this->_price;
    }

    //Users
    public function getUserName() {
        return $this->_username;
    }

    public function getMobileNo() {
        return $this->_mobileNo;
    }

    public function getEmail() {
        return $this->_email;
    }











}